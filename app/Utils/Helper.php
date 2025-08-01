<?php

namespace App\Utils;

class Helper
{
    public static function stringToRupiah($angka)
    {
        $angka = (int) $angka; // Pastikan angka
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}
