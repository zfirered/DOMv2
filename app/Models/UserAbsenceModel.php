<?php namespace App\Models;
use CodeIgniter\Model;
 
class UserAbsenceModel extends Model
{
    protected $table = 'attendance';
     
    public function getData($id = false)
    {   
        
        if($id === false){
            return $this->db->table('employe')
            ->orderby('join_date','DESC')
            ->get()->getResultArray();
            ;
        }else{
            return $this->db->table('employe')
            ->join('division','division.id=employe.division')
            ->join('position','position.id=employe.position')
            ->join('employe_status','employe_status.id=employe.status')
            ->join('bank_account','bank_account.bank_code=employe.bank_code')
            ->getWhere(['employe.nip' => $id]);
    }
}


public function cek_absence($id, $date)
    {
   
        return $this->db->table('attendance')
        ->where('date', $date)
        ->getWhere(['nip' => $id]);
    
}

public function save_absent($data)
    {
   
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    
}

public function update_absent($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }

public function get_overtime_sub($date, $id){
    
    return $this->db->table('overtime_submission')
    ->where('user', $id)
    ->where('status_sub_ot', 'Y')
    ->getWhere(['DATE_FORMAT(implementation_date, "%Y-%m-%d")' => $date]);
}

public function get_timeout(){
    
    return $this->db->table('time')
    ->getWhere(['status' => 'out']);
}
    


}