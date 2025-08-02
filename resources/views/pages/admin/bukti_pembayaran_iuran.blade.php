@extends('layouts.main_layout')

@section('app-content-header')
    <div class="container-fluid">
        <h2>Riwayat Pembayaran Iuran</h2>
    </div>
@endsection

@section('app-content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-body">
                    <img src="/storage/bukti/{{ $bukti }}" alt="" class="">

                    <div class="mt-3">
                        <a href="{{route('admin.riwayat_pembayaran_iuran')}}" class="btn btn-danger w-100">
                            <i class="bi bi-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
