<?php

namespace App\Controllers\api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\AboutUsModel;
use App\Models\EmployeModel;
use App\Models\KalenderModel;

class dashboard_admin extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\UsersModel';

    public function index()
    {
        $data['nama_perusahaan'] = $this->nama_perusahaan()['naper'];
        $data['nama_pegawai'] = $this->nama_pegawai();
        $data['agenda'] = $this->agenda();
        return $this->respond($data, 200);
    }

    public function nama_perusahaan()
    {
        $aboutus = new AboutUsModel();
        return $aboutus->first();
    }

    public function nama_pegawai()
    {
        $employe = new EmployeModel();
        foreach ($employe->findAll() as $value) {
            $data[] = [
                'first_name' => $value['first_name'],
                'last_name' => $value['last_name'],
                'nip' => $value['nip'],
            ];
        }
        return $data;
    }

    public function agenda()
    {
        $kalender = new KalenderModel();
        foreach ($kalender->findAll() as $value) {
            $data[] = [
                'agenda' => $value['agenda'],
                'start' => $value['start'],
                'end' => $value['end'],
            ];
        }
        return $data;
    }
}
