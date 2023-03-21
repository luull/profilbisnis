@extends('backend.master')


@section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                      <h5 class="text-center">Selamat Datang {{ $data->nama }}</h5>
                      <p class="text-center">Berikut Profil Anda : </p>
                      <hr/>
                      <div class="row">
                      <div class="col-md-3 col-lg-3">
                      <img src="{{ asset($data->foto)}}" class="img-thumbnail  shadow rounded-circle align-top " style="max-height:200px"><br>
                      </div>
                      <div class="col-md-9 col-lg-9">
                      @if (!@empty($data->nama))
                        <div class="row p-2" >
                        <div class="col-4 text-left">Nama</div>
                        <div class="col-8 text-left">: {{$data->nama}} </div>
                        </div>
                        @endif
                        @if (!@empty($data->email))
                        <div class="row p-2" >
                        <div class="col-4 text-left">Email</div>
                        <div class="col-8 text-left">: {{$data->email}} </div>
                        </div>
                        @endif
                        @if (!@empty($data->telp))
                        <div class="row p-2" >
                        <div class="col-4 text-left">No HP  </div>
                        <div class="col-8 text-left">: {{$data->telp}} </div>
                        </div>
                        @endif
                        @if (!@empty($data->level_akses->nama))
                        <div class="row p-2" >
                        <div class="col-4 text-left">Hak Akses</div>
                        <div class="col-8 text-left">: {{$data->level_akses->nama}} </div>
                        </div>
                        @endif
                        @if (!@empty($data->last_login))
                        <div class="row p-2" >
                        <div class="col-4 text-left">Login Terakhir </div>
                        <div class="col-8 text-left">: {{$data->last_login}}</div>
                        </div>
                        @endif
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
 
<!--**********************************
    Content body end
***********************************-->
@stop


@section('script')
<script src="{{ asset('templates/admin/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('templates/admin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('templates/admin/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>    
@stop

@section('style')
<link href="{{ asset('templates/admin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    
@endsection