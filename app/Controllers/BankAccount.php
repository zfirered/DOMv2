<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\BankAccountModel;
 
class BankAccount extends Controller
{
    public function index()
    {
        $model = new BankAccountModel();
        $data['data'] = $model->getData();
        $data['title']= 'Home | Master Bank Account';
        echo view('/bankAccount/index',$data);
    }

    public function create()
    {
        $data['title']= 'Home | Master Bank Account';
        echo view('/bankAccount/create',$data);
        
    }
 
    public function save()
    {
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
        $model = new BankAccountModel();
        $data['data'] = $model->getData($id)->getRow();
        $data['title']= 'Home | Master Bank Account';
        echo view('/bankAccount/edit',$data);
    }

    public function update()
    {
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
 
