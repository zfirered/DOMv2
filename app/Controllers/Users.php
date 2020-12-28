<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UsersModel;
 
class Users extends Controller
{
    public function index()
    {
        $model = new UsersModel();
        $data['data'] = $model->getData();
        $data['title']= 'Home | Data Users';
        echo view('/users/index',$data);
    }


    public function update()
    {
        $model = new UsersModel();
        $id = $this->request->getPost('nip');
        $data = array(
            'updated_at'  => date('Y-m-d H:i:s'),
            'allow'  => $this->request->getPost('allow'),
        );
        $model->updateUsers($data, $id);
        return redirect()->to('/users');
    }

    public function reset($id)
    {
        $model = new UsersModel();
        $data = array(
            'updated_at'  => date('Y-m-d H:i:s'),
            'password'  => "12345",
        );
        $model->updateUsers($data, $id);
        return redirect()->to('/users');
    }
}
 
