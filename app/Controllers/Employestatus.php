<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\EmployestatusModel;
 
class Employestatus extends Controller
{
    public function __construct(){
        helper('all');
    }

    public function index()
    {
        $model = new EmployestatusModel();

        $data['data'] = $model->getData();
        $data['title']= 'Home | Master Employe Status';
        echo view('/employestatus/index',$data);
    }

    function htmlToPDF(){

        $model = new EmployestatusModel();
        $data['data'] = $model->getData();
        $data['bulan'] = month(date('m'));
        $data['tahun'] = date('Y');

        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('/employestatus/printAll',$data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    } 

    public function create()
    {
        $data['title']= 'Home | Master Employe Status';
        echo view('/employestatus/create',$data);
        
    }
 
    public function save()
    {
        $model = new EmployestatusModel();
        $data = array(
            'status_name'  => $this->request->getPost('stat_nm'),
            'status_desc'  => $this->request->getPost('stat_desc'),
        );
        $model->saveEmployestatus($data);
        return redirect()->to('/employestatus');
    }

    public function edit($id)
    {
        $model = new EmployestatusModel();
        $data['data'] = $model->getData($id)->getRow();
        $data['title']= 'Home | Master Employe Status';
        echo view('/employestatus/edit',$data);
    }

    public function update()
    {
        $model = new EmployestatusModel();
        $id = $this->request->getPost('id');
        $data = array(
            'status_name'  => $this->request->getPost('stat_nm'),
            'status_desc'  => $this->request->getPost('stat_desc'),
        );
        $model->updateEmployestatus($data, $id);
        return redirect()->to('/employestatus');
    }

    public function delete($id)
    {
        $model = new EmployestatusModel();
        $model->deleteEmployestatus($id);
        return redirect()->to('/employestatus');
    }
}
 
