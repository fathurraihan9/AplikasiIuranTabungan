@extends('layouts.main_layout_santri')

@section('app-content-header')
    <div class="container-fluid">
        <h2>Riwayat Transaksi Tabungan</h2>
    </div>
@endsection

@section('app-content')
    <div class="container-fluid">
        <x-profile-santri></x-profile-santri>

        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary card-outline">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <table class="table table-bordered" role="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center" style="width: 3%;">No</th>
                                    <th scope="col" class="text-center" style="width: 22%;">Jumlah</th>
                                    <th scope="col" class="text-center" style="width: 8%;">Ket</th>
                                    <th scope="col" class="text-center" style="width: 8%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td class="text-center">1.</td>
                                    <td>Rp. 10.000</td>
                                    <td>-</td>
                                    <td class="text-center">
                                        <button class="btn btn-primary">Bukti Penarikan</button>
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
