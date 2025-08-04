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

                    <form action="{{ route('post.setoran_tabungan') }}" method="POST">
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
                                <select class="form-control" name="nama" id="nama" required disabled>
                                    <option value="" disabled selected>Pilih Nama</option>
                                    @foreach ($santri as $s)
                                        <option value="{{ $s->nis }}">{{ $s->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- setoran --}}
                            <div class="mb-3">
                                <label for="setoran" class="form-label">Setoran</label>

                                <select class="form-control" id="pilihSetoran">
                                    <option value="" disabled selected>Pilih Setoran</option>
                                    <option value="2000">Rp. 2.000</option>
                                    <option value="5000">Rp. 5.000</option>
                                    <option value="10000">Rp. 10.000</option>
                                    <option value="isi-setoran">Isi Setoran</option>
                                </select>

                                <input type="number" name="setoran" class="form-control mt-2" id="setoran"
                                    placeholder="Jumlah" style="display: none;">

                                @error('jumlah')
                                    <div class="alert alert-danger py-1 mt-1">{{ $message }}</div>
                                @enderror
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

    <script>
        document.getElementById('nis').addEventListener('change', function() {
            var selectedNis = this.value;
            var namaSelect = document.getElementById('nama');
            namaSelect.value = selectedNis; // otomatis pilih nama yang value-nya = nis
        });
    </script>

    <script>
        document.getElementById('pilihSetoran').addEventListener('change', function() {
            var setoranInput = document.getElementById('setoran');
            if (this.value === 'isi-setoran') {
                setoranInput.style.display = 'block';
            } else {
                setoranInput.style.display = 'none';
                setoranInput.value = this.value; // set value input sesuai pilihan
            }
        });
    </script>
@endsection
