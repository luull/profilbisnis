@extends('backend.master')

@section('style')
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">

@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="text-center">KONFIGURASI WEBSITE</h5>
        <hr>
    </div>
    <div class="card-body">
        @if (session('message'))
        <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
        @endif
        @foreach($datas as $data)
        <form action="{{route('update_konfigurasi')}}" method="post">
            @csrf
            <input class="form-control" name="id" value="{{$data->id}}" hidden />
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Aplikasi</label>
                        <input class="form-control" name="app_name" value="{{$data->app_name}}" />
                    </div>
                    <div class="form-group">
                        <label>URL Aplikasi</label>
                        <input class="form-control" name="app_url" value="{{$data->app_url}}" />
                    </div>
                    <div class="form-group">
                        <label>Nama Domain</label>
                        <input class="form-control" name="app_domain" value="{{$data->app_domain}}" />
                    </div>
                    <div class="form-group">
                        <label>Copyright</label>
                        <input class="form-control" name="copyright" value="{{$data->copyright}}" />
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Daftar</label>
                        <textarea class="form-control" name="text_join">{{$data->text_join}}</textarea>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Powered By</label>
                        <input class="form-control" name="poweredby" value="{{$data->poweredby}}" />
                    </div>
                    <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input class="form-control" name="company_name" value="{{$data->company_name}}" />
                    </div>
                    <div class="form-group">
                        <label>URL Daftar</label>
                        <input class="form-control" name="url_join" value="{{$data->url_join}}" />
                    </div>
                    <div class="form-group">
                        <label>URL Import</label>
                        <input class="form-control" name="url_import" value="{{$data->url_import}}" />
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success" style="float: right !important;">Simpan</button>
                </div>

            </div>
        </form>
        @endforeach
    </div>
</div>
@endsection