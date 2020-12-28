<?php namespace App\Models;
use CodeIgniter\Model;
 
class UsersModel extends Model
{
    protected $table = 'user';
     
    public function getData($id = false)
    {
        if($id === false){
            return $this->db->table('user')
            ->join('employe','employe.nip=user.nip')
            ->orderby('user.nip','DESC')
            ->get()->getResultArray();

        }else{
            return $this->getWhere(['nip' => $id]);
        }   
    }

    public function saveUsers($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
  
    public function updateUsers($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('nip' => $id));
        return $query;
    }
  
 
}