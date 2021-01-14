<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nip', 'password', 'role'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getDataAPI($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        } else {
            return $this->getWhere('id', $id)->getRowArray();
        }
    }

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->db->table('user')
                ->join('employe', 'employe.nip=user.nip')
                ->orderby('user.nip', 'DESC')
                ->get()->getResultArray();
        } else {
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
