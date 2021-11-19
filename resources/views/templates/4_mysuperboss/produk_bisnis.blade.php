@extends('templates.4_mysuperboss.master')
@section('nav')
@include('templates.4_mysuperboss.nav-content')
@stop
@section('content')

<?php
$name = session('data')->username
?>
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2><a href="javascript:history.back(-1)"><i class="fa fa-angle-left"></i></a> Daftar Produk {{ Str::upper($nama_bisnis) }}</h2>
            <ol>
                <li><a href="/{{ session('data')->username }}">Home</a></li>
                <li>Daftar Produk</li>
            </ol>
        </div>

    </div>
</section>
<section class="featured-items section" id="featured-items" style="margin-top: 0px !important;">
    <div class="container">
        @include('templates.global.search2')
        <div class="row">
            @foreach ($produk as $item)
            <div class="col-12 col-md-6 col-lg-4 text-center wow slideInUp">
                <div class="featured-item-card">
                    <div class="item-img">
                        <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                        <div class="item-overlay">
                            <div class="item-btns">
                                <a href="{{ env('APP_URL') }}/{{$link}}/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-view"><i class="las la-eye" style="font-size: 50px;color:#fff;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item-detail">
                        <h4 class="item-name mb-4">{{ $item->nama_brg }}</h4>
                        <p>{!! Str::limit($item->keterangan_singkat, 150, '...') !!}</p>
                        <p class="item-price">Rp. <?PHP echo number_format($item->harga); ?></p>
                        <a href="{{ env('APP_URL') }}/{{$link}}/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-slider pink-btn rounded-pill mt-4">Detil Produk</a>
                        <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template1 }} <?PHP echo  str_replace(" ", "%20", $item->nama_brg); ?>" target="_blank" class="btn btn-slider yellow-btn rounded-pill mt-4">Beli</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- <div class="row">
            <div class="col-12 text-center mt-5">
                <a href="food-shop/product-listing.html" class="btn web-btn rounded-pill">Load More <i class="las la-arrow-right"></i> </a>
            </div>
        </div> -->
    </div>
</section>

@endsection