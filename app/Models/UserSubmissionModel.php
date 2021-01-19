<?php namespace App\Models;
use CodeIgniter\Model;
 
class UserSubmissionModel extends Model
{
    protected $table = 'disc_submission';
     
public function getData($id)
    {   
        return $this->db->table('disc_submission')
            ->join('employe','employe.nip=disc_submission.approver')
            ->join('division','division.id=employe.division')
            ->join('position','position.id=employe.position')
            ->join('employe_status','employe_status.id=employe.status')
            ->where('disc_submission.user', $id)
            ->orderby('disc_submission.id_sub', 'DESC')
            ->get()->getResultArray();      
}

public function getDataPending($id)
    {   
        return $this->db->table('disc_submission')
            ->where('user', $id)
            ->getWhere(['status_sub' => 'P']);
}

public function getDataSubApprover($id)
{    
    return $this->db->table('disc_submission')
        ->join('employe','employe.nip=disc_submission.user')
        ->join('division','division.id=employe.division')
        ->join('position','position.id=employe.position')
        ->join('employe_status','employe_status.id=employe.status')
        ->where('disc_submission.approver', $id)
        ->orderby('disc_submission.id_sub', 'DESC')
        ->get()->getResultArray();      
}

public function saveSubmission($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

public function updateSubmission($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id_sub' => $id));
        return $query;
    }
 
public function getDetailSub($id)
    {   
        return $this->db->table('disc_submission')
            ->join('employe','employe.nip=disc_submission.approver')
            ->join('division','division.id=employe.division')
            ->join('position','position.id=employe.position')
            ->join('employe_status','employe_status.id=employe.status')
            ->getWhere(['disc_submission.id_sub' => $id]);
}

public function getDetailApprover($id)
    {   
        return $this->db->table('disc_submission')
            ->join('employe','employe.nip=disc_submission.user')
            ->join('division','division.id=employe.division')
            ->join('position','position.id=employe.position')
            ->join('employe_status','employe_status.id=employe.status')
            ->getWhere(['disc_submission.id_sub' => $id]);
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