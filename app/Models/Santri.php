<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Hidehalo\Nanoid\Client as Nanoid;

class Santri extends Model
{
    protected $table = 'santri';
    protected $primaryKey = 'nis';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['nis', 'nama', 'kelas', 'password'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($santri) {
            if (empty($santri->nis)) {
                $nanoid = new Nanoid();
                $santri->nis = $nanoid->generateId(8); // CHAR(8)
            }
        });
    }

    // Relasi
    public function iuran()
    {
        return $this->hasMany(Iuran::class, 'nis', 'nis');
    }

    public function tabungan()
    {
        return $this->hasMany(Tabungan::class, 'nis', 'nis');
    }

    public function penarikan()
    {
        return $this->hasMany(PenarikanTabungan::class, 'nis', 'nis');
    }
}
