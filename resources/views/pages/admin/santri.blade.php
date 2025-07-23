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
                    <form>
                        <!--begin::Body-->
                        <div class="card-body">
                            {{-- input NIS --}}
                            <div class="mb-3">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="text" class="form-control" name="nis" id="nis"
                                    placeholder="Nomor Induk Santri">
                            </div>
                            {{-- input nama --}}
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                            </div>
                            {{-- input jenis kelamin --}}
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="">
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="lk">Laki-Laki</option>
                                    <option value="pr">Perempuan</option>
                                </select>
                            </div>
                            {{-- input kelas --}}
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select class="form-control" name="kelas" id="kelas">
                                    <option value="" disabled selected>Pilih Kelas</option>
                                    <option value="tka">TKA</option>
                                    <option value="tqa">TQA</option>
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
                                    <th scope="col" class="text-center" style="width: 10px">No</th>
                                    <th scope="col" class="text-center" style="width: 80px;">NIS</th>
                                    <th scope="col" class="text-center" style="width: 400px;">Nama</th>
                                    <th scope="col" class="text-center" style="width: 115px;">Jenis Kelamin</th>
                                    <th scope="col" class="text-center" style="width: 80px;">Kelas</th>
                                    <th scope="col" class="text-center">Kelola</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td>1.</td>
                                    <td>12345678</td>
                                    <td>Akhmad Ardiansyah Amnur</td>
                                    <td>Laki-Laki</td>
                                    <td>TKA</td>
                                    <td class="text-center">
                                        <button class="btn btn-success">
                                            <i class="bi bi-pencil"></i>
                                            Edit
                                        </button>
                                        <button class="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
