<?php

namespace App\Models;

use CodeIgniter\Model;

class KalenderModel extends Model
{
    protected $table = 'calendar';
    protected $useTimestamps = true;
    protected $allowedFields = ['agenda', 'color', 'start', 'end'];

    // public function get_event($id)
    // {
    //     return $this->where("id", $id);
    // }

    // public function get_events($start, $end)
    // {
    //     return $this->where("start >=", $start)
    //         ->where("end <=", $end);
    // }

    // public function update_event($id, $data)
    // {
    //     $db      = \Config\Database::connect();
    //     $builder = $db->table('calendar');
    //     $builder->getWhere("ID", $id);
    //     $builder->update($data);
    // }

    // public function delete_event($id)
    // {
    //     $db      = \Config\Database::connect();
    //     $builder = $db->table('calendar');
    //     $builder->getWhere("ID", $id);
    //     $builder->delete();
    // }
}
