<?php namespace App\Models;
use CodeIgniter\Model;
 
class EmployestatusModel extends Model
{
    protected $table = 'employe_status';
     
    public function getData($id = false)
    {
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['id' => $id]);
        }   
    }
    public function saveEmployestatus($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function updateEmployestatus($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }
    public function deleteEmployestatus($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    } 
 
}