<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserSubmissionOvertimeModel;
 
class UserSubmissionOvertime extends Controller
{
    public function __construct(){
        helper('all');
    }

    public function index()
    {
        $model = new UserSubmissionOvertimeModel();

        $id="202101160001";
        $data['user'] = $model->getDataEmploye($id)->getRow();
        $data['data'] = $model->getData($id);
        $data['title']= 'Home | User Submission Overtime';
        echo view('/userSubmissionOvertime/index',$data);
    }

    public function approver()
    {
        $model = new UserSubmissionOvertimeModel();

        $id="202101160001";
        $data['user'] = $model->getDataEmploye($id)->getRow();
        $data['data'] = $model->getDataSubApprover($id);
        $data['title']= 'Home | User Submission Overtime';
        echo view('/userSubmissionOvertime/subApprover',$data);
    } 

    public function create()
    {
    
    $id= "202101160001";
    $data['user']= $id;
    $data['approver']= $this->cekApprover($id);
    $data['title']= 'Home | User Submission Overtime';
    echo view('/userSubmissionOvertime/create',$data);
    } 

    public function cekApprover($id)
    {
        $model = new UserSubmissionOvertimeModel();

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

public function save()
    {
        $model = new UserSubmissionOvertimeModel();

        $id= $this->request->getPost('user');
        $getEmploye= $model->getDataEmploye($id)->getRow();
        $getSubPending= $model->getDataPending($id)->getRow();

        if($getSubPending == TRUE){

        return print "<script type='text/javascript'> alert('Sorry, Please check your pending submission');window.location=('/userSubmissionOvertime'); </script>";

        }else{

            $data = array(
                'user'  => $this->request->getPost('user'),
                'approver'  => $this->request->getPost('approver'),
                'submission_date'  => date('Y-m-d'),
                'approve_date'  => null,
                'implementation_date'  => $this->request->getPost('implement_date'),
                'user_desc'  => $this->request->getPost('user_desc'),
                'approver_desc'  => null,
                'status_sub_ot'  => "P",
            );
            $model->saveSubmission($data);
            return print "<script type='text/javascript'> alert('Save Success');window.location=('/userSubmissionOvertime'); </script>";
             
    }
}
    
    public function detail($id)
    {
    $model = new UserSubmissionOvertimeModel();
    $data['data'] = $model->getDetailSub($id)->getRow();
    $data['title']= 'Home | User Submission Overtime';
    echo view('/userSubmissionOvertime/detail',$data);
    }

    public function detailApprover($id)
    {
    $model = new UserSubmissionOvertimeModel();
    $data['data'] = $model->getDetailApprover($id)->getRow();
    $data['title']= 'Home | User Submission Overtime';
    echo view('/userSubmissionOvertime/detailApprover',$data);
    }

    

    public function update()
    {
        $model = new UserSubmissionOvertimeModel();

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
                'status_sub_ot'  => $status,
            );
            $model->updateSubmission($data, $id);
            return print "<script type='text/javascript'> alert('$alert Success');window.location=('/userSubmissionOvertime'); </script>";
             
    }
 
    

    
}
 

