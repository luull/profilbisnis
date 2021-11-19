@extends('templates.8_mysuperboss.master')
@section('meta')
@foreach ($data as $item)
<meta property="og:title" content="{{$item->judul}}" />
<meta property="og:image" content="{{asset($item->foto)}}" />
<meta property="og:description" content="{{$item->nama}} - {{$item->alamat}}" />
<meta property="og:type" content="website" />
@endforeach
@endsection
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
                    <h2 class="text-capitalize mb-15 text-center text-white">Detail Testimoni</h2>
                    <div class="page_nav pt-10">
                        <a href="/{{ session('data')->username }}" class="text-white blog-15">Home</a> <span class="text-white blog-15"><i class="fa fa-angle-double-right text-white angle-font"></i>Detail Testimoni</span>
                        <br>
                        <p style="float: left !important;"><a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-grey product-detail">
    <div class="container">
        <div class="row mt-5 justify-content-center wow slideInUp">
            @foreach ($data as $item)
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="row justify-content-center " style="background:#fff;">
                            <img src="{{asset($item->foto)}}" class="img-fluid" alt="{{ $item->nama_brg }}">
                        </div>
                    </div>

                    <div class="col-lg-1 col-md-1"></div>
                    <div class="col-lg-8 col-md-8">
                        @include('templates.global.shared2')
                        <h2 class="section-title " data-aos="fade-left" data-aos-delay="200"><strong>{{$item->judul}}</strong></h2>
                        <hr>
                        <p class="subtitle " data-aos="fade-left"><strong>{{$item->nama}}</strong> - {{$item->alamat}}</p>
                        <p class="mb-4" data-aos="fade-left" data-aos-delay="300">{!!$item->keterangan!!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection