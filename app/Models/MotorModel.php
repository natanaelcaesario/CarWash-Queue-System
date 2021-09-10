<?php

namespace App\Models;

use CodeIgniter\Model;

class MotorModel extends Model
{
    protected $table = 'motor';
    protected $primaryKey = 'id_motor';
    protected $allowedFields = [
        'nama_motor', 'plat_motor', 'harga_sewa', 'deskripsi', 'gambar_motor', 'status'
    ];
    protected $returnType = 'App\Entities\Motor';
    protected $useTimestamps = false;
}
