<?php

namespace App\Models;

use CodeIgniter\Model;

class AboutUsModel extends Model
{
    protected $table = 'about_us';
    protected $allowedFields = ['naper', 'nofax', 'notelp', 'email', 'website', 'alamatkantor', 'logo'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getAboutUs()
    {
        return $this->findall();
    }
}
