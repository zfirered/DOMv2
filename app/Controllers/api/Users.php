<?php

namespace App\Controllers\api;

use CodeIgniter\RESTful\ResourceController;

class Users extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\UsersModel';

    public function index()
    {
        $token_ses = $this->request->getVar('token');
        // $status = ['status' => 'failed'];
        if (session()->get('token')) {
            if (session()->get('token') == $token_ses) {
                $status = ['status' => 'success'];
                $token = ['token' => session()->get('token')];

                $data = array_merge($status, $token, ['data' => $this->model->findAll()]);
                return $this->respond($data, 200);
            } else {
                $data = ['status' => 'session errors', 'data' => null];
                return $this->respond($data, 500);
            }
        } else {
            $data = ['status' => 'errors', 'data' => null];
            return $this->respond($data, 500);
        }
    }
}
