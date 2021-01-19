<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserMemoModel;

class UserMemo extends Controller
{
    public function __construct()
    {
        helper('all');
    }

    public function index()
    {
        $model = new UserMemoModel();

        // $id="11190004";
        $id = session()->get('nip');
        $data['data'] = $model->getDataMemo($id);
        $data['title'] = 'Home | User Memo';
        echo view('/userMemo/index', $data);
    }

    public function approver()
    {
        $model = new UserSubmissionModel();

        $id = session()->get('nip');
        $data['user'] = $model->getDataEmploye($id)->getRow();
        $data['data'] = $model->getDataSubApprover($id);
        $data['title'] = 'Home | User Submission';
        echo view('/userSubmission/subApprover', $data);
    }

    public function create()
    {
        $id = session()->get('nip');
        $data['user'] = $id;
        $data['receiver'] = $this->cekReceiver($id);
        $data['title'] = 'Home | User Submission';
        echo view('/userMemo/create', $data);
    }

    public function cekReceiver($id)
    {
        $model = new UserMemoModel();

        $getEmploye = $model->getDataEmploye($id)->getRow();
        return $model->getReceiver($getEmploye->division);
    }

    public function save()
    {
        $model = new UserMemoModel();

        $id = $this->request->getPost('user');

        $cek_img = $this->request->getFile('foto');

        if ($cek_img == "") {

            $file = null;
        } else {

            $cek_img->move(ROOTPATH . 'public/img-memo');
            $file = ['gambar' => $cek_img->getName()];
        }

        $data = array(
            'sender'  => $this->request->getPost('user'),
            'receiver'  => $this->request->getPost('receiver'),
            'title'  => $this->request->getPost('title'),
            'body'  => $this->request->getPost('desc'),
            'attachment'  => $file,
            'created_at'  => date('Y-m-d H:i:s'),

        );
        $model->saveMemo($data);

        $data = ['message' => 'Memo berhasil'];
        return $this->respond($data, 200);
    }

    public function memoSend()
    {
        $model = new UserMemoModel();

        $id = session()->get('nip');
        $data['data'] = $model->getDataMemoSend($id);
        $data['title'] = 'Home | User Memo';
        echo view('/userMemo/listMemoSend', $data);
    }

    public function detail($id)
    {
        $model = new UserMemoModel();

        $data['data'] = $model->getDetailMemo($id)->getRow();
        $data['title'] = 'Home | User Memo';
        echo view('/userMemo/detail', $data);
    }

    public function detailMemoSend($id)
    {
        $model = new UserMemoModel();

        $data['data'] = $model->getDetailMemoSend($id)->getRow();
        $data['title'] = 'Home | User Memo';
        echo view('/userMemo/detailMemoSend', $data);
    }
}
