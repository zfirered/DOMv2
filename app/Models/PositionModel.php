<?php namespace App\Models;
use CodeIgniter\Model;
 
class PositionModel extends Model
{
    protected $table = 'position';
     
    public function getData($id = false)
    {
        if($id === false){
            return $this->db->table('position')
            ->orderby('level','ASC')
            ->get()->getResultArray();

        }else{
            return $this->getWhere(['id' => $id]);
        }   
    } 
    public function savePosition($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function updatePosition($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }
    public function deletePosition($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    } 
 
}