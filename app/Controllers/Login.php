<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;

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
        $model = new UsersModel();
        $nip = $this->request->getVar('nip');
        $password = $this->request->getVar('password');
        $data = $model->where('nip', $nip)->first();
        if ($data) {
            $pass = $data['password'];
            // $verify_pass = password_verify($password, $pass);
            $verify_pass = ($password == $pass) ? true : false;
            if ($verify_pass) {
                $ses_data = [
                    'id'   => $data['id'],
                    'nip'  => $data['nip'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/pages');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Nip not Found');
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
