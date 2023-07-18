<?php

namespace App\Models;

use CodeIgniter\Model;

class Mod_detail_pengguna extends Model
{
    protected $table = 'tb_detail_pengguna';
    protected $primaryKey = 'id_detail_pengguna';
    protected $allowedFields = [
        'id_pengguna',
        'id_narkotika',
        'pasal',
    ];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';
    protected $deletedField  = '';
}
