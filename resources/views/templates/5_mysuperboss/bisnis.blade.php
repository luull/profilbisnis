@extends('templates.5_mysuperboss.master')
@section('nav')
@include('templates.5_mysuperboss.nav-content')
@stop
@section('content')

<?php
$name = session('data')->username
?>

<section class="header" id="home">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-12 col-md-12 col-sm-12 header-text wow fadeInLeft" data-wow-delay="1000ms">
                <h2>Bisnis</h2>
                <ul class="page-breadcrumb ">
                    <li><a href="/{{ session('data')->username }}"><i class="fas fa-home"></i>Home <i class="fas fa-angle-double-right white-icon"></i></a></li>
                    <li>Bisnis</li>
                    <br>
                    <li> <a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a></li>
                </ul>
            </div>

        </div>
    </div>
</section>
<section class="media-section section main-page">
    <div class="container">
        <div class="row no-gutters cards-section justify-content-center mb-5 wow slideInUp">
            @foreach ($bisnis_default as $bs)
            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                <div class="card card-1 wow fadeInLeft" data-wow-delay="300ms">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-12">

                                <div class="text-center">
                                    <img src="{{ asset($bs->logo)}}" class="text-center mt-3" alt="img" style="height:100px">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-12 mt-4">
                                <h5 class="card-title font"><strong>{{ $bs->nama }}</strong></h5>
                                <p>{!! $bs->keterangan_singkat !!}.</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <a class="btn button btn-rounded pink-btn btn-hvr-black mt-4" href="/bisnis1/{{$bs->slug}}">DETAIL</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @if(session('level')>0)
            @foreach ($bisnis as $bs)
            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                <div class="card card-1 wow fadeInLeft" data-wow-delay="300ms">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-12">

                                <div class="text-center">
                                    <img src="{{ asset($bs->logo)}}" class="text-center mt-3" alt="img" style="height:100px">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-12 mt-4">
                                <h5 class="card-title font"><strong>{{ $bs->nama }}</strong></h5>
                                <p>{!! Str::limit($bs->keterangan_singkat, 80,'...') !!}.</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <a class="btn button btn-rounded pink-btn btn-hvr-black mt-4" href="/bisnis/{{$bs->slug}}">DETAIL</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>
    </div>

</section>
@endsection