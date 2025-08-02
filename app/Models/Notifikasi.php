<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notifikasi extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'notifikasi';

    // Kolom yang boleh diisi
    protected $fillable = [
        'jenis_transaksi',
        'nis',
        'jumlah',
        'tanggal',
        'keterangan',
    ];

    /**
     * Relasi ke tabel Santri
     * Notifikasi dimiliki oleh satu Santri.
     */
    public function santri()
    {
        return $this->belongsTo(Santri::class, 'nis', 'nis');
    }
}
