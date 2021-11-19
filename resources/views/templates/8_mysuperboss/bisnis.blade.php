@extends('templates.8_mysuperboss.master')
@section('nav')
@include('templates.8_mysuperboss.nav-content')
@stop
@section('content')

<?php
$name = session('data')->username
?>
<section class="about-banner pb-0 padding-100">
    <div class="blog-detail-img parallaxie">
        <div class="bg-overlay opacity-7 bg-blue"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-capitalize mb-15 text-center text-white">Bisnis</h2>
                    <div class="page_nav pt-10">
                        <a href="/{{ session('data')->username }}" class="text-white blog-15">Home</a> <span class="text-white blog-15"><i class="fa fa-angle-double-right text-white angle-font"></i>Bisnis</span>
                        <br>
                        <p style="float: left !important;"><a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section business bg-grey">
    <div class="container">

        <div class="row mt-5 justify-content-center wow slideInUp">
            @foreach ($bisnis_default as $bs)
            <div class="col-12 col-md-4 col-lg-4 align-self-center mb-5" data-aos="zoom-in" data-aos-delay="100">
                <a href="/bisnis1/{{$bs->slug}}">
                    <div class="icon-box">
                        <div class="icon"> <img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:100px;height:auto;"></div>
                        <h4><a href="/bisnis1/{{$bs->slug}}">{{ $bs->nama }}</a></h4>
                        <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                        <a href="/bisnis1/{{$bs->slug}}" class="btn btn-green btn btn-large btn-rounded mt-3">Detil Bisnis</a>
                    </div>
                </a>
            </div>
            @endforeach
            @if(session('level')>0)
            @foreach ($bisnis as $bs)
            <div class="col-12 col-md-4 col-lg-4 align-self-center mb-5" data-aos="zoom-in" data-aos-delay="100">
                <a href="/bisnis/{{$bs->slug}}">
                    <div class="icon-box">
                        <div class="icon"> <img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:100px;height:auto;"></div>
                        <h4><a href="/bisnis/{{$bs->slug}}">{{ $bs->nama }}</a></h4>
                        <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                        <a href="/bisnis/{{$bs->slug}}" class="btn btn-green btn btn-large btn-rounded mt-3">Detil Bisnis</a>
                    </div>
                </a>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endsection