<?php namespace App\Controllers;
 
use CodeIgniter\Controller;

use App\Models\UserAbsenceModel;
use App\Models\EmployeModel;
use App\Models\DivisiModel;
use App\Models\DiscSubmissionModel;



 
class UserAbsence extends BaseController
{

    public function __construct(){
        helper('all');
        helper('cekAttend');
    }
    
    public function index()
    {   

        $data= $this->do_absence();
        $data['title']= 'Home | User Absence';
        echo view('/UserAbsence/index',$data);
    }

    public function do_absence()
    {   

        $model= new UserAbsenceModel();

        $id="11190002";
        $date= date('Y-m-d');
        $hour= date('H:i:s');
        $cek_event= date_event(strtotime($date));
        $cek_overtime_sub= $model->get_overtime_sub($date, $id)->getRow();

        
        if($this->request->getPost('submit')== "in"){ 
            
            $cek_absence= $model->cek_absence($id, $date)->getRow();

            if($cek_event == 'Y'){
                if($cek_absence == FALSE){
                    if($cek_overtime_sub == FALSE){
                    
                    print "<script type='text/javascript'> alert('Belum daftar lembur');</script>";

                    }else{
                    $data = array(
                        'nip'  => $id,
                        'date'  => $date,
                        'overtime_in'  => $hour,
                    );
                $model->save_absent($data);
                print "<script type='text/javascript'> alert('Absence OT-in Success');</script>";
                    }
                }else{
                   
                    if($cek_absence->overtime_in == TRUE){
                
                        print "<script type='text/javascript'> alert('You have been absent OT-in');</script>";
        
                        }
                }

            }else{   
            

            if($cek_absence == FALSE){
                
                $data = array(
                    'nip'  => $id,
                    'date'  => $date,
                    'check_in'  => $hour,
                );
                $model->save_absent($data);
                print "<script type='text/javascript'> alert('Absence in Success');</script>";
            
            }else{

                if($cek_absence->check_in == TRUE && $cek_absence->check_out == FALSE){
                
                print "<script type='text/javascript'> alert('You have been absent in');</script>";

                }else if ($cek_absence->check_in == TRUE && $cek_absence->check_out == TRUE && $cek_absence->overtime_in == FALSE){
                    if($cek_overtime_sub == FALSE){
                    
                        print "<script type='text/javascript'> alert('Belum daftar lembur');</script>";
    
                        }else{
                    $id= $cek_absence->id;
                    $data = array(
                       'overtime_in'  => $hour,
                    );
                    $model->update_absent($data, $id);
                print "<script type='text/javascript'> alert('Absence OT-in Success');</script>";
                    }
                }
                else if ($cek_absence->check_in == TRUE && $cek_absence->check_out == TRUE && $cek_absence->overtime_in == TRUE){

                    print "<script type='text/javascript'> alert('You have been absent OT-in');</script>";
    
                }

            }
        }
        
        }else if($this->request->getPost('submit')== "out"){

            $cek_absence= $model->cek_absence($id, $date)->getRow();
            
            if($cek_event == 'Y'){

                if($cek_absence == FALSE){

                print "<script type='text/javascript'> alert('Sorry you have not absent OT-in yet');</script>";
                
                }else{
                   
                    if($cek_absence->overtime_in == TRUE && $cek_absence->overtime_out == FALSE){
                
                        $id= $cek_absence->id;
                        $data = array(
                           'overtime_out'  => $hour,
                        );
                        $model->update_absent($data, $id);
                        print "<script type='text/javascript'> alert('Absence OT-out Success');</script>";
        
                        }
                    else if($cek_absence->overtime_in == TRUE && $cek_absence->overtime_out == TRUE){
                
                        print "<script type='text/javascript'> alert('You have been absent OT-out');</script>";
            
                        }

                }

            }else{ 

            if($cek_absence == FALSE){

                print "<script type='text/javascript'> alert('Sorry you have not absent in yet');</script>";
            
            }else{

                if($cek_absence->check_in == FALSE){
                
                    print "<script type='text/javascript'> alert('Sorry you have not absent in yet');</script>";
    
                }else if ($cek_absence->check_in == TRUE && $cek_absence->check_out == FALSE && $cek_absence->overtime_in == FALSE && $cek_absence->overtime_out == FALSE){
                    
                    $time_out= $model->get_timeout()->getRow();

                    if($time_out->start < date('H:i:s')){
                    $id= $cek_absence->id;
                    $data = array(
                       'check_out'  => $hour,
                    );
                    $model->update_absent($data, $id);
                    print "<script type='text/javascript'> alert('Absence out Success');</script>";
                }else{
                    print "<script type='text/javascript'> alert('Belum waktunya pulang');</script>";
                }
                    }  
                else if ($cek_absence->check_in == TRUE && $cek_absence->check_out == TRUE && $cek_absence->overtime_in == FALSE && $cek_absence->overtime_out == FALSE){

                    print "<script type='text/javascript'> alert('You have been absent out');</script>";
            
                    }   
                else if ($cek_absence->check_in == TRUE && $cek_absence->check_out == TRUE && $cek_absence->overtime_in == TRUE && $cek_absence->overtime_out == FALSE){

                    $id= $cek_absence->id;
                    $data = array(
                       'overtime_out'  => $hour,
                    );
                    $model->update_absent($data, $id);
                    print "<script type='text/javascript'> alert('Absence OT-out Success');</script>";
                
                    }   
                else if ($cek_absence->check_in == TRUE && $cek_absence->check_out == TRUE && $cek_absence->overtime_in == TRUE && $cek_absence->overtime_out == TRUE){

                    print "<script type='text/javascript'> alert('You have been absent OT-out');</script>";
                
                    }   
            }
            }
        }
                
    }
  
     
}
 