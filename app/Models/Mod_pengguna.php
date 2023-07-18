<?php

namespace App\Models;

use CodeIgniter\Model;

class Mod_pengguna extends Model
{
    protected $table = 'tb_pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $allowedFields = [
        'kd_penahanan',
        'id_user',
        'hak_akses',
    ];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';
    protected $deletedField  = '';
}
