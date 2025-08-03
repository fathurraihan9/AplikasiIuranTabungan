<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;

class LandingPageController extends Controller
{
    public function TambahPesan(Request $request)
    {
        $request->validate([
            'nama' => ['required'],
            'pesan' => ['required']
        ]);

        $data = [
            'nama' => $request->input('nama'),
            'pesan' => $request->input('pesan')
        ];

        Pesan::create($data);

        return redirect()->route('landing_page.kontak')->with('msg_success', 'Pesan Berhasil Dikirim');
    }

    public function HalamanLihatPesan(Request $request)
    {
        $pesan = Pesan::all();

        $pesan = $pesan->sortByDesc('created_at');

        return view('pages.admin.pesan', [
            'pesan' => $pesan
        ]);
    }
}
