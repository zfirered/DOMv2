<?php

namespace App\Controllers;

use App\Models\AboutUsModel;
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

    public function create()
    {
        $data['title'] = 'Home | About Us';
        echo view('/AboutUs/create', $data);
    }

    public function save()
    {
        $model = new AboutUsModel();

        $default_img = "placeholder.jpg";
        $cek_img = $this->request->getFile('logo');

        if ($cek_img == "") {

            $file = $default_img;
        } else {

            $cek_img->move(ROOTPATH . 'public/img');
            $file = ['gambar' => $cek_img->getName()];
        }

        $data = array(
            'naper'  => $this->request->getPost('naper'),
            'nofax'  => $this->request->getPost('nofax'),
            'notelp'  => $this->request->getPost('notelp'),
            'email'  => $this->request->getPost('email'),
            'website'  => $this->request->getPost('website'),
            'alamatkantor'  => $this->request->getPost('alamatkantor'),
            'logo'  => $file,
        );

        $model->saveAboutUs($data);
        return redirect()->to('/AboutUs');
    }
}
