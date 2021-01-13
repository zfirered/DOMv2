<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserSubmissionModel;
 
class UserSubmission extends Controller
{
    public function __construct(){
        helper('all');
    }

    public function index()
    {
        $model = new UserSubmissionModel();

        $id="11190004";
        $data['user'] = $model->getDataEmploye($id)->getRow();
        $data['data'] = $model->getData($id);
        $data['title']= 'Home | User Submission';
        echo view('/userSubmission/index',$data);
    }

    public function approver()
    {
        $model = new UserSubmissionModel();

        $id="11190004";
        $data['user'] = $model->getDataEmploye($id)->getRow();
        $data['data'] = $model->getDataSubApprover($id);
        $data['title']= 'Home | User Submission';
        echo view('/userSubmission/subApprover',$data);
    } 

    public function create()
    {
    
    $id= "11190004";
    $data['user']= $id;
    $data['approver']= $this->cekApprover($id);
    $data['title']= 'Home | User Submission';
    echo view('/userSubmission/create',$data);
    } 
    
    public function detail($id)
    {
    $model = new UserSubmissionModel();
    $data['data'] = $model->getDetailSub($id)->getRow();
    $data['title']= 'Home | User Submission';
    echo view('/userSubmission/detail',$data);
    }

    public function detailApprover($id)
    {
    $model = new UserSubmissionModel();
    $data['data'] = $model->getDetailApprover($id)->getRow();
    $data['title']= 'Home | User Submission';
    echo view('/userSubmission/detailApprover',$data);
    }

    public function save()
    {
        $model = new UserSubmissionModel();

        $id= $this->request->getPost('user');
        $getEmploye= $model->getDataEmploye($id)->getRow();
        $getSubPending= $model->getDataPending($id)->getRow();

        if($getSubPending == TRUE){

        return print "<script type='text/javascript'> alert('Sorry, Please check your pending submission');window.location=('/userSubmission'); </script>";

        }else{

        $rightLeave= $getEmploye->right_to_leave;

        $start= $this->request->getPost('d_start');
        $end= $this->request->getPost('d_end');

        $range= range_date($start, $end);
        $total= count($range);

        if($rightLeave - $total >= 0){
        
        $cek_img = $this->request->getFile('foto');
        
            if($cek_img == ""){

                $file = null;

            } else {
               
                $cek_img->move(ROOTPATH.'public/img-submission');
                $file= ['gambar' => $cek_img->getName()];

            }

            $data = array(
                'user'  => $this->request->getPost('user'),
                'approver'  => $this->request->getPost('approver'),
                'submission_for'  => $this->request->getPost('sub_for'),
                'submission_date'  => date('Y-m-d'),
                'approve_date'  => null,
                'implementation_date_start'  => $start,
                'implementation_date_end'  => $end,
                'user_desc'  => $this->request->getPost('user_desc'),
                'approver_desc'  => null,
                'attachment'  => $file,
                'status_sub'  => "P",
            );
            $model->saveSubmission($data);
            return print "<script type='text/javascript'> alert('Save Success');window.location=('/userSubmission'); </script>";
        }else {
            return print "<script type='text/javascript'> alert('Sorry, Please check your remaining leave rights');window.location=('/userSubmission'); </script>";
        }         
    }
}

    public function update()
    {
        $model = new UserSubmissionModel();

        if($this->request->getPost('submit')== "approve"){
            $status= "Y";
            $alert= "Approve";
        }else if($this->request->getPost('submit') == "reject"){
            $status= "N";
            $alert= "Reject";
        }
            $id= $this->request->getPost('idSub');
            $data = array(
                'approve_date'  => date('Y-m-d'),
                'approver_desc'  => $this->request->getPost('approver_desc'),
                'status_sub'  => $status,
            );
            $model->updateSubmission($data, $id);
            return print "<script type='text/javascript'> alert('$alert Success');window.location=('/userSubmission'); </script>";
             
    }
 
    public function cekApprover($id)
    {
        $model = new UserSubmissionModel();

        $getEmploye= $model->getDataEmploye($id)->getRow();

        if($getEmploye->level == 3){
        $div= $getEmploye->division;
        $lev= '2';

        $getApprover= $model->getDataApprover($div, $lev);
        return $getApprover;
        }
        else if($getEmploye->level == 2){
            $lev= '1';
    
            $getApprover= $model->getDataApprover($div, $lev);
            return $getApprover;
            }
        else if($getEmploye->level == 1){
                $lev= '1';
        
                $getApprover= $model->getDataApprover($div, $lev);
                return $getApprover;
                }
      

    }

    
}
 

