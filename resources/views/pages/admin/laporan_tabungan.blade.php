@extends('layouts.main_layout')

@section('app-content-header')
    <div class="container-fluid">
        <h2>Laporan Tabungan</h2>
    </div>
@endsection

@section('app-content')
    <div class="container-fluid">
        <div class="row justify-content-center mb-3">
            <div class="col-md-10">
                <div class="card card-body">
                    <form action="" class="d-flex justify-content-center gap-3">
                        <input type="date" class="form-control">
                        <input type="text" class="form-control" placeholder="Cari Nama">
                    </form>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-primary card-outline">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <table class="table table-bordered" role="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center" style="width: 3%;">No</th>
                                    <th scope="col" class="text-center" style="width: 8%;">NIS</th>
                                    <th scope="col" class="text-center" style="width: 22%;">Nama</th>
                                    <th scope="col" class="text-center" style="width: 10%;">Tanggal Transaksi</th>
                                    <th scope="col" class="text-center" style="width: 10%;">Keterangan</th>
                                    <th scope="col" class="text-center" style="width: 10%;">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tabungan_santri as $t)
                                    <tr class="align-middle">
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td>{{ $t->santri->nis }}</td>
                                        <td>{{ $t->santri->nama }}</td>
                                        <td>{{ $t->tanggal }}</td>
                                        <td>{{ $t->keterangan }}</td>
                                        @if ($t->jenis == 'setoran')
                                            <td class="text-success">
                                                Rp. {{ number_format($t->jumlah, 0, ',', '.') }}
                                            </td>
                                        @elseif ($t->jenis == 'penarikan')
                                            <td class="text-danger">
                                                Rp. {{ number_format($t->jumlah, 0, ',', '.') }}
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                <tr class="align-middle">
                                    <td colspan="5" class="text-center fw-bold">Jumlah</td>
                                    <td class="fw-bold">Rp. {{ number_format($total_tabungan, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
