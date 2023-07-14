<?php

namespace App\Models;

use CodeIgniter\Model;

class Mod_user extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = [
        'nik_user',
        'nama_user',
        'lahir_user',
        'tgllahir_user',
        'jekel_user',
        'alamat_user',
        'desa_user',
        'kecamatan_user',
        'kabupaten_user',
        'rt_user',
        'rw_user',
        'agama_user',
        'kawin_user',
        'pekerjaan_user',
        'ktp_user',
        'slug',
    ];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';
    protected $deletedField  = '';
}
