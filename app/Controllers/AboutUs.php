<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\AttendanceModel;
use App\Models\EmployeModel;


class aboutus extends Controller
{

    public function index()
    {
        $data['title'] = 'Home | About Us';
        echo view('/AboutUs/index', $data);
    }
}
