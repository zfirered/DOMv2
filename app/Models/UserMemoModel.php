<?php namespace App\Models;
use CodeIgniter\Model;
 
class UserMemoModel extends Model
{
    protected $table = 'memo';
     
public function getDataMemo($id)
    {   
        return $this->db->table('memo')
            ->join('employe','employe.nip=memo.sender')
            ->where('memo.receiver', $id)
            ->orderby('memo.id', 'DESC')
            ->get()->getResultArray();      
}

public function getDataMemoSend($id)
    {   
        return $this->db->table('memo')
            ->join('employe','employe.nip=memo.receiver')
            ->where('memo.sender', $id)
            ->orderby('memo.id', 'DESC')
            ->get()->getResultArray();      
}

public function getDetailMemo($id)
    {   
        return $this->db->table('memo')
            ->join('employe','employe.nip=memo.sender')
            ->getWhere(['memo.id' => $id]);      
}

public function getDetailMemoSend($id)
    {   
        return $this->db->table('memo')
            ->join('employe','employe.nip=memo.receiver')
            ->getWhere(['memo.id' => $id]);      
}

public function getDataEmploye($id)
    {
            return $this->db->table('employe')
            ->getWhere(['nip' => $id]);
    }

public function getReceiver($id)
    {
            return $this->db->table('employe')
            ->join('position','position.id=employe.position')
            ->where('division' , $id)
            ->orderby('position', 'ASC')
            ->get()->getResultArray();      
    }

public function saveMemo($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    


} 