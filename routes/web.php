<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SantriController;

Route::prefix('auth')->group(function() {
    Route::get('login', function() {
        return view('pages.login');
    })->name('login');
});

Route::prefix('admin')->group(function() {
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

    Route::get('/bukti-pembayaran-iuran', function() {
        return view('pages.admin.bukti_pembayaran_iuran');
    })->name('admin.bukti_pemabayaran_iuran');

    Route::get('/setoran-tabungan', function() {
        return view('pages.admin.setoran_tabungan');
    })->name('admin.setoran_tabungan');

    Route::get('/penarikan-tabungan', function() {
        return view('pages.admin.penarikan_tabungan');
    })->name('admin.penarikan_tabungan');

    Route::get('/pengecekan-saldo', function() {
        return view('pages.admin.pengecekan_saldo_tabungan');
    })->name('admin.pengecekan_saldo');

    Route::get('/riwayat-transaksi-tabungan', function() {
        return view('pages.admin.riwayat_transaksi_tabungan');
    })->name('admin.riwayat_transaksi_tabungan');

    Route::get('/laporan-iuran', function() {
        return view('pages.admin.laporan_iuran');
    })->name('admin.laporan_iuran');

    Route::get('/laporan-tabungan', function() {
        return view('pages.admin.laporan_tabungan');
    })->name('admin.laporan_tabungan');
});

Route::prefix('santri')->group(function() {
    Route::get('/', function() {
        return view('pages.santri.dashboard');
    })->name('santri.dashboard');

    Route::get('/iuran', function() {
        return view('pages.santri.riwayat_pembayaran_iuran');
    })->name('santri.riwayat_pembayaran_iuran');

    Route::get('/pengecekan-saldo', function() {
        return view('pages.santri.pengecekan_saldo_tabungan');
    })->name('santri.pengecekan_saldo_tabungan');

    Route::get('/riwayat-transaksi', function() {
        return view('pages.santri.riwayat_transaksi_tabungan');
    })->name('santri.riwayat_transaksi_tabungan');
});
