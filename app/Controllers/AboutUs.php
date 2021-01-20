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
        $model = new AboutUsModel();
        // dd($model->first());
        $data['title'] = 'Home | About Us';
        $data['data'] = $model->first();
        echo view('/AboutUs/index', $data);
    }

    public function edit()
    {
        $model = new AboutUsModel();
        $data['title'] = 'Home | About Us';
        $data['data'] = $model->first();
        // dd($data);
        // 'AboutUs' => $this->AboutUsModel->getAboutUs;
        echo view('/AboutUs/edit', $data);
    }

    public function update()
    {
        $model = new AboutUsModel();

        $default_img = "placeholder.jpg";
        $cek_img = $this->request->getFile('logo');
        $dataLama = $model->find($this->request->getPost('id'));
        // dd($dataLama, $cek_img->getError());
        if ($cek_img->getError() == 4) {
            $file = $dataLama['logo'];
        } else {

            if ($dataLama['logo'] != $default_img) {
                unlink('img/' . $dataLama['logo']);
            }

            $cek_img->move(ROOTPATH . 'public/img');
            $file = ['gambar' => $cek_img->getName()];
        }

        $data = array(
            'id' => $this->request->getPost('id'),
            'naper'  => $this->request->getPost('naper'),
            'nofax'  => $this->request->getPost('nofax'),
            'notelp'  => $this->request->getPost('notelp'),
            'email'  => $this->request->getPost('email'),
            'website'  => $this->request->getPost('website'),
            'alamatkantor'  => $this->request->getPost('alamatkantor'),
            'logo'  => $file,
        );

        $model->save($data);
        return redirect()->to('/AboutUs');
    }
}
