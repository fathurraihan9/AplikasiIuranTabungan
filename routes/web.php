<?php

use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SantriController;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\SantriMiddleware;
use App\Http\Middleware\RedirectIfAuthenticatedMulti;

Route::get('/', function () {
    return view('pages.welcome');
})->name('landing_page.welcome');

Route::get('/media', function () {
    return view('pages.media');
})->name('landing_page.media');

Route::get('/profil', function () {
    return view('pages.profil');
})->name('landing_page.profil');

Route::get('/kontak', function () {
    return view('pages.kontak');
})->name('landing_page.kontak');
Route::post('/kontak', [LandingPageController::class, 'TambahPesan'])->name('post.kontak');

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

    Route::get('/pesan', [LandingPageController::class, 'HalamanLihatPesan'])->name('admin.pesan');

    Route::get('/santri', [AdminController::class, 'HalamanSantri'])->name('admin.santri');
    Route::post('/santri', [AdminController::class, 'TambahSantri'])->name('post.tambah_santri');
    Route::delete('/santri/{nis}', [AdminController::class, 'HapusSantri'])->name('delete.hapus_santri');

    Route::get('/pembayaran-iuran', [AdminController::class, 'HalamanPembayaranIuran'])->name('admin.pembayaran_iuran');
    Route::post('/pembayaran-iuran', [AdminController::class, 'PembayaranIuran'])->name('post.pembayaran_iuran');

    Route::get('/riwayat-pembayaran', [AdminController::class, 'HalamanRiwayatPembayaranIuran'])->name('admin.riwayat_pembayaran_iuran');

    Route::get('/bukti-pembayaran-iuran/{id}', [AdminController::class, 'HalamanBuktiPembayaranIuran'])->name('admin.bukti_pemabayaran_iuran');

    Route::get('/setoran-tabungan', [AdminController::class, 'HalamanSetoranTabungan'])->name('admin.setoran_tabungan');
    Route::post('/setoran-tabungan', [AdminController::class, 'SetoranTabungan'])->name('post.setoran_tabungan');

    Route::get('/penarikan-tabungan', [AdminController::class, 'HalamanPenarikanTabungan'])->name('admin.penarikan_tabungan');
    Route::post('/penarikan-tabungan', [AdminController::class, 'PenarikanTabungan'])->name('post.penarikan_tabungan');

    Route::get('/pengecekan-saldo', [AdminController::class, 'HalamanPengecekanSaldo'])->name('admin.pengecekan_saldo');

    Route::get('/riwayat-transaksi-tabungan', [AdminController::class, 'HalamanRiwayatTransaksi'])->name('admin.riwayat_transaksi_tabungan');

    Route::get('/bukti-setoran/{id}', [AdminController::class, 'HalamanBuktiSetoran'])->name('admin.bukti_setoran');

    Route::get('/bukti-penarikan/{id}', [AdminController::class, 'HalamanBuktiPenarikan'])->name('admin.bukti_penarikan');

    Route::get('/laporan-iuran', [AdminController::class, 'HalamanLaporanIuran'])->name('admin.laporan_iuran');

    Route::get('/laporan-tabungan', [AdminController::class, 'HalamanLaporanTabungan'])->name('admin.laporan_tabungan');

});

Route::prefix('santri')->middleware([SantriMiddleware::class])->group(function () {
    Route::get('/', [SantriController::class, 'HalamanDashboard'])->name('santri.dashboard');

    Route::get('/iuran', [SantriController::class, 'HalamanRiwayatPembayaranIuran'])->name('santri.riwayat_pembayaran_iuran');

    Route::get('/iuran/{id}', [SantriController::class, 'HalamanBuktiPembayaranIuran'])->name('santri.bukti_pembayaran_iuran');

    Route::get('/pengecekan-saldo', [SantriController::class, 'HalamanPengecekanSaldo'])->name('santri.pengecekan_saldo_tabungan');

    Route::get('/riwayat-transaksi', [SantriController::class, 'HalamanRiwayatTransaksi'])->name('santri.riwayat_transaksi_tabungan');

    Route::get('/bukti-setoran/{id}', [SantriController::class, 'HalamanBuktiSetoran'])->name('santri.bukti_setoran');

    Route::get('/bukti-penarikan/{id}', [SantriController::class, 'HalamanBuktiPenarikan'])->name('santri.bukti_penarikan');
});

Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
