@extends('layouts.main_layout')

@section('app-content-header')
    <div class="container-fluid">
        <h2>Santri</h2>
    </div>
@endsection

@section('app-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-primary card-outline">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Input Data Santri</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form action="{{ route('post.tambah_santri') }}" method="POST">
                        @csrf
                        @method('POST')
                        <!--begin::Body-->
                        <div class="card-body">
                            {{-- input NIS --}}
                            <div class="mb-3">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="text" name="nis" class="form-control" name="nis" id="nis"
                                    placeholder="Nomor Induk Santri" required>
                            </div>
                            {{-- input nama --}}
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" name="nama" id="nama"
                                    placeholder="Nama" required>
                            </div>
                            {{-- input jenis kelamin --}}
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" value=""
                                    required>
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                            {{-- input kelas --}}
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select class="form-control" name="kelas" id="kelas">
                                    <option value="" disabled selected>Pilih Kelas</option>
                                    <option value="TKA">TKA</option>
                                    <option value="TQA">TQA</option>
                                </select>
                            </div>
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary px-5 rounded-pill">Submit</button>
                        </div>
                        <!--end::Footer-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>

            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Data Santri</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 w-50">
                            <input type="text" class="form-control" placeholder="Cari">
                        </div>

                        <table class="table table-bordered" role="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">NIS</th>
                                    <th scope="col" class="text-center">Nama</th>
                                    <th scope="col" class="text-center">Jenis Kelamin</th>
                                    <th scope="col" class="text-center">Kelas</th>
                                    <th scope="col" class="text-center">Kelola</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($santri as $s)
                                    <tr class="align-middle">
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td>{{ $s->nis }}</td>
                                        <td>{{ $s->nama }}</td>
                                        <td>{{ $s->jenis_kelamin }}</td>
                                        <td>{{ $s->kelas }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#santri{{ $loop->iteration }}Modal">
                                                <i class="bi bi-trash"></i>
                                                Hapus
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="santri{{ $loop->iteration }}Modal" tabindex="-1"
                                                aria-labelledby="santri{{ $loop->iteration }}ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="santri{{ $loop->iteration }}ModalLabel">
                                                                Hapus Santri
                                                            </h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah anda ingin menghapus santri ({{ $s->nama }})?
                                                        </div>
                                                        <form
                                                            action="{{ route('delete.hapus_santri', ['nis' => $s->nis]) }}"
                                                            class="modal-footer" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-outline-danger"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="bi bi-trash"></i>
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
