<?php
use App\Models\TimeModel;
use App\Models\DiscSubmissionModel; 

function __construct(){
    helper('all');
}

function cekLate($hour)
{

    $model= new TimeModel();

    if ($hour) {

        $jam_kerja = $model->cek_in();

        if ($hour > $jam_kerja->start) {
            
            return 'class="td_in_late"';
            
        }else{

            return 'class="td_in"';

        }
    }else {

        return 'class="td_in"';
    }
}

function cekSub($date, $nip)
{
    $model = new DiscSubmissionModel();

    $cek = $model->cek_sub($nip);
    $arr = array();
    $i_arr = 1;


    foreach ($cek as $i) {
        $start = $i['implementation_date_start'];
        $end = $i['implementation_date_end'];
        $range = range_date($start, $end);

        foreach ($range as $d) {
            $arr[$i_arr++] = strftime('%Y-%m-%d', date($d));
        }
        if (array_search($date, $arr) == TRUE) {
            $data['status'] = 'Y';
            $data['sub'][] = $i['submission_for'];
        } else {
            $data['status'] = 'N';
        }
    }
    return $data;
}

 
    


