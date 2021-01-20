<?php

namespace App\Controllers\api;

use CodeIgniter\RESTful\ResourceController;

use App\Models\UsersModel;
// use Myth\Auth\Models\UserModel;

class Login extends ResourceController
{
    protected $format       = 'json';

    public function index()
    {
        if (session()->get('token')) {
            $data = ['status' => 'errors', 'message' => null];
            return $this->respond($data, 500);
        } else {
            $data = ['status' => 'errors', 'message' => 'method errors'];
            return $this->respond($data, 500);
        }
        // $data = ['token' => 'jASDjasda213jJ'];
        // $userModel = new UsersModel();
        // $user = $userModel->getData(['nip' => '11190587']);
        // d($user, $user->getRowArray());
    }

    public function auth()
    {
        // { "nip": "11190587", "password": "12345" }
        $userModel = new UsersModel();
        $post = $this->request->getVar();
        if ($post['nip'] && $post['password']) {
            $user = $userModel->getData(['nip' => $post['nip']])->getRowArray();

            if ($user['password'] == $post['password']) {
                $token = ['token' => csrf_hash()];
                $data = ['message' => 'ok', 'token' => $token['token']];
            }
            session()->set($token);
            return $this->respond($data, 200);
        } else {
            $data = ['message' => 'error'];
            return $this->respond($data, 500);
        }
    }

    public function logout()
    {
        session()->destroy();
        $data = ['status' => 'success', 'message' => 'Logout Succes'];
        return $this->respond($data, 200);
    }
}
