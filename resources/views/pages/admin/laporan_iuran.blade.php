@extends('layouts.main_layout')

@section('app-content-header')
    <div class="container-fluid">
        <h2>Laporan Iuran</h2>
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
                                    <th scope="col" class="text-center" style="width: 10%;">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi_iuran as $t)
                                    <tr class="align-middle">
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td>{{ $t->nis }}</td>
                                        <td>{{ $t->santri->nama }}</td>
                                        <td>{{ $t->tanggal }}</td>
                                        <td>Rp. {{ number_format($t->jumlah, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                                <tr class="align-middle">
                                    <td colspan="4" class="text-center fw-bold">Jumlah</td>
                                    <td class="fw-bold">Rp. {{ number_format($total_iuran, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
