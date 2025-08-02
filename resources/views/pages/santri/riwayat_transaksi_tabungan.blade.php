@extends('layouts.main_layout_santri')

@section('app-content-header')
    <div class="container-fluid">
        <h2>Riwayat Transaksi Tabungan</h2>
    </div>
@endsection

@section('app-content')
    <div class="container-fluid">
        <x-profile-santri :santri="$santri" :notifikasi="$notifikasi"></x-profile-santri>

        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary card-outline">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <table class="table table-bordered" role="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Jumlah</th>
                                    <th scope="col" class="text-center">Tanggal</th>
                                    <th scope="col" class="text-center">Ket</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi_tabungan as $t)
                                    <tr class="align-middle">
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td>{{ $t->jumlah }}</td>
                                        <td>{{ $t->tanggal }}</td>
                                        <td>{{ $t->keterangan }}</td>
                                        <td class="text-center">
                                            @if ($t->jenis == 'Setor')
                                                <a href="{{ route('santri.bukti_setoran', ['id' => $t->id]) }}"
                                                    class="btn btn-primary">Bukti
                                                    Setoran
                                                </a>
                                            @elseif ($t->jenis == 'Tarik')
                                                <a href="{{ route('santri.bukti_penarikan', ['id' => $t->id]) }}"
                                                    class="btn btn-success">
                                                    Bukti Penarikan
                                                </a>
                                            @endif
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
