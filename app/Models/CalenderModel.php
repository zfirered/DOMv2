<?php namespace App\Models;
use CodeIgniter\Model;
 
class CalenderModel extends Model
{
    protected $table = 'calendar';
     
    public function cek_event($get_date)
    {   

        return $this->db->table('calendar')
            ->where("DATE_FORMAT(start, '%Y-%m-%d') = ", $get_date)
            ->get()->getResultArray();
        
}


}