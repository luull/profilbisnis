@extends('templates.6_mysuperboss.master')
@section('nav')
@include('templates.6_mysuperboss.nav-content')
@stop
@section('content')
<section class="product-list section-bg">
    <div class="container" data-aos="fade-up">
        <div class="row mt-5 wow slideInUp" data-aos="fade-left">

            <div class="col-md-4 mt-5">
                <a href="javascript:history.back(-1)" class="btn btn-pink btn-sm text-center"><i class="fa fa-chevron-left"></i> Kembali</a>
            </div>
            <div class="col-md-12">
                <div class="text-center">
                    <h4>{{$message}} </h4>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection