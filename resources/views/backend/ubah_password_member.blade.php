@extends('backend.master')
@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-6 col-lg-6">
        <form action="{{route('ubah_password_member')}}" method="POST">
            @csrf
        <div class="card">
            <div class="card-header">
                <h5 class="card-title text-center">UBAH PASSWORD MEMBER</h5>
             </div>
            <div class="card-body">
                @if (session('message'))
                <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
                @endif    
               <div class="basic-form">
                    <div class="form-group">
                        <label>Password Baru</label>
                      
                        <div class="input-group">
                            <input type="password" class="form-control input-default @error('password')is-invalid @enderror" name="password" id="password" >
                            <input type="hidden"  name="id" id="id" value="{{$member_id}}" >
                            <div class="input-group-append" >
                            <span class="input-group-text" id="pwd"><i class="fa fa-lg fa-eye text-dark"></i></span>
                            </div>
                            @error('password')
                            <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                    <label>Konfirmasi Password Baru</label>
                    <div class="input-group">
                        <input type="password" class="form-control input-default @error('password1')is-invalid @enderror" name="password1" id="password1" >
                        <div class="input-group-append">
                            <span class="input-group-text" id="k_pwd"><i class="fa fa-lg fa-eye text-dark"></i></span>
                            </div>
                        @error('password1')
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
    </div>
    </form>
    </div>
</div>
@endsection

@section('script')
<script>

$(document).ready(function(){
    $("#pwd").click(function(){
        var tipe=$("#password").attr('type');
        if (tipe=="password"){
            $("#password").prop('type','text');

        }else{
            $("#password").prop('type','password');
        }
    })
    $("#k_pwd").click(function(){
        var tipe=$("#password1").attr('type');
        if (tipe=="password"){
            $("#password1").prop('type','text');

        }else{
            $("#password1").prop('type','password');
        }
    })
})
</script>
    
@endsection



