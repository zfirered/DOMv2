<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AnnouncementModel;

class Announcement extends Controller
{
    public function index()
    {
        $model = new AnnouncementModel();
        $data['data'] = $model->getData();
        $data['latest'] = $model->getDataLatest();
        $data['title'] = 'Home | Announcement';
        echo view('/announcement/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Home | Announcement';
        echo view('/announcement/create', $data);
    }

    public function save()
    {
        $model = new AnnouncementModel();

        $default_img = "placeholder.jpg";
        $cek_img = $this->request->getFile('foto');

        if ($cek_img == "") {

            $file = $default_img;
        } else {

            $cek_img->move(ROOTPATH . 'public/img');
            $file = ['gambar' => $cek_img->getName()];
        }

        $data = array(
            'title'  => $this->request->getPost('title'),
            'body'  => $this->request->getPost('body'),
            'foto'  => $file,
        );
        $model->saveAnnouncement($data);
        return redirect()->to('/announcement');
    }

    public function edit($id)
    {
        $model = new AnnouncementModel();
        $data['data'] = $model->getData($id)->getRow();
        $data['title'] = 'Home | Master Announcement';
        echo view('/announcement/edit', $data);
    }

    public function update()
    {
        $model = new AnnouncementModel();
        $id = $this->request->getPost('bank_cd');
        $data = array(
            'bank_code'  => $this->request->getPost('bank_cd'),
            'bank_name'  => $this->request->getPost('bank_nm'),
        );
        $model->updateBankAccount($data, $id);
        return redirect()->to('/announcement');
    }

    public function delete($id)
    {
        $model = new AnnouncementModel();
        $model->deleteBankAccount($id);
        return redirect()->to('/announcement');
    }
}
