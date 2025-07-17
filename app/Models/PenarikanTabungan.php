<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenarikanTabungan extends Model
{
    protected $table = 'penarikan_tabungan';
    public $timestamps = false;

    protected $fillable = ['nis', 'tanggal', 'total'];

    public function santri()
    {
        return $this->belongsTo(Santri::class, 'nis', 'nis');
    }
}
