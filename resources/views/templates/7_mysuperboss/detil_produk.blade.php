@extends('templates.7_mysuperboss.master')
@section('meta')
<meta property="og:title" content="{{ $produk->nama_brg }}" />
<meta property="og:image" content="{{ (@file_exists(public_path($produk->foto))) ? asset($produk->foto) : asset('images/no-product.svg') }}" />
<meta property="og:description" content="{{ $produk->keterangan_singkat }}" />
<meta property="og:type" content="website" />
@endsection
@section('nav')
@include('templates.7_mysuperboss.nav-content')
@stop
@section('content')

<?php
$name = session('data')->username
?>

<section class="page-title stand-banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="box-content">
                    <h2 class="hide-cursor wow fadeInUp" data-wow-delay="1.2s">Detail Produk</h2>
                    <ul class="page-breadcrumb link wow fadeInUp" data-wow-delay="1.6s">
                        <li><a href="/{{ session('data')->username }}"><span class="icon fas fa-home"></span>Home</a></li>
                        <li>Detail Produk</li>
                        <br>
                        <li style="float: left;"> <a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a></li>
                    </ul>
                </div>
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
                <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template }} <?PHP echo  str_replace(" ", "%20", $produk->nama_brg); ?>" target="_blank" class="btn btn-medium btn-rounded btn-blue-dark-white mt-5 w-100"><i class="fa fa-cart-plus mr-1"></i> Beli</a>

            </div>

            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-8 col-md-8">
                @include('templates.global.shared')
                <h2 class="section-title text-black " data-aos="fade-left" data-aos-delay="200"><strong>{{ $produk->nama_brg }}</strong></h2>
                <h3 style="font-family: 'Poppins', sans-serif;color:#002450"><strong>Rp. <?PHP echo number_format($produk->harga); ?></strong></h3>
                @if($testimoni < 1) <br>
                    @else
                    <a class="testimoni-text text-dark mb-3" style="font-size:18px;font-weight:300" href="{{ env('APP_URL') }}/testimoni/{{$produk->slug}}"><i class="fa fa-quote-right"></i> Testimoni</a>
                    @endif
                    <hr>
                    <p class="text-black" data-aos="fade-left">Detil Produk</p>
                    <p style="color: #000 !important;" data-aos="fade-left" data-aos-delay="300">{!! $produk->keterangan !!}.</p>
            </div>
        </div>
    </div>
</section>
@endsection