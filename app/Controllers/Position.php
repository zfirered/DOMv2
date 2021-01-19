<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\PositionModel;
 
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
        $data['title']= 'Home | Master Position';
        echo view('/position/index',$data);
    }

    function htmlToPDF(){

        $model = new PositionModel();
        $data['data'] = $model->getData();
        $data['bulan'] = month(date('m'));
        $data['tahun'] = date('Y');

        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('/position/printAll',$data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    } 

    public function create()
    {
        session();
        $data['validation']= \Config\Services::validation();

        $data['title']= 'Home | Master Position';
        echo view('/position/create',$data);
        
    }
 
    public function save()
    {
        if(!$this->validate([
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
                        'required' => 'Harus diisi'
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
                
           
        ])){ 
     $validation= \Config\Services::validation();
     return redirect()->to('/position/create')->withInput()->with('validation',$validation);
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
        $data['data'] = $model->getData($id)->getRow();
        $data['title']= 'Home | Master Position';
        echo view('/position/edit',$data);
    }

    public function update()
    {
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
 
