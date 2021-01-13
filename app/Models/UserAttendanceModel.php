<?php namespace App\Models;
use CodeIgniter\Model;
 
class UserAttendanceModel extends Model
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


public function get_absen($id, $bulan, $tahun)
    {
   
        return $this->db->table('attendance a')
        ->select("DATE_FORMAT(a.date, '%Y-%m-%d') AS date, a.check_in AS jam_masuk, a.check_out AS jam_pulang, a.overtime_in AS jam_masuk_lembur, a.overtime_out AS jam_pulang_lembur")
        ->where('nip', $id)
        ->where("DATE_FORMAT(date, '%m') = ", $bulan)
        ->where("DATE_FORMAT(date, '%Y') = ", $tahun)
        ->groupby("date")
        ->get()->getResultArray();
    
}




}