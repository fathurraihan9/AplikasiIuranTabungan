@extends('layouts.main_layout_santri')

@section('app-content-header')
    <div class="container-fluid">
        <h2>Pengecekan Saldo Tabungan</h2>
    </div>
@endsection

@section('app-content')
    <div class="container-fluid">
        <x-profile-santri :santri="$santri"></x-profile-santri>

        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary card-outline">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <table class="table table-bordered" role="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center" style="width: 3%;">No</th>
                                    <th scope="col" class="text-center" style="width: 8%;">Tanggal</th>
                                    <th scope="col" class="text-center" style="width: 22%;">Setoran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tabungan as $t)
                                    <tr class="align-middle">
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td>{{ $t->tanggal }}</td>
                                        <td>{{ $t->setoran }}</td>
                                    </tr>
                                @endforeach

                                {{-- <tr>
                                    <td colspan="2" class="text-center fw-bold">Jumlah Saldo</td>
                                    <td class="fw-bold">{{$total_saldo_tabungan}}</td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
