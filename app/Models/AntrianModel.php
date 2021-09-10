<?php

namespace App\Models;

use CodeIgniter\Model;

class AntrianModel extends Model
{
    protected $table = 'antrian';
    protected $primaryKey = 'id_antrian';
    protected $allowedFields = [
        'nama_pelanggan', 'tanggal', 'status', 'id_pengguna'
    ];
    protected $returnType = 'object';
    protected $useTimestamps = false;
}
