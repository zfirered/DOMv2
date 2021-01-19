<?php namespace App\Models;
use CodeIgniter\Model;
 
class UserSubmissionOvertimeModel extends Model
{
    protected $table = 'overtime_submission';
     
public function getData($id)
    {   
        return $this->db->table('overtime_submission')
            ->join('employe','employe.nip=overtime_submission.approver')
            ->join('division','division.id=employe.division')
            ->join('position','position.id=employe.position')
            ->join('employe_status','employe_status.id=employe.status')
            ->where('overtime_submission.user', $id)
            ->orderby('overtime_submission.id_sub_ot', 'DESC')
            ->get()->getResultArray();      
}

public function getDataPending($id)
    {   
        return $this->db->table('overtime_submission')
            ->where('user', $id)
            ->getWhere(['status_sub_ot' => 'P']);
}

public function getDataSubApprover($id)
{    
    return $this->db->table('overtime_submission')
        ->join('employe','employe.nip=overtime_submission.user')
        ->join('division','division.id=employe.division')
        ->join('position','position.id=employe.position')
        ->join('employe_status','employe_status.id=employe.status')
        ->where('overtime_submission.approver', $id)
        ->orderby('overtime_submission.id_sub_ot', 'DESC')
        ->get()->getResultArray();      
}

public function saveSubmission($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

public function updateSubmission($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id_sub_ot' => $id));
        return $query;
    }
 
public function getDetailSub($id)
    {   
        return $this->db->table('overtime_submission')
            ->join('employe','employe.nip=overtime_submission.approver')
            ->join('division','division.id=employe.division')
            ->join('position','position.id=employe.position')
            ->join('employe_status','employe_status.id=employe.status')
            ->getWhere(['overtime_submission.id_sub_ot' => $id]);
}

public function getDetailApprover($id)
    {   
        return $this->db->table('overtime_submission')
            ->join('employe','employe.nip=overtime_submission.user')
            ->join('division','division.id=employe.division')
            ->join('position','position.id=employe.position')
            ->join('employe_status','employe_status.id=employe.status')
            ->getWhere(['overtime_submission.id_sub_ot' => $id]);
}



public function getDataEmploye($id)
    {
            return $this->db->table('employe')
            ->join('division','division.id=employe.division')
            ->join('position','position.id=employe.position')
            ->join('employe_status','employe_status.id=employe.status')
            ->getWhere(['employe.nip' => $id]);
    }

public function getDataApprover($div=false, $lev)
    {
        if($div==false){
            return $this->db->table('employe')
            ->join('division','division.id=employe.division')
            ->join('position','position.id=employe.position')
            ->join('employe_status','employe_status.id=employe.status')
            ->where('position.level', $lev)
            ->orderby('employe.nip', 'ASC')
            ->get()->getResultArray();
    }else{
        return $this->db->table('employe')
            ->join('division','division.id=employe.division')
            ->join('position','position.id=employe.position')
            ->join('employe_status','employe_status.id=employe.status')
            ->where('position.level', $lev)
            ->where('employe.division', $div)
            ->orderby('employe.nip', 'ASC')
            ->get()->getResultArray();
    }
}
} 