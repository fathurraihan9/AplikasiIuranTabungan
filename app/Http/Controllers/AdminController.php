<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Utils\Helper;
use App\Models\Santri;
use App\Models\Iuran;
use App\Models\Tabungan;
use App\Models\PenarikanTabungan;

class AdminController extends Controller
{
    public function HalamanDashboard()
    {
        $total_santri = Santri::count();
        $total_iuran = Iuran::sum('jumlah');
        $total_penarikan = PenarikanTabungan::sum('total');
        $total_tabungan = Tabungan::sum('setoran');

        return view('pages.admin.dashboard', [
            'total_santri' => $total_santri,
            'total_iuran' => Helper::stringToRupiah($total_iuran),
            'total_tabungan' => Helper::stringToRupiah($total_tabungan - $total_penarikan)
        ]);
    }

    public function HalamanSantri()
    {
        $santri = Santri::all();

        return view('pages.admin.santri', [
            'santri' => $santri
        ]);
    }

    public function TambahSantri(Request $request)
    {
        $request->validate([
            'nis' => ['min:8', 'max:8', 'required'],
            'nama' => ['required'],
            'jenis_kelamin' => ['required'],
            'kelas' => ['required'],
        ]);

        $data = [
            'nis' => $request->input('nis'),
            'nama' => $request->input('nama'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'kelas' => $request->input('kelas'),
            'password' => Hash::make($request->input('nis'))
        ];

        Santri::create($data);

        return redirect()
            ->route('admin.santri')
            ->with('msg_success', 'Santri Berhasil Ditambahkan');
    }

    public function HalamanPembayaranIuran()
    {
        $data_santri = Santri::all();

        return view('pages.admin.pembayaran_iuran', [
            'santri' => $data_santri
        ]);
    }

    public function PembayaranIuran(Request $request)
    {
        $request->validate([
            'tanggal' => ['required', 'date'],
            'nis' => ['required'],
            'nama' => ['required'],
            'jumlah' => ['required'],
            'bukti' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ]);

        $nis = $request->input('nis');

        $file = $request->file('bukti');

        $extension = $file->getClientOriginalExtension();
        $filename = time() . '_' . $nis . '.' . $extension;

        // simpan ke storage/app/public/bukti
        $file->storePubliclyAs('bukti', $filename, 'public');

        $data = [
            'tanggal' => $request->input('tanggal'),
            'nis' => $nis,
            'jumlah' => $request->input('jumlah'),
            'bukti' => $filename
        ];

        Iuran::create($data);

        return redirect()
            ->route('admin.pembayaran_iuran')
            ->with('msg_success', 'Pembayaran Iuran Berhasil');
    }

    public function HalamanRiwayatPembayaranIuran(Request $request)
    {
        $iuran = Iuran::with('santri')->get();

        return view('pages.admin.riwayat_pembayaran_iuran', [
            'iuran' => $iuran
        ]);
    }

    public function HalamanBuktiPembayaranIuran(Request $request, string $bukti)
    {
        return view('pages.admin.bukti_pembayaran_iuran', [
            'bukti' => $bukti
        ]);
    }

    public function HalamanSetoranTabungan(Request $request)
    {
        $data_santri = Santri::all();

        return view('pages.admin.setoran_tabungan', [
            'santri' => $data_santri
        ]);
    }

    public function SetoranTabungan(Request $request)
    {
        $request->validate([
            'tanggal' => ['required', 'date'],
            'nis' => ['required'],
            'nama' => ['required'],
            'setoran' => ['required'],
        ]);

        $data = [
            'nis' => $request->input('nis'),
            'tanggal' => $request->input('tanggal'),
            'setoran' => $request->input('setoran')
        ];

        Tabungan::create($data);

        return redirect()
            ->route('admin.setoran_tabungan')
            ->with('msg_success', 'Setoran Berhasil');
    }

    public function HalamanPenarikanTabungan(Request $request)
    {
        $data_santri = Santri::all();
        $total_penarikan = PenarikanTabungan::sum('total');
        $total_tabungan = Tabungan::sum('setoran');

        return view('pages.admin.penarikan_tabungan', [
            'santri' => $data_santri,
            'total_tabungan' => Helper::stringToRupiah($total_tabungan - $total_penarikan)
        ]);
    }

    public function PenarikanTabungan(Request $request)
    {
        $request->validate([
            'nis' => ['required'],
            'tanggal' => ['required', 'date'],
            'total' => ['required']
        ]);

        $data = [
            'nis' => $request->input('nis'),
            'tanggal' => $request->input('tanggal'),
            'total' => $request->input('total'),
        ];

        $santri = Santri::where('nis', '=', $data['nis'])->first();

        $total_tabungan_santri = Tabungan::where('nis', "=", $data['nis'])
            ->sum('setoran');

        $total_penarikan_tabungan_santri = PenarikanTabungan::where('nis', "=", $data['nis'])
            ->sum('total');

        $saldo_santri = $total_tabungan_santri - $total_penarikan_tabungan_santri;

        if ($saldo_santri < $data['total']) {
            return redirect()
                ->route('admin.penarikan_tabungan')
                ->with('msg_error', 'Saldo Tidak Cukup, Saldo Santri ' . $santri->nama . ': ' . Helper::stringToRupiah($saldo_santri));
        }

        PenarikanTabungan::create($data);

        return redirect()
            ->route('admin.penarikan_tabungan')
            ->with('msg_success', 'Berhasil Menarik Tabungan');
    }

    public function HalamanPengecekanSaldo(Request $request)
    {
        $santri = Santri::withSum('tabungan', 'setoran')
            ->withSum('penarikan_tabungan', 'total')
            ->get();

        $total_tabungan_santri = Tabungan::sum('setoran');

        $total_penarikan_tabungan_santri = PenarikanTabungan::sum('total');

        return view('pages.admin.pengecekan_saldo_tabungan', [
            'santri' => $santri,
            'jumlah_saldo' => Helper::stringToRupiah($total_tabungan_santri - $total_penarikan_tabungan_santri)
        ]);
    }

    public function HalamanRiwayatTransaksi(Request $request)
    {
        $transaksi = Tabungan::select(
            'id',
            'nis',
            'tanggal',
            'setoran',
            DB::raw("'setoran' as jenis"),
            DB::raw("'Setor tabungan' as keterangan")
        )
            ->unionAll(
                PenarikanTabungan::select(
                    'id',
                    'nis',
                    'tanggal',
                    'total',
                    DB::raw("'total' as jenis"),
                    DB::raw("'Tarik tabungan' as keterangan")
                )
            )
            ->get()
            ->load('santri');

        $transaksi = $transaksi->sortByDesc('tanggal')->values();

        return view('pages.admin.riwayat_transaksi_tabungan', [
            'transaksi' => $transaksi
        ]);
    }

    public function HalamanBuktiSetoran(Request $request, string $id)
    {
        $transaksi_tabungan = Tabungan::with('santri')->find($id);

        return view('pages.admin.bukti_setoran', [
            'transaksi_tabungan' => $transaksi_tabungan
        ]);
    }

    public function HalamanBuktiPenarikan(Request $request, string $id)
    {
        $transaksi_tabungan = PenarikanTabungan::with('santri')->find($id);

        return view('pages.admin.bukti_penarikan', [
            'transaksi_tabungan' => $transaksi_tabungan
        ]);
    }

    public function HalamanLaporanIuran(Request $request)
    {
        $total_iuran = Iuran::sum('jumlah');

        $transaksi_iuran = Iuran::with('santri')->get();

        return view('pages.admin.laporan_iuran', [
            'total_iuran' => $total_iuran,
            'transaksi_iuran' => $transaksi_iuran
        ]);
    }

    public function HalamanLaporanTabungan(Request $request)
    {
        $total_setoran = Tabungan::sum('setoran');
        $total_penarikan = PenarikanTabungan::sum('total');

        $transaksi = Tabungan::select(
            'id',
            'nis',
            'tanggal',
            DB::raw('setoran as jumlah'),
            DB::raw("'setoran' as jenis"),
            DB::raw("'Setor tabungan' as keterangan")
        )
            ->unionAll(
                PenarikanTabungan::select(
                    'id',
                    'nis',
                    'tanggal',
                    DB::raw('total as jumlah'),
                    DB::raw("'penarikan' as jenis"),
                    DB::raw("'Tarik tabungan' as keterangan")
                )
            )
            ->get()
            ->load('santri');

        $transaksi = $transaksi->sortByDesc('tanggal')->values();

        // dd($transaksi);
        return view('pages.admin.laporan_tabungan', [
            'total_tabungan' => $total_setoran - $total_penarikan,
            'tabungan_santri' => $transaksi
        ]);
    }
}
