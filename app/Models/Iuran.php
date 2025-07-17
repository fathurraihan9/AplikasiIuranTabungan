<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iuran extends Model
{
    protected $table = 'iuran';
    public $timestamps = false;

    protected $fillable = ['nis', 'tanggal', 'jumlah', 'bukti'];

    public function santri()
    {
        return $this->belongsTo(Santri::class, 'nis', 'nis');
    }
}
