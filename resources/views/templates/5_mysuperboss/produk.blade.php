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
                <h2>Produk</h2>
                <ul class="page-breadcrumb ">
                    <li><a href="/{{ session('data')->username }}"><i class="fas fa-home"></i>Home <i class="fas fa-angle-double-right white-icon"></i></a></li>
                    <li>Produk</li>
                    <br>
                    <li> <a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a></li>
                </ul>
            </div>

        </div>
    </div>
</section>
<section id="steps" class="section steps">
    <div class="container">
        @include('templates.global.search')
        <div class="row justify-content-center no-gutters wow slideInLeft" data-aos="fade-up">
            @foreach ($produk_default as $item)
            <div class="col-lg-4 col-md-6 content-item mb-5" data-aos="fade-up" data-aos-delay="100">
                <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}">
                    <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                    <span class="mt-4">Rp.<?PHP echo number_format($item->harga); ?></span>
                    <h4>{{ $item->nama_brg }}</h4>
                    <p>{!! Str::limit($item->keterangan_singkat, 150, '...') !!}</p>
                </a>
                <div class="row mt-5 mb-5">
                    <div class="col-lg-3 col-md-3 col-12">

                        <a href="{{ env('APP_URL') }}/produk1/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-hvr-black pink-btn2 btn-rounded mb-5 ">Detail</a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 ml-2">

                        <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template1 }} <?PHP echo  str_replace(" ", "%20", $item->nama_brg); ?>" target="_blank" class="btn btn-hvr-black pink-btn btn-rounded mb-5 btn-block">Beli</a>
                    </div>
                </div>


            </div>
            @endforeach
            @if (session('level')>0)
            @foreach ($produk as $item)
            <div class="col-lg-4 col-md-6 content-item mb-5" data-aos="fade-up" data-aos-delay="100">
                <a href="/produk/{{ session('data')->username }}/{{$item->slug}}">
                    <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                    <span class="mt-4">Rp.<?PHP echo number_format($item->harga); ?></span>
                    <h4>{{ $item->nama_brg }}</h4>
                    <p>{!! Str::limit($item->keterangan_singkat, 150, '...') !!}</p>
                </a>

                <div class="row mt-5 mb-5">
                    <div class="col-lg-3 col-md-3 col-12">

                        <a href="{{ env('APP_URL') }}/produk/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-hvr-black pink-btn2 btn-rounded mb-5 ">Detail</a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 ml-2">

                        <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template1 }} <?PHP echo  str_replace(" ", "%20", $item->nama_brg); ?>" target="_blank" class="btn btn-hvr-black pink-btn btn-rounded mb-5 btn-block">Beli</a>
                    </div>
                </div>

            </div>

            @endforeach
            @endif

        </div>

    </div>
</section>
@endsection