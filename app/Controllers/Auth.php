<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AuthModel;

class Auth extends Controller
{
    public function login()
    {
        $model = new AuthModel;
        $table = 'user';
        $nip = $this->request->getPost('nip');
        $password = $this->request->getPost('password');
        $row = $model->get_data_login($nip, $table);
        if ($row == NULL){
            session()->setFlashData('pesan', 'Nip anda salah!');
            return redirect()->to('/');
        } 
        if (password_verify($password, $row->password)){
                $data = array(
                    'log' => TRUE,
                    'nip' => $row->nip,
                    'role' => $row->role,
                );
                session()->set($data);
                session()->setFlashData('pesan', 'Berhasil Login!');
                return redirect()->to('home');
        }
                session()->setFlashData('pesan', 'Password Salah!');
                return redirect()->to('/');
    }
}
