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
                    <form action="{{ route('post.pembayaran_iuran') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('POST')
                        <div class="card-header">
                            <div class="card-title">Input Iuran</div>
                        </div>

                        <div class="card-body">
                            {{-- tanggal transaksi --}}
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Transaksi</label>
                                <input type="date" name="tanggal" class="form-control" id="tanggal" required>
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
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" id="jumlah"
                                    placeholder="Jumlah" required>
                            </div>

                            {{-- bukti --}}
                            <div class="mb-3">
                                <label for="bukti" class="form-label">Bukti</label>
                                <input type="file" name="bukti" class="form-control" id="bukti" placeholder="Bukti"
                                    accept="image/*" required>
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
