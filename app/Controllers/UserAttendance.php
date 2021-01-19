<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\UserAttendanceModel;
use App\Models\EmployeModel;
use App\Models\DivisiModel;
use App\Models\DiscSubmissionModel;




class UserAttendance extends BaseController
{

    public function __construct()
    {
        helper('all');
        helper('cekAttend');
    }

    public function index()
    {

        $data = $this->get_user_absen();
        $data['title'] = 'Home | User Attendance';
        echo view('/UserAttendance/index', $data);
    }

    public function get_user_absen()
    {

        $model = new UserAttendanceModel();
        $model2 = new EmployeModel();

        $bulan = @$this->request->getPost('bulan') ? $this->request->getPost('bulan') : date('m');
        $tahun = @$this->request->getPost('tahun') ? $this->request->getPost('tahun') : date('Y');

        $now = "$tahun-$bulan-01";

<<<<<<< HEAD
        $id="202101160001";
        $data['id']= $id;
        $data['bulan']= $bulan;
        $data['tahun']= $tahun;
        $data['hari']= date_now($now);
        $data['all_bulan']= month();
        $data['absen']= $model->get_absen($id, $bulan, $tahun);
=======
        $id = session()->get('nip');
        $data['id'] = $id;
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['hari'] = date_now($now);
        $data['all_bulan'] = month();
        $data['absen'] = $model->get_absen($id, $bulan, $tahun);
>>>>>>> b94fe95460567d48bd669da9e7cf295e3a9c179c

        return $data;
    }
}
