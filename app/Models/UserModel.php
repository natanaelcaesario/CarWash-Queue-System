<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $allowedFields = [
        'nama', 'nomorhandphone', 'email', 'password', 'gambar'
    ];
    protected $returnType = 'App\Entities\User';
    protected $useTimestamps = false;
}
