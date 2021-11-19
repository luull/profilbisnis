@extends('templates.10_mysuperboss.master')
@section('nav')
@include('templates.10_mysuperboss.nav-content')
@stop
@section('content')

<?php
$name = session('data')->username
?>

<section id="slider-sec" class="slider-sec parallax">
    <div class="overlay text-center d-flex justify-content-center align-items-center">
        <div class="slide-contain">
            <h4>Bisnis</h4>
            <div class="crumbs">
                <nav aria-label="breadcrumb" class="breadcrumb-items">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/{{ session('data')->username }}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href>Bisnis</a></li>
                    </ol>
                    <a class="text-white" href="javascript:history.back(-1)" style="float: left;" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="speaker-counter blog-content">
    <div class="container">
        <div class="row wow slideInUp">
            <div class="col-12">
                <div class="counter-div" style="border-top: 0px !important;padding-top:0px !important;">

                    <div class="row justify-content-center">
                        @foreach ($bisnis_default as $bs)
                        <div class="col-12 col-md-6 col-lg-4 counter-cards text-center">
                            <a href="/bisnis1/{{$bs->slug}}">
                                <div class="counter-card">
                                    <a href="/bisnis1/{{$bs->slug}}" class="counter-icon"> <img src="{{ asset($bs->logo)}}" style="width:45px;height:auto"></a>
                                    <h4 class="counter-num"><strong>{{ $bs->nama }}</strong></h4>
                                    <p class="counter-text " style="text-align:left !important">{!! $bs->keterangan_singkat !!}</p>
                                </div>
                                <a href="/bisnis1/{{$bs->slug}}" style="margin-top: -25px;" class="btn btn-medium btn-rounded yellow-and-white-slider-btn">
                                    Detail Bisnis<i class="las la-arrow-right"></i>
                                </a>
                            </a>
                        </div>
                        @endforeach
                        @if(session('level')>0)
                        @foreach ($bisnis as $bs)
                        <div class="col-12 col-md-6 col-lg-4 counter-cards text-center">
                            <a href="/bisnis/{{$bs->slug}}">
                                <div class="counter-card">
                                    <a href="/bisnis/{{$bs->slug}}" class="counter-icon"> <img src="{{ asset($bs->logo)}}" style="width:45px;height:auto"></a>
                                    <h4 class="counter-num"><strong>{{ $bs->nama }}</strong></h4>
                                    <p class="counter-text" style="text-align:left !important">{!! Str::limit($bs->keterangan_singkat, 60,'...') !!}</p>
                                </div>
                                <a href="/bisnis/{{$bs->slug}}" style="margin-top: -25px;" class="btn btn-medium btn-rounded yellow-and-white-slider-btn">
                                    Detail Bisnis<i class="las la-arrow-right"></i>
                                </a>
                            </a>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection