@extends('admin.master')
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/ubah_password">Ubah Password</a></li>
        </ol>
    </nav>
</div>
<div class="row layout-spacing">
    <div class="col-md-12 layout-top-spacing">
        <form action="{{route('ubah_password')}}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
                    @endif
                    <div class="row justify-content-end">
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-sm btn-info" Value="Update Data">
                        </div>
                    </div>
                    <div class="basic-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control input-default @error('password')is-invalid @enderror" name="password" id="password">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="pwd"><i class="fa fa-lg fa-eye text-dark"></i></span>
                                        </div>
                                        <br>
                                        @error('password')
                                        <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control input-default @error('password1')is-invalid @enderror" name="password1" id="password1">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="k_pwd"><i class="fa fa-lg fa-eye text-dark"></i></span>
                                        </div>
                                        <br>
                                        @error('password1')
                                        <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $("#pwd").click(function() {
            var tipe = $("#password").attr('type');
            if (tipe == "password") {
                $("#password").prop('type', 'text');

            } else {
                $("#password").prop('type', 'password');
            }
        })
        $("#k_pwd").click(function() {
            var tipe = $("#password1").attr('type');
            if (tipe == "password") {
                $("#password1").prop('type', 'text');

            } else {
                $("#password1").prop('type', 'password');
            }
        })
    })
</script>

@endsection