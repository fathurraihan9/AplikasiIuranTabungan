<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenarikanTabungan extends Model
{
    use HasFactory;

    protected $table = 'penarikan_tabungan';
    public $timestamps = false;

    protected $fillable = ['nis', 'tanggal', 'total'];

    public function santri()
    {
        return $this->belongsTo(Santri::class, 'nis', 'nis');
    }
}
