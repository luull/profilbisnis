@extends('admin.master')
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/wa-templates">WA Templates</a></li>
        </ol>
    </nav>
</div>
<div class="row layout-spacing">
    <div class="col-md-12 layout-top-spacing">
        <form action="{{route('update_wa_templates')}}" method="POST">
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
                        <div class="form-group">
                            <label>Wa Pembelian</label>
                            <input type="text" class="form-control input-default @error('beli')is-invalid @enderror" name="beli" id="beli" value="{{$beli}}">
                            @error('beli')
                            <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Wa Pendaftaran</label>
                            <input type="text" class="form-control input-default @error('daftar')is-invalid @enderror" name="daftar" id="daftar" value="{{$daftar}}">
                            @error('daftar')
                            <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Wa Kontak Kami</label>
                            <input type="text" class="form-control input-default @error('kontak')is-invalid @enderror" name="kontak" id="kontak" value="{{$kontak}}">
                            @error('kontak')
                            <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>

            </div>

        </form>
    </div>
</div>
@endsection