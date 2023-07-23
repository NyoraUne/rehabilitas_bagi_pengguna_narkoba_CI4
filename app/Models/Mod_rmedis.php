<?php

namespace App\Models;

use CodeIgniter\Model;

class Mod_rmedis extends Model
{
    protected $table = 'tb_rekam_medis';
    protected $primaryKey = 'id_rekam_medis';
    protected $allowedFields = [
        'id_pengguna',
        'tgl_pemeriksaan',
        'hasil_pemeriksaan',
    ];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';
    protected $deletedField  = '';
}
