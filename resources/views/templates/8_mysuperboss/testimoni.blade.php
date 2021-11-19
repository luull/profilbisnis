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
                    <h2 class="text-capitalize mb-15 text-center text-white">Testimoni</h2>
                    <div class="page_nav pt-10">
                        <a href="/{{ session('data')->username }}" class="text-white blog-15">Home</a> <span class="text-white blog-15"><i class="fa fa-angle-double-right text-white angle-font"></i>Testimoni</span>
                        <br>
                        <p style="float: left !important;"><a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="pricing" class="bg-grey">
    <div class="container">
        <div class="row justify-content-center wow slideInUp">
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