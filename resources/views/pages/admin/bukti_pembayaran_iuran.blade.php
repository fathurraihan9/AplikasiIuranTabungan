@extends('layouts.main_layout')

@section('app-content-header')
    <div class="container-fluid">
        <h2>Bukti Pembayaran Iuran</h2>
    </div>
@endsection

@section('app-content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-body">
                    {{-- tanggal transaksi --}}
                    <div class="mb-3">
                        <label for="tanggal-transaksi" class="form-label">Tanggal Transaksi</label>
                        <input type="text" class="form-control" id="tanggal-transaksi"
                            value="{{ $bukti_pembayaran_iuran->tanggal }}" disabled>
                    </div>

                    {{-- NIS --}}
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" class="form-control" name="nis" id="nis"
                            value="{{ $bukti_pembayaran_iuran->nis }}" disabled>
                    </div>

                    {{-- nama --}}
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            value="{{ $bukti_pembayaran_iuran->santri->nama }}" disabled>
                    </div>

                    {{-- jumlah --}}
                    <div class="mb-3">
                        <label for="iuran" class="form-label">Iuran</label>
                        <input type="textr" class="form-control" name="iuran" id="iuran" placeholder="Iuran"
                            value="Rp. {{ number_format($bukti_pembayaran_iuran->jumlah, 0, ',', '.') }}" disabled>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('admin.riwayat_pembayaran_iuran') }}" class="btn btn-danger w-100">
                            <i class="bi bi-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
