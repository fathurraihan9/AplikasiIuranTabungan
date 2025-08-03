@extends('layouts.main_layout')

@section('app-content-header')
    <div class="container-fluid">
        <h2>Lihat Pesan</h2>
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
                                    <th scope="col" class="text-center">Nama</th>
                                    <th scope="col" class="text-center">Pesan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesan as $p)
                                    <tr class="align-middle">
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->pesan }}</td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
