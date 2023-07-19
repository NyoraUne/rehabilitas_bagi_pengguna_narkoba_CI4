<?php

namespace App\Models;

use CodeIgniter\Model;

class Mod_petugas extends Model
{
    protected $table = 'tb_petugas';
    protected $primaryKey = 'id_petugas';
    protected $allowedFields = [
        'id_user',
        'foto_petugas',
        'role',
    ];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';
    protected $deletedField  = '';
}
