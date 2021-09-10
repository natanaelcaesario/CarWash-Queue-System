<?php

namespace App\Models;

use CodeIgniter\Model;

class SewaModel extends Model
{
    protected $table = 'sewa';
    protected $primaryKey = 'id_sewa';
    protected $allowedFields = [
        'lokasi_jemput', 'nama', 'nomorhandphone',
        'tglsewa', 'tglkembali', 'kode_booking', 'plat_motor', 'motor',
        'status', 'bukti_bayar', 'bank', 'harga', 'id_motor', 'id_pengguna', 'denda', 'keterangan', 'deadline', 'tanggaltransaksi', 'id_admin'
    ];
    protected $returnType = 'object';
    protected $useTimestamps = false;
}
