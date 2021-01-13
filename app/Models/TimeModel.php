<?php namespace App\Models;
use CodeIgniter\Model;
 
class TimeModel extends Model
{
    protected $table = 'time';
     
    
    public function getIn()
    {
        return $this->db->table('time')
        ->getWhere(['status' => 'in'])
        ->getrow();
        ;
    }

    public function getOut()
    {
        return $this->db->table('time')
        ->getWhere(['status' => 'out'])
        ->getrow();
        ;
    }

    public function cek_in()
    {
        return $this->db->table('time')
        ->getWhere(['status' => 'in'])
        ->getrow()
        ;
    }
    
    public function updateTime($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id_time' => $id));
        return $query;
    }
}