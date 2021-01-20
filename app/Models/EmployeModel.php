<?php namespace App\Models;
use CodeIgniter\Model;
 
class EmployeModel extends Model
{
    protected $table = 'employe';
     
    public function getData($id = false)
    {
        if($id === false){
            return $this->db->table('employe')
            ->join('division','division.id=employe.division')
            ->join('position','position.id=employe.position')
            ->join('employe_status','employe_status.id=employe.status')
            ->join('bank_account','bank_account.bank_code=employe.bank_code')
            ->orderby('employe.join_date','DESC')
            ->get()->getResultArray();
        }else{
            return $this->db->table('employe')
            ->join('division','division.id=employe.division')
            ->join('position','position.id=employe.position')
            ->join('employe_status','employe_status.id=employe.status')
            ->join('bank_account','bank_account.bank_code=employe.bank_code')
            ->getWhere(['employe.nip' => $id]);
    }
}

public function getDataCount()
    {
       
        return $this->db->table('employe')
        ->orderby('nip','DESC')
        ->get()->getResultArray();

}

public function getDataLatest()
    {
       
        return $this->db->table('employe')
        ->join('division','division.id=employe.division')
        ->join('position','position.id=employe.position')
        ->join('employe_status','employe_status.id=employe.status')
        ->join('bank_account','bank_account.bank_code=employe.bank_code')
        ->orderby('employe.join_date','DESC')
        ->limit(8)
        ->get()->getResultArray();
       

}

public function getLastNumber($now)
    {
       
        return $this->db->table('employe')
        ->selectMax('nip')
        ->like('nip', $now)
        ->get()->getRow();

}

    public function saveEmploye($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function updateEmploye($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('nip' => $id));
        return $query;
    }
    public function deleteEmploye($id)
    {
        $query = $this->db->table($this->table)->delete(array('nip' => $id));
        return $query;
    } 

    public function cari($div= false)
    {
        if($div === false){
        return $this->db->table('employe')
        ->join('user','user.nip=employe.nip')
        ->where('user.allow', 'Y')
        ->orderby('employe.nip','DESC')
        ->get()->getResultArray();

        }else{
        return $this->db->table('employe')
        ->join('user','user.nip=employe.nip')
        ->where('user.allow', 'Y')
        ->where('employe.division', $div)
        ->orderby('employe.nip','DESC')
        ->get()->getResultArray();
        }

    }

    public function getDataPrint($div){
            return $this->db->table('employe')
            ->join('division','division.id=employe.division')
            ->join('position','position.id=employe.position')
            ->join('employe_status','employe_status.id=employe.status')
            ->join('bank_account','bank_account.bank_code=employe.bank_code')
            ->where('employe.division', $div)
            ->orderby('employe.join_date','DESC')
            ->get()->getResultArray();
    }

}