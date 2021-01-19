<?php namespace App\Controllers;
 
use CodeIgniter\Controller;

use App\Models\AttendanceModel;
use App\Models\EmployeModel;
use App\Models\DivisiModel;
use App\Models\DiscSubmissionModel;



 
class DataAttendance extends BaseController
{

    public function __construct(){
        helper('all');
        helper('cekAttend');

    }
    
    public function index()
    {   
        $model= new DivisiModel();

        $data = $this->get_all_absen();
        $data['divisi'] = $model->getData();
        $data['title']= 'Home | Data Attendance';
        echo view('/dataAttendance/index',$data);
    }

    

    function htmlToPDF(){ 
        
        $model= new DivisiModel();

        $data = $this->get_all_absen_laporan();
        $div= $this->request->getPost('divisi');
        $data['namadivisi']=$model->getData($div)->getRow();

        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('/dataAttendance/printAll',$data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }

    public function get_all_absen()
    {    

        $model1= new AttendanceModel();
        $model2= new EmployeModel();
        $model3= new DivisiModel();
        
        $bulan= @$this->request->getPost('bulan') ? $this->request->getPost('bulan') : date('m');
        $tahun= @$this->request->getPost('tahun') ? $this->request->getPost('tahun') : date('Y');
        $div= @$this->request->getPost('divisi') ? $this->request->getPost('divisi') : false;

        $now= "$tahun-$bulan-01";

        $data['bulan']= $bulan;
        $data['tahun']= $tahun;
        $data['hari']= date_now($now);
        $data['all_bulan']= month();
        $data['bulanlaporan']= month($bulan);
        $data['divisi']=$model3->getData();
        $data['divisi_id']= $div;
        $data['employe']= $model2->cari($div);
        $employe= $data['employe'];
        $data['absen']= $this->get_absen($employe, $bulan, $tahun);

        return $data;
        
    }

    public function get_all_absen_laporan()
    {    

        $model1= new AttendanceModel();
        $model2= new EmployeModel();
        $model3= new DivisiModel();
        
        $bulan= @$this->request->getPost('bulan') ? $this->request->getPost('bulan') : date('m');
        $tahun= @$this->request->getPost('tahun') ? $this->request->getPost('tahun') : date('Y');
        $div= @$this->request->getPost('divisi') ? $this->request->getPost('divisi') : false;

        $now= "$tahun-$bulan-01";

        $data['bulan']= $bulan;
        $data['tahun']= $tahun;
        $data['hari_pertama']= date_now_half_pertama($now);
        $data['hari_kedua']= date_now_half_kedua($now);
        $data['all_bulan']= month();
        $data['bulanlaporan']= month($bulan);
        $data['divisi']=$model3->getData();
        $data['divisi_id']= $div;
        $data['employe']= $model2->cari($div);
        $employe= $data['employe'];
        $data['absen']= $this->get_absen($employe, $bulan, $tahun);

        return $data;
        
    }

    public function get_absen($employe, $bulan, $tahun){
        $model= new AttendanceModel();
        
        $absen= array();
        
        foreach($employe as $i){

            $absen[]= $model->get_absen($id=$i['nip'], $bulan, $tahun);
        }

        return $absen;

    }


   
     
}
 