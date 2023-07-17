<?php

namespace App\Models;

use CodeIgniter\Model;

class Mod_narkotika extends Model
{
    protected $table = 'tb_narkotika';
    protected $primaryKey = 'id_narkotika';
    protected $allowedFields = [
        'nama_narkotika',
        'foto',
        'keterangan',
    ];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';
    protected $deletedField  = '';
}
