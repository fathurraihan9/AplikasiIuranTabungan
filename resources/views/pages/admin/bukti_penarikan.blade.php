@extends('layouts.main_layout')

@section('app-content-header')
    <div class="container-fluid">
        <h2>Penarikan Tabungan</h2>
    </div>
@endsection

@section('app-content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-body">
                    {{-- tanggal transaksi --}}
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Transaksi</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal"
                            value="{{ $transaksi_tabungan->tanggal }}" disabled>
                    </div>

                    {{-- NIS --}}
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" class="form-control" name="nis" id="nis"
                            value="{{ $transaksi_tabungan->nis }}" disabled>
                    </div>

                    {{-- nama --}}
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            value="{{ $transaksi_tabungan->santri->nama }}" disabled>
                    </div>

                    {{-- jumlah --}}
                    <div class="mb-3">
                        <label for="total" class="form-label">Total</label>
                        <input type="textr" class="form-control" name="total" id="total" placeholder="Total"
                            value="Rp. {{ number_format($transaksi_tabungan->total, 0, ',', '.') }}" disabled>
                    </div>

                    <div class="mb-3">
                        <a href="{{ route('admin.riwayat_transaksi_tabungan') }}"class="btn btn-danger w-100">
                            <i class="bi bi-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
