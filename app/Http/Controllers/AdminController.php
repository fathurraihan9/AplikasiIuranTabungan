<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
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

        $notifikasi = Notifikasi::with('santri')->get();
        $notifikasi = $notifikasi->sortDesc();

        foreach ($notifikasi as $n) {
            $n->jumlah = Helper::stringToRupiah($n->jumlah);
            $n->tanggal = Helper::getTanggalAttribute($n->tanggal);
        }

        return view('pages.admin.dashboard', [
            'total_santri' => $total_santri,
            'total_iuran' => Helper::stringToRupiah($total_iuran),
            'total_tabungan' => Helper::stringToRupiah($total_tabungan - $total_penarikan),
            'notifikasi' => $notifikasi
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
            'nis' => ['min:10', 'max:10', 'required'],
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

        // dd($data);

        Santri::create($data);

        return redirect()
            ->route('admin.santri')
            ->with('msg_success', 'Santri Berhasil Ditambahkan');
    }

    public function HapusSantri(Request $request, string $nis)
    {
        Santri::where('nis', '=', $nis)->delete();

        return redirect()->route('admin.santri')->with('msg_success', 'Santri Berhasil Dihapus');
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
            'jumlah' => ['required']
        ]);

        $data = [
            'tanggal' => $request->input('tanggal'),
            'nis' => $request->input('nis'),
            'jumlah' => $request->input('jumlah')
        ];

        // dd($data);
        try {
            Iuran::create($data);
            Notifikasi::create([
                'nis' => $data['nis'],
                'jenis_transaksi' => 'iuran',
                'jumlah' => $data['jumlah'],
                'tanggal' => $data['tanggal'],
                'keterangan' => 'Pembayaran iuran terbaru',
            ]);

            return redirect()
                ->route('admin.pembayaran_iuran')
                ->with('msg_success', 'Pembayaran Iuran Berhasil');
        } catch (\Exception $e) {
            // Bisa logging juga kalau perlu
            \Log::error($e);

            return redirect()
                ->route('admin.pembayaran_iuran')
                ->with('msg_error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function HalamanRiwayatPembayaranIuran(Request $request)
    {
        $iuran = Iuran::with('santri')->get();

        foreach ($iuran as $i) {
            $i->jumlah = Helper::stringToRupiah($i->jumlah);
            $i->tanggal = Helper::getTanggalAttribute($i->tanggal);
        }

        $iuran = $iuran->sortByDesc('tanggal');

        return view('pages.admin.riwayat_pembayaran_iuran', [
            'iuran' => $iuran
        ]);
    }

    public function HalamanBuktiPembayaranIuran(Request $request, string $id)
    {
        $bukti_pembayaran_iuran = Iuran::where('id', '=', $id)->first();

        return view('pages.admin.bukti_pembayaran_iuran', [
            'bukti_pembayaran_iuran' => $bukti_pembayaran_iuran
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
            'setoran' => ['required'],
        ]);

        $data = [
            'nis' => $request->input('nis'),
            'tanggal' => $request->input('tanggal'),
            'setoran' => $request->input('setoran')
        ];

        Tabungan::create($data);
        Notifikasi::create([
            'nis' => $data['nis'],
            'jenis_transaksi' => 'tabungan',
            'jumlah' => $data['setoran'],
            'tanggal' => $data['tanggal'],
            'keterangan' => 'Setoran tabungan terbaru',
        ]);

        return redirect()
            ->route('admin.setoran_tabungan')
            ->with('msg_success', 'Setoran Berhasil');
    }

    public function HalamanPenarikanTabungan(Request $request)
    {
        $santri = Santri::all();

        // Ambil data saldo terbaru per santri
        $santriData = $santri->map(function ($s) {
            $saldoAwal = Tabungan::where('nis', $s->nis)->sum('setoran');
            $totalPenarikan = PenarikanTabungan::where('nis', $s->nis)->sum('total');

            return [
                'nis' => $s->nis,
                'nama' => $s->nama,
                'saldo' => $saldoAwal - $totalPenarikan,
            ];
        });

        return view('pages.admin.penarikan_tabungan', [
            'santri' => $santri,
            'santri_json' => $santriData,
            'total_tabungan' => Helper::stringToRupiah(0)
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

        foreach ($transaksi as $t) {
            $t->tanggal = Helper::getTanggalAttribute($t->tanggal);
        }

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
        $query = Iuran::with('santri');

        if ($request->filled('nama')) {
            $query->whereHas('santri', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->nama . '%');
            });
        }

        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        $transaksi_iuran = $query->get();

        $transaksi_iuran = $transaksi_iuran->sortByDesc('tanggal');

        foreach ($transaksi_iuran as $t) {
            $t->tanggal = Helper::getTanggalAttribute($t->tanggal);
        }

        $total_iuran = $transaksi_iuran->sum('jumlah');

        return view('pages.admin.laporan_iuran', [
            'total_iuran' => $total_iuran,
            'transaksi_iuran' => $transaksi_iuran
        ]);
    }

    public function HalamanLaporanTabungan(Request $request)
    {
        $total_setoran = Tabungan::sum('setoran');
        $total_penarikan = PenarikanTabungan::sum('total');

        // Ambil dan filter Tabungan
        $tabungan = Tabungan::with('santri')
            ->when(
                $request->filled('tanggal'),
                fn($q) =>
                $q->whereDate('tanggal', $request->tanggal)
            )
            ->when(
                $request->filled('nama'),
                fn($q) =>
                $q->whereHas(
                    'santri',
                    fn($q2) =>
                    $q2->where('nama', 'like', '%' . $request->nama . '%')
                )
            )
            ->get()
            ->map(function ($item) {
                return (object) [
                    'id' => $item->id,
                    'nis' => $item->nis,
                    'tanggal' => $item->tanggal,
                    'jumlah' => $item->setoran,
                    'jenis' => 'setoran',
                    'keterangan' => 'Setor tabungan',
                    'santri' => $item->santri,
                ];
            });

        // Ambil dan filter Penarikan
        $penarikan = PenarikanTabungan::with('santri')
            ->when(
                $request->filled('tanggal'),
                fn($q) =>
                $q->whereDate('tanggal', $request->tanggal)
            )
            ->when(
                $request->filled('nama'),
                fn($q) =>
                $q->whereHas(
                    'santri',
                    fn($q2) =>
                    $q2->where('nama', 'like', '%' . $request->nama . '%')
                )
            )
            ->get()
            ->map(function ($item) {
                return (object) [
                    'id' => $item->id,
                    'nis' => $item->nis,
                    'tanggal' => $item->tanggal,
                    'jumlah' => $item->total,
                    'jenis' => 'penarikan',
                    'keterangan' => 'Tarik tabungan',
                    'santri' => $item->santri,
                ];
            });

        // Gabungkan dan urutkan
        $transaksi = $tabungan->merge($penarikan)->sortByDesc('tanggal')->values();

        // Format tanggal
        foreach ($transaksi as $t) {
            $t->tanggal = Helper::getTanggalAttribute($t->tanggal);
        }

        return view('pages.admin.laporan_tabungan', [
            'total_tabungan' => $total_setoran - $total_penarikan,
            'tabungan_santri' => $transaksi
        ]);
    }
}
