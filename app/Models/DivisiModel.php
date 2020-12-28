<?php namespace App\Models;
use CodeIgniter\Model;
 
class DivisiModel extends Model
{
    protected $table = 'division';
     
    public function getData($id = false)
    {
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['id' => $id]);
        }   
    }
    public function saveDivisi($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function updateDivisi($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }
    public function deleteDivisi($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    } 
 
}