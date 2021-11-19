@extends('templates.10_mysuperboss.master')
@section('meta')
@foreach ($data as $item)
<meta property="og:title" content="{{$item->judul}}" />
<meta property="og:image" content="{{asset($item->foto)}}" />
<meta property="og:description" content="{{$item->nama}} - {{$item->alamat}}" />
<meta property="og:type" content="website" />
@endforeach
@endsection
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
            <h4>Detail Testimoni</h4>
            <div class="crumbs">
                <nav aria-label="breadcrumb" class="breadcrumb-items">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/{{ session('data')->username }}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href>Detail Testimoni</a></li>
                    </ol>
                    <a class="text-white" href="javascript:history.back(-1)" style="float: left;" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="blog-content product-detail">
    <div class="container">
        <div class="row mt-5 justify-content-center">
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