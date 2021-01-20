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
        $cek_img = $this->request->getFile('thumbnail');

        if ($cek_img == "") {

            $file = $default_img;
        } else {

            $cek_img->move(ROOTPATH . 'public/img-announcement');
            $file = ['gambar' => $cek_img->getName()];
        }

        $data = array(
            'title'  => $this->request->getPost('title'),
            'body'  => $this->request->getPost('body'),
            'thumbnail'  => $file,
            'created_at'  => date('Y-m-d H:i:s'),

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

        $img_old = $this->request->getPost('thumbnail_old');
        $cek_img = $this->request->getFile('thumbnail');

        if ($cek_img == "") {

            $file = $img_old;
        } else {

            $cek_img->move(ROOTPATH . 'public/img-announcement');
            $file = ['gambar' => $cek_img->getName()];
            unlink('../public/img-announcement/' . $img_old);
        }

        $id = $this->request->getPost('id');
        $data = array(
            'title'  => $this->request->getPost('title'),
            'body'  => $this->request->getPost('body'),
            'thumbnail'  => $file,
            'updated_at'  => date('Y-m-d H:i:s'),

        );
        $model->updateAnnouncement($data, $id);
        return redirect()->to('/announcement');
    }

    public function delete($id)
    {
        $model = new AnnouncementModel();

        $data = $model->getData($id)->getRow();
        unlink('../public/img-announcement/' . $data->thumbnail);

        $model->deleteAnnouncement($id);
        return redirect()->to('/announcement');
    }
}
