@extends('layouts.main_layout')

@section('app-content-header')
    <div class="container-fluid">
        <h2>Riwayat Pembayaran Iuran</h2>
    </div>
@endsection

@section('app-content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-primary card-outline">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <table class="table table-bordered" role="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">NIS</th>
                                    <th scope="col" class="text-center">Nama</th>
                                    <th scope="col" class="text-center">Jenis Kelamin</th>
                                    <th scope="col" class="text-center">Kelas</th>
                                    <th scope="col" class="text-center">Tanggal</th>
                                    <th scope="col" class="text-center">Jumlah</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($iuran as $i)
                                    <tr class="align-middle">
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td>{{ $i->nis }}</td>
                                        <td>{{ $i->santri->nama }}</td>
                                        <td>{{ $i->santri->jenis_kelamin }}</td>
                                        <td>{{ $i->santri->kelas }}</td>
                                        <td>{{ $i->tanggal }}</td>
                                        <td>{{ $i->jumlah }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.bukti_pemabayaran_iuran', ['bukti' => $i->bukti]) }}"
                                                class="btn btn-primary">
                                                <i class="bi bi-note"></i>
                                                Lihat Bukti
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
