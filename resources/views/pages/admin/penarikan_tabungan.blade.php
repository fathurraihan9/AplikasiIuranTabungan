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

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="card-title">Penarikan Tabungan</div>
                    </div>

                    <form action="{{ route('post.penarikan_tabungan') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="card-body">
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

                            {{-- Nama --}}
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <select class="form-control" name="nama" id="nama" disabled required>
                                    <option value="" disabled selected>Pilih Nama</option>
                                    @foreach ($santri as $s)
                                        <option value="{{ $s->nis }}">{{ $s->nama }}</option>
                                    @endforeach
                                </select>
                                @error('nama')
                                    <div class="alert alert-danger py-1 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- tanggal transaksi --}}
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Transaksi</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                            </div>

                            {{-- jumlah --}}
                            <div class="mb-3">
                                <label for="total" class="form-label">Total Penarikan</label>
                                <input type="number" class="form-control" name="total" id="total"
                                    placeholder="Total">
                            </div>
                        </div>

                        <div class="card-footer d-flex flex-row justify-content-between text-end w-full">
                            <button type="submit" class="btn btn-primary px-5 rounded-pill"
                                style="width: fit-content">Tarik Saldo</button>

                            <input type="text" class="form-control rounded-pill ms-auto" value="{{ $total_tabungan }}"
                                style="width: fit-content" disabled>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('nis').addEventListener('change', function() {
            var selectedNis = this.value;
            var namaSelect = document.getElementById('nama');
            namaSelect.value = selectedNis; // otomatis pilih nama yang value-nya = nis
        });
    </script>
@endsection
