<?php namespace App\Controllers;
 
use CodeIgniter\Controller;

use App\Models\UserAttendanceModel;
use App\Models\EmployeModel;
use App\Models\DivisiModel;
use App\Models\DiscSubmissionModel;



 
class UserAttendance extends BaseController
{

    public function __construct(){
        helper('all');
        helper('cekAttend');
    } 
    
    public function index()
    {   

        $data = $this->get_user_absen();
        $data['title']= 'Home | User Attendance';
        echo view('/UserAttendance/index',$data);
    }

    public function get_user_absen()
    {   

        $model= new UserAttendanceModel();
        $model2= new EmployeModel();
        
        $bulan= @$this->request->getPost('bulan') ? $this->request->getPost('bulan') : date('m');
        $tahun= @$this->request->getPost('tahun') ? $this->request->getPost('tahun') : date('Y');

        $now= "$tahun-$bulan-01";

        $id="11190002";
        $data['id']= $id;
        $data['bulan']= $bulan;
        $data['tahun']= $tahun;
        $data['hari']= date_now($now);
        $data['all_bulan']= month();
        $data['absen']= $model->get_absen($id, $bulan, $tahun);

        return $data;
        
    }
  
     
}
 