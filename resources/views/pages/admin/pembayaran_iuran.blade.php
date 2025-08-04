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
                    <form action="{{ route('post.pembayaran_iuran') }}" method="POST">
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
                                @error('tanggal')
                                    <div class="alert alert-danger py-1 mt-1">{{ $message }}</div>
                                @enderror
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
                                @error('nis')
                                    <div class="alert alert-danger py-1 mt-1">{{ $message }}</div>
                                @enderror
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

                            {{-- jumlah --}}
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>

                                <select class="form-control" id="pilihJumlah">
                                    <option value="" disabled selected>Pilih Jumlah</option>
                                    <option value="2000">Rp. 2.000</option>
                                    <option value="5000">Rp. 5.000</option>
                                    <option value="10000">Rp. 10.000</option>
                                    <option value="isi-jumlah">Isi Jumlah</option>
                                </select>

                                <input type="number" name="jumlah" class="form-control mt-2" id="jumlah"
                                    placeholder="Jumlah" style="display: none;">

                                @error('jumlah')
                                    <div class="alert alert-danger py-1 mt-1">{{ $message }}</div>
                                @enderror
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

    <script>
        document.getElementById('nis').addEventListener('change', function() {
            var selectedNis = this.value;
            var namaSelect = document.getElementById('nama');
            namaSelect.value = selectedNis; // otomatis pilih nama yang value-nya = nis
        });
    </script>

    <script>
        document.getElementById('pilihJumlah').addEventListener('change', function() {
            var jumlahInput = document.getElementById('jumlah');
            if (this.value === 'isi-jumlah') {
                jumlahInput.style.display = 'block';
            } else {
                jumlahInput.style.display = 'none';
                jumlahInput.value = this.value; // set value input sesuai pilihan
            }
        });
    </script>
@endsection
