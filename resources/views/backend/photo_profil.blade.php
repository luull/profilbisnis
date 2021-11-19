@extends('backend.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body justify-content-center">
                <h4 class="text-center p-3">UPLOAD PHOTO PROFILE</h4>
                <hr>
                 @if (session('message'))
                        <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
                        @endif  
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-lg-4">
                            @if (!@empty( session('backend_photo')))
                            <img src="{{ asset( session('backend_photo'))}}" class="img-fluid rounded-circle">
                            @else
                                <img src="{{ asset('images/no-photo.svg')}}" class="img-fluid rounded-circle">
                                
                            @endif
                        </div>
                    </div>
                 <div class="row justify-content-center p-3">
                    <form class="form-inline" method="post" action="{{route('upload_foto_backend')}}" enctype="multipart/form-data">
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