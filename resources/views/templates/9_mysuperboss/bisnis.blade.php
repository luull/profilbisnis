@extends('templates.9_mysuperboss.master')
@section('nav')
@include('templates.9_mysuperboss.nav-content')
@stop
@section('content')
<!-- ======= Breadcrumbs ======= -->
<?php
$name = session('data')->username
?>
<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2><a href="javascript:history.back(-1)"><i class="fa fa-angle-left"></i></a> Bisnis</h2>
            <ol>
                <li><a href="/{{ session('data')->username }}">Home</a></li>
                <li>Bisnis</li>
            </ol>
        </div>

    </div>
</section>


<!-- section business -->
<section id="services" class="services bg-section">
    <div class="container" data-aos="fade-up">

        <div class="row justify-content-center">
            @foreach ($bisnis_default as $bs)
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                    <div class="icon"><img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:100px;height:auto;"></div>
                    <h4 style="color: #fff !important;"><a href="/bisnis1/{{$bs->slug}}">{{ $bs->nama }}</a></h4>
                    <p>{!! Str::limit($bs->keterangan_singkat, 80,'...') !!}</p>
                </div>
            </div>
            @endforeach
            @if(session('level')>0)
            @foreach ($bisnis as $bs)
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                    <div class="icon"><img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:100px;height:auto;"></div>
                    <h4 style="color: #fff !important;"><a href="/bisnis/{{$bs->slug}}">{{ $bs->nama }}</a></h4>
                    <p>{!! Str::limit($bs->keterangan_singkat, 80,'...') !!}</p>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endsection