<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PositionModel;
use App\Models\AboutUsModel;


class Position extends Controller
{
    public function __construct()
    {
        helper('all');
    }

    public function index()
    {
        $model = new PositionModel();

        $data['data'] = $model->getData();
        $data['title'] = 'Home | Master Position';
        echo view('/position/index', $data);
    }

    function htmlToPDF()
    {

        $model = new PositionModel();
        $model2 = new AboutUsModel();

        $data['data'] = $model->getData();
        $data['about_us'] = $model2->getAboutUs();
        $data['bulan'] = month(date('m'));
        $data['tahun'] = date('Y');

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('/position/printAll', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }

    public function create()
    {
        session();
        $data['validation'] = \Config\Services::validation();

        $data['title'] = 'Home | Master Position';
        echo view('/position/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'pos_nm' => [
                'rules' => 'required|max_length[20]|is_unique[position.position_name]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'max_length' => 'Maksimal 20 karakter',
                    'is_unique' => 'Nama posisi sudah ada'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus Pilih'
                ]
            ],
            'pos_desc' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Harus Diisi',
                    'max_length' => 'Maksimal 100 karakter'
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/position/create')->withInput()->with('validation', $validation);
        }

        $model = new PositionModel();
        $data = array(
            'position_name'  => $this->request->getPost('pos_nm'),
            'position_desc'  => $this->request->getPost('pos_desc'),
            'level'  => $this->request->getPost('level'),
        );
        $model->savePosition($data);
        return redirect()->to('/position');
    }

    public function edit($id)
    {
        $model = new PositionModel();
        session();
        $data['validation'] = \Config\Services::validation();

        $data['data'] = $model->getData($id)->getRow();
        $data['title'] = 'Home | Master Position';
        echo view('/position/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        if ($this->request->getPost('pos_nm_old') == $this->request->getPost('pos_nm')) {
            $rule = 'required|max_length[20]';
        } else {
            $rule = 'required|is_unique[position.position_name]|max_length[20]';
        }

        if (!$this->validate([
            'pos_nm' => [
                'rules' => $rule,
                'errors' => [
                    'required' => 'Harus diisi',
                    'max_length' => 'Maksimal 20 karakter',
                    'is_unique' => 'Nama posisi sudah ada'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus Pilih'
                ]
            ],
            'pos_desc' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Harus Diisi',
                    'max_length' => 'Maksimal 100 karakter'
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/position/edit/' . $id)->withInput()->with('validation', $validation);
        }

        $model = new PositionModel();
        $id = $this->request->getPost('id');
        $data = array(
            'position_name'  => $this->request->getPost('pos_nm'),
            'position_desc'  => $this->request->getPost('pos_desc'),
            'level'  => $this->request->getPost('level'),
        );
        $model->updatePosition($data, $id);
        return redirect()->to('/position');
    }

    public function delete($id)
    {
        $model = new PositionModel();
        $model->deletePosition($id);
        return redirect()->to('/position');
    }
}
