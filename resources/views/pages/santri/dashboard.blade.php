@extends('layouts.main_layout_santri')

@section('app-content-header')
    <div class="container-fluid">
        <h2>Dashboard Santri</h2>
    </div>
@endsection

@section('app-content')
    <div class="container-fluid">
        <x-profile-santri :santri="$santri" :notifikasi="$notifikasi"></x-profile-santri>

        <div class="row">
            <div class="col-md-6">
                <div class="small-box text-bg-primary">
                    <div class="inner">
                        <h3>{{ $total_iuran }}</h3>
                        <p>Total Iuran Masuk Bulan Ini</p>
                    </div>
                    <i class="small-box-icon bi bi-people"></i>
                </div>
            </div>

            <div class="col-md-6">
                <div class="small-box text-bg-success">
                    <div class="inner">
                        <h3>{{ $total_saldo_tabungan }}</h3>
                        <p>Total Tabungan</p>
                    </div>
                    <i class="small-box-icon bi bi-people"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
