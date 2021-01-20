<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DivisiModel;
use App\Models\AboutUsModel;


class Divisi extends Controller
{
    public function __construct()
    {
        helper('all');
        helper('form');
        $this->form_validation = \Config\Services::validation();
    }

    public function index()
    {

        $model = new DivisiModel();

        $data['data'] = $model->getData();
        $data['title'] = 'Home | Master Divisi';
        echo view('/divisi/index', $data);
    }

    function htmlToPDF()
    {

        $model = new DivisiModel();
        $model2 = new AboutUsModel();

        $data['data'] = $model->getData();
        $data['about_us'] = $model2->getAboutUs();
        $data['bulan'] = month(date('m'));
        $data['tahun'] = date('Y');


        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('/divisi/printAll', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }

    public function create()
    {
        session();

        $data['title'] = 'Home | Master Divisi';
        $data['validation'] = \Config\Services::validation();
        echo view('/divisi/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'div_nm' => [
                'rules' => 'required|is_unique[division.division_name]|max_length[20]',
                'errors' => [
                    'required' => 'Division name harus diisi',
                    'is_unique' => 'Division name sudah ada',
                    'max_length' => 'Maksimal 20 karakter'
                ]
            ],
            'div_desc' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Division describe harus diisi',
                    'max_length' => 'Maksimal 50 karakter'
                ]
            ]

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/divisi/create')->withInput()->with('validation', $validation);
        }

        $model = new DivisiModel();
        $data = array(
            'division_name'  => $this->request->getPost('div_nm'),
            'division_desc'  => $this->request->getPost('div_desc'),
        );
        $model->saveDivisi($data);
        return redirect()->to('/divisi');
    }

    public function edit($id)
    {
        session();
        $model = new DivisiModel();


        $data['validation'] = \Config\Services::validation();
        $data['data'] = $model->getData($id)->getRow();
        $data['title'] = 'Home | Master Divisi';
        echo view('/divisi/edit', $data);
    }

    public function update()
    {
        if ($this->request->getPost('div_nm_old') == $this->request->getPost('div_nm')) {
            $rule = 'required|max_length[20]';
        } else {
            $rule = 'required|is_unique[division.division_name]|max_length[20]';
        }

        if (!$this->validate([
            'div_nm' => [
                'rules' => $rule,
                'errors' => [
                    'required' => 'Division name harus diisi',
                    'is_unique' => 'Division name sudah ada',
                    'max_length' => 'Maksimal 20 karakter'
                ]
            ],
            'div_desc' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Division describe harus diisi',
                    'max_length' => 'Maksimal 50 karakter'
                ]
            ]

        ])) {
            $validation = \Config\Services::validation();
            $id = $this->request->getPost('id');
            return redirect()->to('/divisi/edit/' . $id)->withInput()->with('validation', $validation);
        }

        $model = new DivisiModel();
        $id = $this->request->getPost('id');
        $data = array(
            'division_name'  => $this->request->getPost('div_nm'),
            'division_desc'  => $this->request->getPost('div_desc'),
        );
        $model->updateDivisi($data, $id);
        return redirect()->to('/divisi');
    }

    public function delete($id)
    {
        $model = new DivisiModel();
        $model->deleteDivisi($id);
        return redirect()->to('/divisi');
    }
}
