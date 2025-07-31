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
                                <tr class="align-middle">
                                    <td class="text-center">1.</td>
                                    <td>12345678</td>
                                    <td>Akhmad Ardiansyah Amnur</td>
                                    <td>15-09-2025</td>
                                    <td>-</td>
                                    <td>Rp. 10.000,00-</td>
                                </tr>
                                <tr class="align-middle">
                                    <td colspan="5" class="text-center fw-bold">Jumlah</td>
                                    <td class="text-center">Rp. 150000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
