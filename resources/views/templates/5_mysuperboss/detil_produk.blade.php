@extends('templates.5_mysuperboss.master')
@section('meta')
<meta property="og:title" content="{{ $produk->nama_brg }}" />
<meta property="og:image" content="{{ (@file_exists(public_path($produk->foto))) ? asset($produk->foto) : asset('images/no-product.svg') }}" />
<meta property="og:description" content="{{ $produk->keterangan_singkat }}" />
<meta property="og:type" content="website" />
@endsection
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
                <h2>Detail Produk</h2>
                <ul class="page-breadcrumb ">
                    <li><a href="/{{ session('data')->username }}"><i class="fas fa-home"></i>Home <i class="fas fa-angle-double-right white-icon"></i></a></li>
                    <li>Detail Produk</li>
                    <br>
                    <li> <a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a></li>
                </ul>
            </div>

        </div>
    </div>
</section>
<section class="main-page">
    <div class="container">
        <div class="row justify-content-center wow slideInUp">
            <div class="col-lg-3 col-md-3">
                <div class="row justify-content-center " style="background:#fff;">
                    <img src="{{ (@file_exists(public_path($produk->foto))) ? asset($produk->foto) : asset('images/no-product.svg') }}" class="img-fluid align-top " alt="{{ $produk->nama_brg }}">
                </div>
                <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template }} <?PHP echo  str_replace(" ", "%20", $produk->nama_brg); ?>" target="_blank" class="btn btn-hvr-red mt-5 red-btn2 btn-rounded btn-block"><i class="fa fa-cart-plus mr-1"></i> Beli</a>

            </div>
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-8 col-md-8">
                @include('templates.global.shared')
                <h2 class="section-title " data-aos="fade-left" data-aos-delay="200"><strong>{{ $produk->nama_brg }}</strong></h2>
                <h3 style="font-family: 'Poppins', sans-serif;color:#f92851"><strong>Rp. <?PHP echo number_format($produk->harga); ?></strong></h3>
                @if($testimoni < 1) <br>
                    @else
                    <a class="testimoni-text text-dark mb-3" style="font-size:18px;font-weight:300" href="{{ env('APP_URL') }}/testimoni/{{$produk->slug}}"><i class="fa fa-quote-right"></i> Testimoni</a>
                    @endif
                    <hr>
                    <p class="subtitle " data-aos="fade-left">Detil Produk</p>
                    <p class="mb-4" data-aos="fade-left" data-aos-delay="300">{!! $produk->keterangan !!}.</p>
            </div>
        </div>
    </div>
</section>
@endsection