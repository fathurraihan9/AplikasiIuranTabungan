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
                                    <th scope="col" class="text-center" style="width: 3%;">No</th>
                                    <th scope="col" class="text-center" style="width: 8%;">NIS</th>
                                    <th scope="col" class="text-center" style="width: 22%;">Nama</th>
                                    <th scope="col" class="text-center" style="width: 10%;">Jenis Kelamin</th>
                                    <th scope="col" class="text-center" style="width: 10%;">Kelas</th>
                                    <th scope="col" class="text-center" style="width: 20%;">Tanggal</th>
                                    <th scope="col" class="text-center" style="width: 10%;">Jumlah Saldo</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td>1.</td>
                                    <td>12345678</td>
                                    <td>Akhmad Ardiansyah Amnur</td>
                                    <td>Laki-Laki</td>
                                    <td>TKA</td>
                                    <td>Rabu, 20 November 2025</td>
                                    <td>Rp. 10.000,00-</td>
                                    <td class="text-center">
                                        <button class="btn btn-primary">
                                            <i class="bi bi-note"></i>
                                            Lihat Bukti
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
