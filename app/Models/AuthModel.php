<?php namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model{
    function get_data_login($nip,$tbl){
        $builder = $this->db->table($tbl);
        $builder->where('nip',$nip);
        $log = $builder->get()->getRow();
        return $log;
    }
}