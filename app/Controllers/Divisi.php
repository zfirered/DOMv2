<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\DivisiModel;

 
class Divisi extends Controller
{
  
    public function index()
    {
        
        $model = new DivisiModel();
        $data['data'] = $model->getData();
        $data['title']= 'Home | Master Divisi';
        echo view('/divisi/index',$data);
    }

    public function create()
    {
        $data['title']= 'Home | Master Divisi';
        echo view('/divisi/create',$data);
        
    }
 
    public function save()
    {
        $model = new DivisiModel();
        $data = array(
            'division_name'  => $this->request->getPost('div_nm'),
            'division_desc'  => $this->request->getPost('div_desc'),
        );
        $model->saveDivisi($data);
        return redirect()->to('/divisi');
    }

    public function edit($id)
    {
        $model = new DivisiModel();
        $data['data'] = $model->getData($id)->getRow();
        $data['title']= 'Home | Master Divisi';
        echo view('/divisi/edit',$data);
    }

    public function update()
    {
        $model = new DivisiModel();
        $id = $this->request->getPost('id');
        $data = array(
            'division_name'  => $this->request->getPost('div_nm'),
            'division_desc'  => $this->request->getPost('div_desc'),
        );
        $model->updateDivisi($data, $id);
        return redirect()->to('/divisi');
    }

    public function delete($id)
    {
        $model = new DivisiModel();
        $model->deleteDivisi($id);
        return redirect()->to('/divisi');
    }
}
 
