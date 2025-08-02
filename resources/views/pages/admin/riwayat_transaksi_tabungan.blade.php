@extends('layouts.main_layout')

@section('app-content-header')
    <div class="container-fluid">
        <h2>Riwayat Transaksi Tabungan</h2>
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
                                    <th scope="col" class="text-center" style="width: 10%;">Tanggal</th>
                                    <th scope="col" class="text-center" style="width: 10%;">Jumlah Saldo</th>
                                    <th scope="col" class="text-center" style="width: 10%;">Ket</th>
                                    <th scope="col" class="text-center" style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $t)
                                    <tr class="align-middle">
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td>{{ $t->nis }}</td>
                                        <td>{{ $t->santri->nama }}</td>
                                        <td>{{ $t->santri->jenis_kelamin }}</td>
                                        <td>{{ $t->santri->kelas }}</td>
                                        <td>{{ $t->tanggal }}</td>
                                        <td>Rp. {{ number_format($t->setoran, 0, ',', '.') }}</td>
                                        <td>{{ $t->keterangan }}</td>
                                        <td>
                                            @if ($t->keterangan == 'Setor tabungan')
                                                <a href="{{ route('admin.bukti_setoran', ['id' => $t->id]) }}"
                                                    class="btn btn-success">
                                                    Bukti Setoran
                                                </a>
                                            @elseif ($t->keterangan == 'Tarik tabungan')
                                                <a href="{{ route('admin.bukti_penarikan', ['id' => $t->id]) }}"
                                                    class="btn btn-primary">
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
