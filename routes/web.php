<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SantriController;

Route::get('/', function () {
    return view('pages.admin.dashboard');
})->name('admin.dashboard');

Route::get('/santri', function() {
    return view('pages.admin.santri');
})->name('admin.santri');

Route::get('/pembayaran-iuran', function() {
    return view('pages.admin.pembayaran_iuran');
})->name('admin.pembayaran_iuran');

Route::get('/riwayat-pembayaran', function() {
    return view('pages.admin.riwayat_pembayaran_iuran');
})->name('admin.riwayat_pembayaran_iuran');

/*
    Admin
        1. Dashboard
        2.
*/
