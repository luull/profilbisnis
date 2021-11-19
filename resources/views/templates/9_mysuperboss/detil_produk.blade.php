@extends('templates.9_mysuperboss.master')
@section('meta')
<meta property="og:title" content="{{ $produk->nama_brg }}" />
<meta property="og:image" content="{{ (@file_exists(public_path($produk->foto))) ? asset($produk->foto) : asset('images/no-product.svg') }}" />
<meta property="og:description" content="{{ $produk->keterangan_singkat }}" />
<meta property="og:type" content="website" />
@endsection
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
            <h2><a href="javascript:history.back(-1)"><i class="fa fa-angle-left"></i></a> Detail Produk</h2>
            <ol>
                <li><a href="/{{ session('data')->username }}">Home</a></li>
                <li>Detail Produk</li>
            </ol>
        </div>

    </div>
</section>

<section class="bg-section product-detail">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-3 col-md-3">
                <div class="row justify-content-center " style="background:#fff;">
                    <img src="{{ (@file_exists(public_path($produk->foto))) ? asset($produk->foto) : asset('images/no-product.svg') }}" class="img-fluid align-top " alt="{{ $produk->nama_brg }}">
                </div>
                <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template }} <?PHP echo  str_replace(" ", "%20", $produk->nama_brg); ?>" target="_blank" class="about-btn btn-block mt-3" style="text-align: center;">
                    <i class="fa fa-cart-plus mr-3"></i> Beli</a>

            </div>

            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-8 col-md-8">
                @include('templates.global.shared')
                <h2 class="section-title mb-0" data-aos="fade-left" data-aos-delay="200"><strong>{{ $produk->nama_brg }}</strong></h2>
                <h3 style="font-family: 'Poppins', sans-serif;color:#16df7e"><strong>Rp. <?PHP echo number_format($produk->harga); ?></strong></h3>
                @if($testimoni < 1) <br>
                    @else
                    <a class="text-secondary mb-3" style="font-size:18px;font-weight:300" href="{{ env('APP_URL') }}/testimoni/{{$produk->slug}}"><i class="fa fa-quote-right"></i> Testimoni</a>
                    @endif
                    <hr>
                    <p class="subtitle " data-aos="fade-left">Detil Produk</p>
                    <p class="mb-4" data-aos="fade-left" data-aos-delay="300">{!! $produk->keterangan !!}.</p>
            </div>
        </div>
    </div>
</section>
@endsection