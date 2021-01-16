<?php

namespace App\Models;

use CodeIgniter\Model;

class AnnouncementModel extends Model
{
    protected $table = 'announcement';

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }
    }

    public function getDataLatest()
    {
        return $this->findAll();
    }

    public function saveAnnouncement($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}
