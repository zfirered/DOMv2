<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\EmployeModel;
use App\Models\DivisiModel;
use App\Models\PositionModel;
use App\Models\EmployestatusModel;
use App\Models\BankAccountModel;
use App\Models\UsersModel;

class Employe extends Controller
{
    public function __construct()
    {
        helper('all');
    }

    public function index()
    {
        $model = new EmployeModel();
        $model2 = new DivisiModel();

        $data['data'] = $model->getData();
        $data['data2'] = $model2->getData();
        $data['latest'] = $model->getDataLatest();
        $data['title'] = 'Home | Data Employe';
        echo view('/employe/index', $data);
    }

    function htmlToPDF()
    {

        $model = new EmployeModel();
        $model2 = new DivisiModel();
        $div = $this->request->getPost('div');
        $id = $this->request->getPost('div');

        $data['data'] = $model->getDataPrint($div);
        $data['divisi'] = $model2->getData($id)->getRow();
        $data['bulan'] = month(date('m'));
        $data['tahun'] = date('Y');

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('/employe/printAll', $data));
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream();
    }

    public function create()
    {
        session();
        $data['validation'] = \Config\Services::validation();

        $model = new EmployeModel();
        $model1 = new DivisiModel();
        $model2 = new PositionModel();
        $model3 = new EmployestatusModel();
        $model4 = new BankAccountModel();

        $now = date('Ymd');
        $cekLastNumber = $model->getLastNumber($now);
        $lastNo = $cekLastNumber->nip;
        $lastNoUrut = substr($lastNo, 8, 4);
        $nextNoUrut = $lastNoUrut + 1;
        $nextNoNip = $now . sprintf('%04s', $nextNoUrut);

        $data['nip'] = $nextNoNip;
        $data['data'] = $model1->getData();
        $data['data2'] = $model2->getData();
        $data['data3'] = $model3->getData();
        $data['data4'] = $model4->getData();
        $data['title'] = 'Home | Data Employe';
        echo view('/employe/create', $data);
    }

    public function save()
    {
        if ($this->request->getPost('insurance') == null) {
            $rule_insurance = 'max_length[20]';
        } else {
            $rule_insurance = 'numeric|max_length[20]';
        }


        if (!$this->validate([
            'first_nm' => [
                'rules' => 'required|max_length[20]|alpha_space',
                'errors' => [
                    'required' => 'Harus diisi',
                    'max_length' => 'Maksimal 20 karakter',
                    'alpha_space' => 'Harus Huruf'
                ]
            ],
            'last_nm' => [
                'rules' => 'required|max_length[20]|alpha_space',
                'errors' => [
                    'required' => 'Harus diisi',
                    'max_length' => 'Maksimal 20 karakter',
                    'alpha_space' => 'Harus Huruf'
                ]
            ],
            'div' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus Pilih'
                ]
            ],
            'pos' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus Pilih'
                ]
            ],
            'stat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus Pilih'
                ]
            ],
            'right_leave' => [
                'rules' => 'required|numeric|max_length[2]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'numeric' => 'Harus angka',
                    'max_length' => 'Maksimal 2 karakter'
                ]
            ],
            'bank_cd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus Pilih'
                ]
            ],
            'no_rek' => [
                'rules' => 'required|numeric|max_length[20]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'numeric' => 'Harus angka',
                    'max_length' => 'Maksimal 20 karakter'
                ]
            ],
            'an_rek' => [
                'rules' => 'required|alpha_space|max_length[20]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'alpha_space' => 'Harus huruf',
                    'max_length' => 'Maksimal 20 karakter'
                ]
            ],
            'bpjs_ks' => [
                'rules' => 'required|numeric|max_length[20]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'numeric' => 'Harus angka',
                    'max_length' => 'Maksimal 20 karakter'
                ]
            ],
            'bpjs_tk' => [
                'rules' => 'required|numeric|max_length[20]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'numeric' => 'Harus angka',
                    'max_length' => 'Maksimal 20 karakter'
                ]
            ],
            'insurance' => [
                'rules' => $rule_insurance,
                'errors' => [
                    'numeric' => 'Harus angka',
                    'max_length' => 'Maksimal 20 karakter'
                ]
            ],
            'nik' => [
                'rules' => 'required|numeric|max_length[20]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'numeric' => 'Harus angka',
                    'max_length' => 'Maksimal 20 karakter'
                ]
            ],
            'last_edu' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'max_length' => 'Maksimal 20 karakter'
                ]
            ],
            'no_telp' => [
                'rules' => 'required|numeric|max_length[15]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'numeric' => 'Harus angka',
                    'max_length' => 'Maksimal 15 karakter'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|max_length[50]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'valid_email' => 'Email tidak valid',
                    'max_length' => 'Maksimal 50 karakter'
                ]
            ],
            'adress' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'max_length' => 'Maksimal 100 karakter'
                ]
            ],


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/employe/create')->withInput()->with('validation', $validation);
        }

        $model = new EmployeModel();
        $model2 = new UsersModel();

        $cek_img = $this->request->getFile('foto');
        $name = $this->request->getPost('nip') . "-profil.jpg";

        if ($cek_img == "") {

            $file = $name;
            copy('../public/img/placeholder.jpg', '../public/img/' . $name);
        } else {

            $cek_img->move(ROOTPATH . 'public/img', $name);
            $file = $name;

            $cek_img->move(ROOTPATH . 'public/img');
            $file = ['gambar' => $cek_img->getName()];
        }

        $data = array(
            'nip'  => $this->request->getPost('nip'),
            'first_name'  => $this->request->getPost('first_nm'),
            'last_name'  => $this->request->getPost('last_nm'),
            'division'  => $this->request->getPost('div'),
            'position'  => $this->request->getPost('pos'),
            'right_to_leave'  => $this->request->getPost('right_leave'),
            'email'  => $this->request->getPost('email'),
            'no_telp'  => $this->request->getPost('no_telp'),
            'join_date'  => date('Y-m-d H:i:s'),
            'status'  => $this->request->getPost('stat'),
            'bank_code'  => $this->request->getPost('bank_cd'),
            'bank_no'  => $this->request->getPost('no_rek'),
            'bank_account'  => $this->request->getPost('an_rek'),
            'bpjs_ks'  => $this->request->getPost('bpjs_ks'),
            'bpjs_tk'  => $this->request->getPost('bpjs_tk'),
            'insurance'  => $this->request->getPost('insurance'),
            'ktp'  => $this->request->getPost('nik'),
            'address'  => $this->request->getPost('adress'),
            'education'  => $this->request->getPost('last_edu'),
            'foto'  => $file,
        );

        $data2 = array(
            'nip'  => $this->request->getPost('nip'),
            'password'  => "12345",
            'created_at'  => date('Y-m-d H:i:s'),
            'allow'  => "N",
        );

        $model->saveEmploye($data);
        $model2->saveUsers($data2);
        return redirect()->to('/employe');
    }

    public function edit($id)
    {
        session();
        $data['validation'] = \Config\Services::validation();

        $model = new EmployeModel();
        $model1 = new DivisiModel();
        $model2 = new PositionModel();
        $model3 = new EmployestatusModel();
        $model4 = new BankAccountModel();

        $data['data'] = $model->getData($id)->getRow();
        $data['data1'] = $model1->getData();
        $data['data2'] = $model2->getData();
        $data['data3'] = $model3->getData();
        $data['data4'] = $model4->getData();

        $data['title'] = 'Home | Data Employe';
        echo view('/employe/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('nip');

        if ($this->request->getPost('insurance') == null) {
            $rule_insurance = 'max_length[20]';
        } else {
            $rule_insurance = 'numeric|max_length[20]';
        }


        if (!$this->validate([
            'first_nm' => [
                'rules' => 'required|max_length[20]|alpha_space',
                'errors' => [
                    'required' => 'Harus diisi',
                    'max_length' => 'Maksimal 20 karakter',
                    'alpha_space' => 'Harus Huruf'
                ]
            ],
            'last_nm' => [
                'rules' => 'required|max_length[20]|alpha_space',
                'errors' => [
                    'required' => 'Harus diisi',
                    'max_length' => 'Maksimal 20 karakter',
                    'alpha_space' => 'Harus Huruf'
                ]
            ],
            'div' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus Pilih'
                ]
            ],
            'pos' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus Pilih'
                ]
            ],
            'stat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus Pilih'
                ]
            ],
            'right_leave' => [
                'rules' => 'required|numeric|max_length[2]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'numeric' => 'Harus angka',
                    'max_length' => 'Maksimal 2 karakter'
                ]
            ],
            'bank_cd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus Pilih'
                ]
            ],
            'no_rek' => [
                'rules' => 'required|numeric|max_length[20]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'numeric' => 'Harus angka',
                    'max_length' => 'Maksimal 20 karakter'
                ]
            ],
            'an_rek' => [
                'rules' => 'required|alpha_space|max_length[20]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'alpha_space' => 'Harus huruf',
                    'max_length' => 'Maksimal 20 karakter'
                ]
            ],
            'bpjs_ks' => [
                'rules' => 'required|numeric|max_length[20]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'numeric' => 'Harus angka',
                    'max_length' => 'Maksimal 20 karakter'
                ]
            ],
            'bpjs_tk' => [
                'rules' => 'required|numeric|max_length[20]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'numeric' => 'Harus angka',
                    'max_length' => 'Maksimal 20 karakter'
                ]
            ],
            'insurance' => [
                'rules' => $rule_insurance,
                'errors' => [
                    'numeric' => 'Harus angka',
                    'max_length' => 'Maksimal 20 karakter'
                ]
            ],
            'nik' => [
                'rules' => 'required|numeric|max_length[20]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'numeric' => 'Harus angka',
                    'max_length' => 'Maksimal 20 karakter'
                ]
            ],
            'last_edu' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'max_length' => 'Maksimal 20 karakter'
                ]
            ],
            'no_telp' => [
                'rules' => 'required|numeric|max_length[15]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'numeric' => 'Harus angka',
                    'max_length' => 'Maksimal 15 karakter'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|max_length[50]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'valid_email' => 'Email tidak valid',
                    'max_length' => 'Maksimal 50 karakter'
                ]
            ],
            'adress' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'max_length' => 'Maksimal 100 karakter'
                ]
            ],


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/employe/edit/' . $id)->withInput()->with('validation', $validation);
        }

        $model = new EmployeModel();

        $img_old = $this->request->getPost('foto_old');
        $cek_img = $this->request->getFile('foto');
        $name = $this->request->getPost('nip') . "-profil.jpg";


        if ($cek_img == "") {

            $file = $img_old;
        } else {

            unlink('../public/img/' . $img_old);
            $cek_img->move(ROOTPATH . 'public/img', $name);
            $file = $name;
        }

        $id = $this->request->getPost('nip');
        $data = array(
            'first_name'  => $this->request->getPost('first_nm'),
            'last_name'  => $this->request->getPost('last_nm'),
            'division'  => $this->request->getPost('div'),
            'position'  => $this->request->getPost('pos'),
            'right_to_leave'  => $this->request->getPost('right_leave'),
            'email'  => $this->request->getPost('email'),
            'no_telp'  => $this->request->getPost('no_telp'),
            'status'  => $this->request->getPost('stat'),
            'bank_code'  => $this->request->getPost('bank_cd'),
            'bank_no'  => $this->request->getPost('no_rek'),
            'bank_account'  => $this->request->getPost('an_rek'),
            'bpjs_ks'  => $this->request->getPost('bpjs_ks'),
            'bpjs_tk'  => $this->request->getPost('bpjs_tk'),
            'insurance'  => $this->request->getPost('insurance'),
            'ktp'  => $this->request->getPost('nik'),
            'address'  => $this->request->getPost('adress'),
            'education'  => $this->request->getPost('last_edu'),
            'foto'  => $file,
        );
        $model->updateEmploye($data, $id);
        return redirect()->to('/employe');
    }
}