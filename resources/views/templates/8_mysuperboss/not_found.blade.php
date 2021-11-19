@extends('templates.8_mysuperboss.master')
@section('nav')
@include('templates.8_mysuperboss.nav-content')
@stop
@section('content')

<section class="product-list bg-grey">
    <div class="container" data-aos="fade-up">
        <div class="row mt-5 wow slideInUp" data-aos="fade-left">

            <div class="col-md-4 mt-5">
                <a href="javascript:history.back(-1)" class="btn btn-green btn-rounded text-center"><i class="fa fa-chevron-left"></i> Kembali</a>
            </div>
            <div class="col-md-12">
                <div class="text-center">
                    <h4 class="text-dark">{{$message}} </h4>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection