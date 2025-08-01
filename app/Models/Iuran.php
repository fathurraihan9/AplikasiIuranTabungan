<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Iuran extends Model
{
    use HasFactory;

    protected $table = 'iuran';
    public $timestamps = false;

    protected $fillable = ['nis', 'tanggal', 'jumlah', 'bukti'];

    public function santri()
    {
        return $this->belongsTo(Santri::class, 'nis', 'nis');
    }
}
