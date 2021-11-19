@extends('admin.master')
@section('style')
<link href="{{asset('templates/admin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
   
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <form action="{{route('update_wa_templates')}}" method="POST">
            @csrf
        <div class="card">
            <div class="card-header">
                <h5 class="card-title text-center">SOSIAL MEDIA MANAGER</h5>
             </div>
            <div class="card-body">
                @if (session('message'))
                <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
                @endif    
                <div class="basic-form">
                    <div class="form-group">
                        <label>Wa Pembelian</label>
                        <input type="text" class="form-control input-default @error('beli')is-invalid @enderror" name="beli" id="beli" value="{{$beli}}" >
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
            <div class="card-footer">
                <div class="row justify-content-center">
                    <input type="submit" class="btn btn-sm btn-info" Value="Update Data">
                </div> 
            </div>
        </div>
      
    </form>
    </div>
</div>
@endsection


