<?php namespace App\Models;
use CodeIgniter\Model;
 
class DiscSubmissionModel extends Model
{
    protected $table = 'disc_submission';
     
    public function cek_sub($nip)
    {   

        return $this->db->table('disc_submission')
        ->where('status_sub', 'Y')
        ->where('user', $nip)
        ->orderby('id_sub','ASC')
        ->get()->getResultArray();   
}


} 