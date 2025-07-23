@extends('layouts.main_layout')

@section('app-content-header')
    <div class="container-fluid">
        <h2>Pembayaran Iuran</h2>
    </div>
@endsection

@section('app-content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card card-primary card-outline">
                    <form action="">
                        <div class="card-header">
                            <div class="card-title">Input Iuran</div>
                        </div>

                        <div class="card-body">
                            {{-- tanggal transaksi --}}
                            <div class="mb-3">
                                <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
                                <input type="date" class="form-control" name="tanggal_transaksi" id="tanggal_transaksi"
                                    required>
                            </div>

                            {{-- NIS --}}
                            <div class="mb-3">
                                <label for="nis" class="form-label">NIS</label>
                                <select class="form-control" name="nis" id="nis">
                                    <option value="" disabled selected>Pilih NIS</option>
                                    <option value="12345678">12345678</option>
                                </select>
                            </div>

                            {{-- nama --}}
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <select class="form-control" name="nama" id="nama">
                                    <option value="" disabled selected>Pilih Nama</option>
                                    <option value="akhmad ardiansyah amnur">Akhmad Ardiansyah Amnur</option>
                                </select>
                            </div>

                            {{-- jumlah --}}
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah">
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary px-5 rounded-pill">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
