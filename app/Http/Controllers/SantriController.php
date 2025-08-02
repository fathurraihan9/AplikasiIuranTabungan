<?php

namespace App\Http\Controllers;

use App\Utils\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Iuran;
use App\Models\Tabungan;
use App\Models\PenarikanTabungan;
use App\Models\Notifikasi;

class SantriController extends Controller
{
    public function HalamanDashboard(Request $request)
    {
        $santri = Auth::guard('santri')->user();
        $total_iuran_santri = Iuran::where('nis', '=', $santri->nis)->sum('jumlah');
        $total_tabungan_santri = Tabungan::where('nis', '=', $santri->nis)->sum('setoran');
        $total_penarikan_tabungan_santri = PenarikanTabungan::where('nis', '=', $santri->nis)->sum('total');

        $total_saldo_tabungan = $total_tabungan_santri - $total_penarikan_tabungan_santri;

        $notifikasi = Notifikasi::with('santri')->get();
        $notifikasi = $notifikasi->sortDesc();

        foreach ($notifikasi as $n) {
            $n->jumlah = Helper::stringToRupiah($n->jumlah);
            $n->tanggal = Helper::getTanggalAttribute($n->tanggal);
        }

        return view('pages.santri.dashboard', [
            'santri' => $santri,
            'total_iuran' => Helper::stringToRupiah($total_iuran_santri),
            'total_saldo_tabungan' => Helper::stringToRupiah($total_saldo_tabungan),
            'notifikasi' => $notifikasi
        ]);
    }

    public function HalamanRiwayatPembayaranIuran()
    {
        $santri = Auth::guard('santri')->user();

        $transaksi_iuran = Iuran::where('nis', '=', $santri->nis)->get();

        foreach ($transaksi_iuran as $t) {
            $t->jumlah = Helper::stringToRupiah($t->jumlah);
            $t->tanggal = Helper::getTanggalAttribute($t->tanggal);
        }

        $notifikasi = Notifikasi::with('santri')->get();
        $notifikasi = $notifikasi->sortDesc();

        foreach ($notifikasi as $n) {
            $n->jumlah = Helper::stringToRupiah($n->jumlah);
            $n->tanggal = Helper::getTanggalAttribute($n->tanggal);
        }

        return view('pages.santri.riwayat_pembayaran_iuran', [
            'santri' => $santri,
            'transaksi_iuran' => $transaksi_iuran,
            'notifikasi' => $notifikasi
        ]);
    }

    public function HalamanBuktiPembayaranIuran(Request $request, string $bukti)
    {
        return view('pages.santri.bukti_pembayaran_iuran', [
            'bukti' => $bukti
        ]);
    }

    public function HalamanPengecekanSaldo()
    {
        $santri = Auth::guard('santri')->user();

        $tabungan = Tabungan::where('nis', '=', $santri->nis)->get();

        foreach ($tabungan as $t) {
            $t->setoran = Helper::stringToRupiah($t->setoran);
            $t->tanggal = Helper::getTanggalAttribute($t->tanggal);
        }
        $notifikasi = Notifikasi::with('santri')->get();
        $notifikasi = $notifikasi->sortDesc();

        foreach ($notifikasi as $n) {
            $n->jumlah = Helper::stringToRupiah($n->jumlah);
            $n->tanggal = Helper::getTanggalAttribute($n->tanggal);
        }

        return view('pages.santri.pengecekan_saldo_tabungan', [
            'santri' => $santri,
            'tabungan' => $tabungan,
            'notifikasi' => $notifikasi
        ]);
    }

    public function HalamanRiwayatTransaksi()
    {
        $santri = Auth::guard('santri')->user();

        $transaksi_tabungan = Tabungan::select(
            'id',
            'tanggal',
            'setoran as jumlah',
            DB::raw("'Setor' as jenis"),
            DB::raw("'Setor tabungan' as keterangan")
        )
            ->where('nis', $santri->nis)
            ->unionAll(
                PenarikanTabungan::select(
                    'id',
                    'tanggal',
                    'total as jumlah',
                    DB::raw("'Tarik' as jenis"),
                    DB::raw("'Tarik tabungan' as keterangan")
                )->where('nis', $santri->nis)
            )
            ->orderBy('tanggal', 'desc') // urutkan berdasarkan tanggal terbaru
            ->get();

        foreach ($transaksi_tabungan as $t) {
            $t->jumlah = Helper::stringToRupiah($t->jumlah);
            $t->tanggal = Helper::getTanggalAttribute($t->tanggal);
        }
        $notifikasi = Notifikasi::with('santri')->get();
        $notifikasi = $notifikasi->sortDesc();

        foreach ($notifikasi as $n) {
            $n->jumlah = Helper::stringToRupiah($n->jumlah);
            $n->tanggal = Helper::getTanggalAttribute($n->tanggal);
        }
        return view('pages.santri.riwayat_transaksi_tabungan', [
            'santri' => $santri,
            'transaksi_tabungan' => $transaksi_tabungan,
            'notifikasi' => $notifikasi
        ]);
    }

    public function HalamanBuktiSetoran(Request $request, string $id)
    {
        $transaksi_tabungan = Tabungan::with('santri')->find($id);

        foreach ($transaksi_tabungan as $t) {
            $t->tanggal = Helper::getTanggalAttribute($t->tanggal);
        }

        return view('pages.santri.bukti_setoran', [
            'transaksi_tabungan' => $transaksi_tabungan
        ]);
    }

    public function HalamanBuktiPenarikan(Request $request, string $id)
    {
        $transaksi_tabungan = PenarikanTabungan::with('santri')->find($id);

        foreach ($transaksi_tabungan as $t) {
            $t->tanggal = Helper::getTanggalAttribute($t->tanggal);
        }

        return view('pages.santri.bukti_penarikan', [
            'transaksi_tabungan' => $transaksi_tabungan
        ]);
    }

}
