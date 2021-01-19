<?php 
use App\Models\CalenderModel;


function date_now($now)
    {
        $today= $now;
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

    function date_now_half_pertama($now)
    {
        $today= $now;
        $start= date('Y-m-01', strtotime($today));
        $end= date('Y-m-15', strtotime($today));
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

    function date_now_half_kedua($now)
    {
        $today= $now;
        $start= date('Y-m-16', strtotime($today));
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

    function range_date($start, $end)
    {
        $start= $start;
        $end= $end;

        $awal= strtotime($start);
        $akhir= strtotime($end);
 
        $hari = array();

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

function hari($d = 0)
{
    $hari_arr = [
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jum\'at',
        'Saturday' => 'Sabtu',
        'Sunday' => 'Minggu',
    ];

    if ($d !== 0) {
        return $hari_arr[$d];
    }
    return $hari_arr;
}

function tgl_hari($tgl)
{    
    $bulan = bulan(date('m', strtotime($tgl)));
    $hari = hari(date('l', strtotime($tgl)));
    return $hari . ', ' . date('d-', strtotime($tgl)) . $bulan . date('-Y', strtotime($tgl));
}

function hari_bulan($bulan, $tahun)
{
    $kalender = CAL_GREGORIAN;
    $jml_hari = cal_days_in_month($kalender, $bulan, $tahun);
    $hari_tgl = [];

    for ($i=1; $i <= $jml_hari; $i++) { 
        $tgl = $i . '-' . $bulan . '-' . $tahun;
        $hari_tgl[] = [
            'hari' => hari(date('l', strtotime($tgl))),
            'tgl' => date('d-m-Y', strtotime($tgl))
        ];
    }
    return $hari_tgl;
}

function date_event($date)
{
    $model= new CalenderModel();

    $d= strftime("%A", date($date));
    $get_date= strftime("%Y-%m-%d", date($date));
    $cek= $model->cek_event($get_date);


    if($cek == TRUE OR $d=="Sunday" OR $d=="Saturday" ){
        return 'Y';
    }else{
        return 'N';
}
} 

function zero($i)
{
    if($i < 10){
        return "0$i";
    }else{
        return $i;
    }
}


function alert($alert){
    if($alert == 'SAVE'){
       return "return  confirm('Are you sure to save?')";
    }
    else if($alert == 'UPDATE'){
        return "return  confirm('Are you sure to update?')";
     }
     else if($alert == 'DELETE'){
        return "return  confirm('Are you sure to delete?')";
     }
     else if($alert == 'APPROVE'){
        return "return  confirm('Are you sure to approve?')";
     }
     else if($alert == 'REJECT'){
        return "return  confirm('Are you sure to reject?')";
     }

}
/* End of File: d:\Ampps\www\project\absen-pegawai\application\helpers\Tanggal.php */ 