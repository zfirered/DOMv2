<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\AdminModel;
 
class Admin extends Controller
{
    
    public function index()
    {
        $model = new AdminModel();

        $data['data'] = $model->getData();
        $data['title']= 'Home | Data Administrator';
        echo view('/admin/index',$data);
    }


    public function create()
    {
        session();
        $data['validation']= \Config\Services::validation();

        $data['title']= 'Home | Data Administrator';
        echo view('/admin/create',$data);
        
    }
 
    public function save()
    {
        if(!$this->validate([
            'admin_nm' => [
                'rules' => 'required|max_length[50]|alpha_space',
                'errors' => [
                    'required' => 'Harus diisi',
                    'max_length' => 'Maksimal 50 karakter',
                    'alpha_space' => 'Harus huruf'
                ]
                ],
                'admin_pass' => [
                    'rules' => 'required|max_length[20]',
                    'errors' => [
                        'required' => 'Harus diisi',
                        'max_length' => 'Maksimal 20 karakter'
                ]
                ],                
           
        ])){ 
     $validation= \Config\Services::validation();
     return redirect()->to('/admin/create')->withInput()->with('validation',$validation);
        }

        $model = new AdminModel();
        $data = array(
            'admin_name'  => $this->request->getPost('admin_nm'),
            'admin_password'  => $this->request->getPost('admin_pass'),
        );
        $model->saveAdmin($data);
        return redirect()->to('/admin');
    }

    public function edit($id)
    {
        session();
        $data['validation']= \Config\Services::validation();

        $model = new AdminModel();
        $data['data'] = $model->getData($id)->getRow();
        $data['title']= 'Home | Data Administrator';
        echo view('/admin/edit',$data);
    }

    public function update()
    {
        if(!$this->validate([
            'admin_nm' => [
                'rules' => 'required|max_length[50]|alpha_space',
                'errors' => [
                    'required' => 'Harus diisi',
                    'max_length' => 'Maksimal 50 karakter',
                    'alpha_space' => 'Harus huruf'
                ]
                ],
                'admin_pass' => [
                    'rules' => 'required|max_length[20]',
                    'errors' => [
                        'required' => 'Harus diisi',
                        'max_length' => 'Maksimal 20 karakter'
                ]
                ],                
           
        ])){ 
     $validation= \Config\Services::validation();
     return redirect()->to('/admin/create')->withInput()->with('validation',$validation);
        }

        $model = new AdminModel();
        $id = $this->request->getPost('id');
        $data = array(
            'admin_name'  => $this->request->getPost('admin_nm'),
            'admin_password'  => $this->request->getPost('admin_pass'),
        );
        $model->updateAdmin($data, $id);
        return redirect()->to('/admin');
    }

    public function delete($id)
    {
        $model = new PositionModel();
        $model->deletePosition($id);
        return redirect()->to('/position');
    }
}
 
