@extends('layouts.main_layout')

@section('app-content-header')
    <div class="container-fluid">
        <h2>Pengecekan Saldo</h2>
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
                                    <th scope="col" class="text-center" style="width: 10%;">Jumlah Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($santri as $s)
                                    @php
                                        $totalSetoran = $s->tabungan_sum_setoran;
                                        $totalPenarikan = $s->penarikan_tabungan_sum_total;
                                        $saldo = $totalSetoran - $totalPenarikan;
                                    @endphp

                                    <tr class="align-middle">
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td>{{ $s->nis }}</td>
                                        <td>{{ $s->nama }}</td>
                                        <td>{{ $s->jenis_kelamin }}</td>
                                        <td>{{ $s->kelas }}</td>
                                        <td>Rp {{ number_format($saldo, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td colspan="5" class="text-center fw-bold">Jumlah</td>
                                    <td class="fw-bold">{{ $jumlah_saldo }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
