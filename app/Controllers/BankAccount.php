<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BankAccountModel;

class BankAccount extends Controller
{
    public function __construct()
    {
        helper('all');
    }

    public function index()
    {
        $model = new BankAccountModel();
        $data['data'] = $model->getData();
        $data['title'] = 'Home | Master Bank Account';
        echo view('/bankAccount/index', $data);
    }

    function htmlToPDF(){

        $model = new BankAccountModel();
        $data['data'] = $model->getData();
        $data['bulan'] = month(date('m'));
        $data['tahun'] = date('Y');


        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('/bankAccount/printAll',$data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    } 

    public function create()
    {
        session();
        $data['validation']= \Config\Services::validation();

        $data['title']= 'Home | Master Bank Account';
        echo view('/bankAccount/create',$data);
       
    }

    public function save()
    {
        if(!$this->validate([
            'bank_cd' => [
                'rules' => 'required|max_length[10]|is_unique[bank_account.bank_code]',
                'errors' => [
                    'required' => 'Harus diisi',
                    'max_length' => 'Maksimal 10 karakter',
                    'is_unique' => 'Bank Code sudah ada'
                ]
                ],
                'bank_nm' => [
                    'rules' => 'required|max_length[20]|is_unique[bank_account.bank_name]',
                    'errors' => [
                        'required' => 'Harus Diisi',
                        'max_length' => 'Maksimal 20 karakter',
                        'is_unique' => 'Bank Name sudah ada'
                ]
                ],
                           
        ])){ 
     $validation= \Config\Services::validation();
     return redirect()->to('/bankAccount/create')->withInput()->with('validation',$validation);
        }

        $model = new BankAccountModel();
        $data = array(
            'bank_code'  => $this->request->getPost('bank_cd'),
            'bank_name'  => $this->request->getPost('bank_nm'),
        );
        $model->saveBankAccount($data);
        return redirect()->to('/bankAccount');
    }

    public function edit($id)
    {
        session();
        $data['validation']= \Config\Services::validation();

        $model = new BankAccountModel();
        $data['data'] = $model->getData($id)->getRow();
        $data['title'] = 'Home | Master Bank Account';
        echo view('/bankAccount/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('bank_cd');
        
        if($this->request->getPost('bank_nm_old') == $this->request->getPost('bank_nm')){
            $rule= 'required|max_length[20]';
        }else{
            $rule= 'required|is_unique[bank_account.bank_name]|max_length[20]';
        }

        if(!$this->validate([
                'bank_nm' => [
                    'rules' => $rule,
                    'errors' => [
                        'required' => 'Harus Diisi',
                        'max_length' => 'Maksimal 20 karakter',
                        'is_unique' => 'Bank Name sudah ada'
                ]
                ],
                           
        ])){ 
     $validation= \Config\Services::validation();
     return redirect()->to('/bankAccount/edit/'.$id)->withInput()->with('validation',$validation);
        }

        $model = new BankAccountModel();
        $id = $this->request->getPost('bank_cd');
        $data = array(
            'bank_code'  => $this->request->getPost('bank_cd'),
            'bank_name'  => $this->request->getPost('bank_nm'),
        );
        $model->updateBankAccount($data, $id);
        return redirect()->to('/bankAccount');
    }

    public function delete($id)
    {
        $model = new BankAccountModel();
        $model->deleteBankAccount($id);
        return redirect()->to('/bankAccount');
    }
}
