<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tabungan extends Model
{
    protected $table = 'tabungan';
    public $timestamps = false;

    protected $fillable = ['nis', 'tanggal', 'setoran'];

    public function santri()
    {
        return $this->belongsTo(Santri::class, 'nis', 'nis');
    }
}
