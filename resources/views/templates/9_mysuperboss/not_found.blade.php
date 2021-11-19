@extends('templates.9_mysuperboss.master')
@section('nav')
@include('templates.9_mysuperboss.nav-content')
@stop
@section('content')
<section class="bg-section">
    <div class="container" data-aos="fade-up">
        <div class="row mt-5" data-aos="fade-left">

            <div class="col-md-4">
                <a href="javascript:history.back(-1)" class="about-btn"><i class="fa fa-chevron-left"></i> Kembali</a>
            </div>
            <div class="col-md-12">
                <div class="text-center">
                    <img src="{{ asset('images/empty.svg') }}" class="img-fluid" style="width: 400px;" />
                    <h4 style="color:#3a74a7;">{{$message}} </h4>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection