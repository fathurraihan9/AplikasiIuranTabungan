@extends('layouts.main_layout')

@section('app-content-header')
    <div class="container-fluid">
        <h2>Input / Setoran Tabungan</h2>
    </div>
@endsection

@section('app-content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="card-title">Input / Setoran Tabungan</div>
                    </div>

                    <form action="{{ route('post.setoran_tabungan') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            {{-- tanggal transaksi --}}
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Transaksi</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                            </div>

                            {{-- NIS --}}
                            <div class="mb-3">
                                <label for="nis" class="form-label">NIS</label>
                                <select class="form-control" name="nis" id="nis" required>
                                    <option value="" disabled selected>Pilih NIS</option>
                                    @foreach ($santri as $s)
                                        <option value="{{ $s->nis }}">{{ $s->nis }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- nama --}}
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <select class="form-control" name="nama" id="nama" required>
                                    <option value="" disabled selected>Pilih Nama</option>
                                    @foreach ($santri as $s)
                                        <option value="{{ $s->nama }}">{{ $s->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- jumlah --}}
                            <div class="mb-3">
                                <label for="setoran" class="form-label">Setoran</label>
                                <input type="number" class="form-control" name="setoran" id="setoran"
                                    placeholder="Setoran" required>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary px-5 rounded-pill">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
