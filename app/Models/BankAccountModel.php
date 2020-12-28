<?php namespace App\Models;
use CodeIgniter\Model;
 
class BankAccountModel extends Model
{
    protected $table = 'bank_account';
     
    public function getData($id = false)
    {
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['bank_code' => $id]);
        }   
    }
    public function saveBankAccount($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function updateBankAccount($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('bank_code' => $id));
        return $query;
    }
    public function deleteBankAccount($id)
    {
        $query = $this->db->table($this->table)->delete(array('bank_code' => $id));
        return $query;
    } 
 
}