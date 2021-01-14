<?php

namespace App\Models;

use CodeIgniter\Model;

class AboutUsModel extends Model
{
    protected $table = 'about_us';

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->db->table('about_us')
                ->join('division', 'division.id=employe.division')
                ->join('position', 'position.id=employe.position')
                ->join('employe_status', 'employe_status.id=employe.status')
                ->join('bank_account', 'bank_account.bank_code=employe.bank_code')
                ->orderby('employe.join_date', 'DESC')
                ->get()->getResultArray();
        } else {
            return $this->db->table('about_us')
                ->join('division', 'division.id=employe.division')
                ->join('position', 'position.id=employe.position')
                ->join('employe_status', 'employe_status.id=employe.status')
                ->join('bank_account', 'bank_account.bank_code=employe.bank_code')
                ->getWhere(['employe.nip' => $id]);
        }
    }

    public function saveAboutUs($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateAboutUs($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }
}
