@extends('layouts.main_layout')

@section('app-content-header')
    <div class="container-fluid">
        <h2>Dashboard Admin</h2>
    </div>
@endsection

@section('app-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="small-box text-bg-primary">
                    <div class="inner">
                        <h3>{{ $total_santri }}</h3>
                        <p>Jumlah Santri</p>
                    </div>
                    <i class="small-box-icon bi bi-people"></i>
                    <a href="#"
                        class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        Infor Lebih Lanjut <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="small-box text-bg-warning">
                    <div class="inner">
                        <h3>{{ $total_iuran }}</h3>
                        <p>Total Iuran Masuk Bulan Ini</p>
                    </div>
                    <i class="small-box-icon bi bi-cash"></i>
                    <a href="#"
                        class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        Infor Lebih Lanjut <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="small-box text-bg-primary">
                    <div class="inner">
                        <h3>{{ $total_tabungan }}</h3>
                        <p>Total Tabungan</p>
                    </div>
                    <i class="small-box-icon bi bi-bank"></i>
                    <a href="#"
                        class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        Infor Lebih Lanjut <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
            </div>
        </div>

        <x-pengumuman :notifikasi="$notifikasi"></x-pengumuman>
    </div>
@endsection
