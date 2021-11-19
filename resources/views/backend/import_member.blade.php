@extends('backend.master')
@section('content')

    <div class="row justify-content-center p-5">
        <div class="col-md-6 ">
            
            <div class="card">
                <form action="{{ route('import_member') }}" method="POST" >
                    @csrf
                    <div class="card-header justifyle-content-center rounded-top  "  >
                        <h5 class="text-center  mt-3 mb-3 font-weight-bold w-100"> IMPORT MEMBER</h5>
                        </div>
              
                <div class="card-body">
                      
                    <div class="form-group">
                        <label>Member ID</label>
                        <input type="text" class="form-control input-rounded @error('id') is-invalid @enderror" name="id"  placeholder="">
                        @error('id')
                        <div class="font-italic text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    @if (session('message'))
                    <div class="alert  alert-dismissible alert-{{session('alert')}} fade show" >
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button> {!!session('message') !!}</div>
                    @endif
                    </div>
                <div class="card-footer text-center" >
                    <input type="submit" class="btn  text-white  btn-dark btn-rounded shadow "  value="Proses Import">
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection