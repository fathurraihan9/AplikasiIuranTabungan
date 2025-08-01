<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SantriController;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\SantriMiddleware;
use App\Http\Middleware\RedirectIfAuthenticatedMulti;

Route::get('/', function () {
    return redirect('/auth/login');
});

Route::prefix('auth')->middleware([RedirectIfAuthenticatedMulti::class])->group(function () {
    Route::get('', function () {
        return redirect('/auth/login');
    });

    Route::get('login', function () {
        return view('pages.login');
    })->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('post.login');
});

Route::prefix('admin')->middleware([AdminMiddleware::class])->group(function () {
    Route::get('/', [AdminController::class, 'HalamanDashboard'])->name('admin.dashboard');

    Route::get('/santri', [AdminController::class, 'HalamanSantri'])->name('admin.santri');
    Route::post('/santri', [AdminController::class, 'TambahSantri'])->name('post.tambah_santri');

    Route::get('/pembayaran-iuran', [AdminController::class, 'HalamanPembayaranIuran'])->name('admin.pembayaran_iuran');
    Route::post('/pembayaran-iuran', [AdminController::class, 'PembayaranIuran'])->name('post.pembayaran_iuran');

    Route::get('/riwayat-pembayaran', [AdminController::class, 'HalamanRiwayatPembayaranIuran'])->name('admin.riwayat_pembayaran_iuran');

    Route::get('/bukti-pembayaran-iuran/{bukti}', [AdminController::class, 'HalamanBuktiPembayaranIuran'])->name('admin.bukti_pemabayaran_iuran');

    Route::get('/setoran-tabungan', [AdminController::class, 'HalamanSetoranTabungan'])->name('admin.setoran_tabungan');
    Route::post('/setoran-tabungan', [AdminController::class, 'SetoranTabungan'])->name('post.setoran_tabungan');

    Route::get('/penarikan-tabungan', [AdminController::class, 'HalamanPenarikanTabungan'])->name('admin.penarikan_tabungan');
    Route::post('/penarikan-tabungan', [AdminController::class, 'PenarikanTabungan'])->name('post.penarikan_tabungan');

    Route::get('/pengecekan-saldo', [AdminController::class, 'HalamanPengecekanSaldo'])->name('admin.pengecekan_saldo');

    Route::get('/riwayat-transaksi-tabungan', [AdminController::class, 'HalamanRiwayatTransaksi'])->name('admin.riwayat_transaksi_tabungan');

    Route::get('/laporan-iuran', function () {
        return view('pages.admin.laporan_iuran');
    })->name('admin.laporan_iuran');

    Route::get('/laporan-tabungan', function () {
        return view('pages.admin.laporan_tabungan');
    })->name('admin.laporan_tabungan');

});

Route::prefix('santri')->middleware([SantriMiddleware::class])->group(function () {

    Route::get('/', function () {
        return view('pages.santri.dashboard');
    })->name('santri.dashboard');

    Route::get('/iuran', function () {
        return view('pages.santri.riwayat_pembayaran_iuran');
    })->name('santri.riwayat_pembayaran_iuran');

    Route::get('/pengecekan-saldo', function () {
        return view('pages.santri.pengecekan_saldo_tabungan');
    })->name('santri.pengecekan_saldo_tabungan');

    Route::get('/riwayat-transaksi', function () {
        return view('pages.santri.riwayat_transaksi_tabungan');
    })->name('santri.riwayat_transaksi_tabungan');
});

Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
