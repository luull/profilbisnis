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
            <h4>Testimoni</h4>
            <div class="crumbs">
                <nav aria-label="breadcrumb" class="breadcrumb-items">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/{{ session('data')->username }}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href>Testimoni</a></li>
                    </ol>
                    <a class="text-white" href="javascript:history.back(-1)" style="float: left;" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section id="pricing" class="blog-content mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Plan-1 -->
            @foreach ($data1 as $item)
            <div class="col-lg-4 col-md-12 col-sm-12 price-pink wow fadeInLeft" data-wow-delay="300ms">
                <a href="{{ env('APP_URL') }}/testimoni1/detil/{{ session('data')->username }}/{{$item->id}}">
                    <div class="pricing-item">
                        @if (!empty($item->foto))
                        <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                        @endif
                        <h4 class="pb-2 pt-4 main-font text-grey">{{$item->judul}}</h4>
                        <p class="pricing-para text-grey ml-3"><i class="fa fa-user mr-2"></i>{{$item->nama}}</p>
                    </div>
                </a>
            </div>
            @endforeach
            @foreach ($data as $item)
            <div class="col-lg-4 col-md-12 col-sm-12 price-pink wow fadeInLeft" data-wow-delay="300ms">
                <a href="{{ env('APP_URL') }}/testimoni/detil/{{ session('data')->username }}/{{$item->id}}">
                    <div class="pricing-item">
                        @if (!empty($item->foto))
                        <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                        @endif
                        <h4 class="pb-2 pt-4 main-font text-grey">{{$item->judul}}</h4>
                        <p class="pricing-para text-grey ml-3"><i class="fa fa-user mr-2"></i>{{$item->nama}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>