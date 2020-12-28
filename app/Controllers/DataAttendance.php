<?php namespace App\Controllers;
 
use CodeIgniter\Controller;

use App\Models\AttendanceModel;
use App\Models\EmployeModel;

 
class DataAttendance extends Controller
{
    
    public function index()
    {   
        

        $data = $this->get_all_absen();
        $data['title']= 'Home | Data Attendance';
        echo view('/dataAttendance/index',$data);
    }

    public function get_all_absen()
    {   

        $model1= new AttendanceModel();
        $model2= new EmployeModel();
        

        
        $bulan= date('m');
        $tahun= date('Y');

        $data['bulan']= $this->month($bulan);
        $data['tahun']= $tahun;
        $data['hari']= $this->date();
        $data['employe']= $model2->cari();
        $data['absen']= $this->get_absen($bulan, $tahun);

        return $data;
        
    }

    public function get_absen($bulan, $tahun){
        $model1= new AttendanceModel();
        $model2= new EmployeModel();
        
        $nip= $model2->cari();
        $absen= array();
        
        foreach($nip as $i){

            $absen[]= $model1->get_absen($id=$i['nip'], $bulan, $tahun);
        }

        return $absen;

    }




    public function date()
    {
        $today= date('Y-m-d H:i:s');
        $start= date('Y-m-01', strtotime($today));
        $end= date('Y-m-t', strtotime($today));
        $awal = $start;
        $akhir = $end;
 
        // tanggalnya diubah formatnya ke Y-m-d 

        $awal = strtotime($awal);
        $akhir= strtotime($akhir);
 
        $hari = array();
        $sabtuminggu = array();
 
        for ($i=$awal; $i <= $akhir; $i += (60 * 60 * 24)) {
        $hari[] = $i; 
        }
        return $hari;
    }

    function month($m = 0)
{
    $bulan_arr = [
        '01' => 'January',
        '02' => 'February',
        '03' => 'March',
        '04' => 'April',
        '05' => 'May',
        '06' => 'June',
        '07' => 'July',
        '08' => 'August',
        '09' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December'
    ];

    if ($m !== 0) {
        return $bulan_arr[$m];
    }
    return $bulan_arr;
}

   
    
}
 