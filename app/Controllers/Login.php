<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AdminModel;

class Login extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('login');
    }

    public function auth()
    {
        $session = session();
        $model = new AdminModel();
        $username = $this->request->getVar('admin_name');
        $password = $this->request->getVar('admin_password');
        $data = $model->where('admin_name', $username)->first();

        if ($data) {
            $pass = $data['admin_password'];
            // $verify_pass = password_verify($password, $pass);
            $verify_pass = ($password == $pass) ? true : false;
            if ($verify_pass) {
                $ses_data = [
                    'id_admin'   => $data['id_admin'],
                    'admin_name'  => $data['admin_name'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/pages');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username not Found');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
