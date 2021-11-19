@extends('admin.master')
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/photo-profile">Upload Profil</a></li>
        </ol>
    </nav>
</div>
<div class="row layout-spacing">
    <div class="col-md-12 layout-top-spacing">
        <div class="card">
            <div class="card-body justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-md-4 col-lg-4">
                        @if (!@empty( session('photo')))
                        <img src="{{ asset( session('photo'))}}" class="img-fluid rounded-circle">
                        @else
                        <img src="{{ asset('images/no-photo.svg')}}" class="img-fluid rounded-circle">

                        @endif
                    </div>
                </div>
                <div class="row justify-content-center p-3">
                    <form class="form-inline" method="post" action="{{route('upload_foto_profile')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 text-center">

                            Upload Foto <input type="file" id="foto" name="foto" class="form-control m-2 @error('foto') is-invalid @enderror">
                            <input type="submit" class="btn btn-danger m-2" id="tombol" onclick="getMessage()" value="Proses Upload">
                            @error('foto')
                            <div class="text-danger font-italic">{{$message}}</div>
                            @enderror
                        </div>
                        <hr>

                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection