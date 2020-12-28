<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\EmployeModel;
use App\Models\DivisiModel;
use App\Models\PositionModel;
use App\Models\EmployestatusModel;
use App\Models\BankAccountModel;
use App\Models\UsersModel;
 
class Employe extends Controller
{
    public function index()
    {
        $model = new EmployeModel();
        $data['data'] = $model->getData();
        $data['latest'] = $model->getDataLatest();
        $data['title']= 'Home | Data Employe';
        echo view('/employe/index',$data);
    }

    public function create()
    {
        $model1= new DivisiModel();
        $model2= new PositionModel();
        $model3= new EmployestatusModel();
        $model4= new BankAccountModel();
       
          
        $data['data'] = $model1->getData();
        $data['data2'] = $model2->getData();
        $data['data3'] = $model3->getData();
        $data['data4'] = $model4->getData();
        $data['title']= 'Home | Data Employe';
        echo view('/employe/create',$data);
        
    }
 
    public function save()
    {
        $model = new EmployeModel();
        $model2 = new UsersModel();

        $default_img= "placeholder.jpg";
        $cek_img = $this->request->getFile('foto');
        
            if($cek_img == ""){

                $file = $default_img;

            } else {
               
                $cek_img->move(ROOTPATH.'public/img');
                $file= ['gambar' => $cek_img->getName()];

            }

        $data = array(
            'nip'  => $this->request->getPost('nip'),
            'first_name'  => $this->request->getPost('first_nm'),
            'last_name'  => $this->request->getPost('last_nm'),
            'division'  => $this->request->getPost('div'),
            'position'  => $this->request->getPost('pos'),
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

        $model = new EmployeModel();
        $model1= new DivisiModel();
        $model2= new PositionModel();
        $model3= new EmployestatusModel();
        $model4= new BankAccountModel();
       
        $data['data'] = $model->getData($id)->getRow(); 
        $data['data1'] = $model1->getData();
        $data['data2'] = $model2->getData();
        $data['data3'] = $model3->getData();
        $data['data4'] = $model4->getData();
       
        $data['title']= 'Home | Data Employe';
        echo view('/employe/edit',$data);
    }

    public function update()
    {
        $model = new EmployeModel();

        $img_old = $this->request->getPost('foto_old');
        $cek_img = $this->request->getFile('foto');
        
            if($cek_img == ""){

                $file = $img_old;

            } else {
               
                $cek_img->move(ROOTPATH.'public/img');
                $file= ['gambar' => $cek_img->getName()];
                unlink('../public/img/'.$img_old);

            }
            

        $id = $this->request->getPost('nip');
        $data = array(
            'first_name'  => $this->request->getPost('first_nm'),
            'last_name'  => $this->request->getPost('last_nm'),
            'division'  => $this->request->getPost('div'),
            'position'  => $this->request->getPost('pos'),
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

    public function delete($id)
    {
        $model = new EmployeModel();
        $data = $model->getData($id)->getRow(); 
        unlink('../public/img/'.$data->foto);
        $model->deleteEmploye($id);
        return redirect()->to('/employe');
    }
}
 
