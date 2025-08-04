@extends('layouts.auth_layout')

@section('main')
    <div class="login-logo">
        <a>Aplikasi Iuran Dan Tabungan</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Login</p>
            <form action="{{ route('post.login') }}" method="POST">
                @csrf
                @method('POST')

                @if (isset($msg_err))
                    <div class="mb-3">
                        <div class="alert alert-danger">
                            {{ $msg_err }}
                        </div>
                    </div>
                @endif

                <div class="mb-3">
                    <input type="text" name="nis_username" class="form-control" placeholder="NIS" required />
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required />
                </div>
                <!--begin::Row-->
                <div class="row justify-content-center">
                    <!-- /.col -->
                    <div class="col-8">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary rounded-pill">Login</button>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!--end::Row-->
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection
