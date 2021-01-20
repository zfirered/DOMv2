<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\EmployestatusModel;
use App\Models\AboutUsModel;


class Employestatus extends Controller
{
    public function __construct()
    {
        helper('all');
    }

    public function index()
    {
        $model = new EmployestatusModel();

        $data['data'] = $model->getData();
        $data['title'] = 'Home | Master Employe Status';
        echo view('/employestatus/index', $data);
    }

    function htmlToPDF()
    {

        $model = new EmployestatusModel();
        $model2 = new AboutUsModel();

        $data['data'] = $model->getData();
        $data['about_us'] = $model2->getAboutUs();
        $data['bulan'] = month(date('m'));
        $data['tahun'] = date('Y');

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('/employestatus/printAll', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }

    public function create()
    {
        session();
        $data['validation'] = \Config\Services::validation();

        $data['title'] = 'Home | Master Employe Status';
        echo view('/employestatus/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'stat_nm' => [
                'rules' => 'required|max_length[20]|is_unique[employe_status.status_name]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'max_length' => 'Maksimal 20 karakter',
                    'is_unique' => 'Nama Status sudah ada'
                ]
            ],
            'stat_desc' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Harus Diisi',
                    'max_length' => 'Maksimal 100 karakter'
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/employestatus/create')->withInput()->with('validation', $validation);
        }

        $model = new EmployestatusModel();
        $data = array(
            'status_name'  => $this->request->getPost('stat_nm'),
            'status_desc'  => $this->request->getPost('stat_desc'),
        );
        $model->saveEmployestatus($data);
        return redirect()->to('/employestatus');
    }

    public function edit($id)
    {
        session();
        $data['validation'] = \Config\Services::validation();

        $model = new EmployestatusModel();
        $data['data'] = $model->getData($id)->getRow();
        $data['title'] = 'Home | Master Employe Status';
        echo view('/employestatus/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        if ($this->request->getPost('stat_nm_old') == $this->request->getPost('stat_nm')) {
            $rule = 'required|max_length[20]';
        } else {
            $rule = 'required|is_unique[employe_status.status_name]|max_length[20]';
        }

        if (!$this->validate([
            'stat_nm' => [
                'rules' => $rule,
                'errors' => [
                    'required' => 'Harus diisi',
                    'max_length' => 'Maksimal 20 karakter',
                    'is_unique' => 'Nama Status sudah ada'
                ]
            ],
            'stat_desc' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Harus Diisi',
                    'max_length' => 'Maksimal 100 karakter'
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/employestatus/edit/' . $id)->withInput()->with('validation', $validation);
        }

        $model = new EmployestatusModel();
        $id = $this->request->getPost('id');
        $data = array(
            'status_name'  => $this->request->getPost('stat_nm'),
            'status_desc'  => $this->request->getPost('stat_desc'),
        );
        $model->updateEmployestatus($data, $id);
        return redirect()->to('/employestatus');
    }

    public function delete($id)
    {
        $model = new EmployestatusModel();
        $model->deleteEmployestatus($id);
        return redirect()->to('/employestatus');
    }
}
