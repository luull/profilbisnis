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
            <h2><a href="javascript:history.back(-1)"><i class="fa fa-angle-left"></i></a> Produk</h2>
            <ol>
                <li><a href="/{{ session('data')->username }}">Home</a></li>
                <li>Produk</li>
            </ol>
        </div>

    </div>
</section>
<section class="featured-items section" id="featured-items" style="margin-top: 0px !important;">
    <div class="container">
        @include('templates.global.search')
        <div class="row">
            @foreach ($produk_default as $item)
            <div class="col-12 col-md-6 col-lg-4 text-center wow slideInUp" data-aos="fade-up" data-aos-delay="300">
                <div class="featured-item-card">
                    <div class="item-img">
                        <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                        <div class="item-overlay">
                            <div class="item-btns">
                                <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-view"><i class="las la-eye" style="font-size: 50px;color:#fff;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item-detail">
                        <h4 class="item-name mb-4">{{ $item->nama_brg }}</h4>
                        <p>{!! Str::limit($item->keterangan_singkat, 150, '...') !!}</p>
                        <p class="item-price">Rp. <?PHP echo number_format($item->harga); ?></p>
                        <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-slider pink-btn rounded-pill mt-4">Detil Produk</a>
                        <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template1 }} <?PHP echo  str_replace(" ", "%20", $item->nama_brg); ?>" target="_blank" class="btn btn-slider yellow-btn rounded-pill mt-4">Beli</a>
                    </div>
                </div>
            </div>
            @endforeach
            @if (session('level')>0)
            @foreach ($produk as $item)
            <div class="col-12 col-md-6 col-lg-4 text-center wow slideInUp" data-aos="fade-up" data-aos-delay="300">
                <div class="featured-item-card">
                    <div class="item-img">
                        <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                        <div class="item-overlay">
                            <div class="item-btns">
                                <a href="/produk/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-view"><i class="las la-eye" style="font-size: 50px;color:#fff;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item-detail">
                        <h4 class="item-name mb-4">{{ $item->nama_brg }}</h4>
                        <p>{!! Str::limit($item->keterangan_singkat, 150, '...') !!}</p>
                        <p class="item-price">Rp. <?PHP echo number_format($item->harga); ?></p>
                        <a href="/produk/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-slider pink-btn rounded-pill mt-4">Detil Produk</a>
                        <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template1 }} <?PHP echo  str_replace(" ", "%20", $item->nama_brg); ?>" target="_blank" class="btn btn-slider yellow-btn rounded-pill mt-4">Beli</a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>
        <!-- <div class="row">
            <div class="col-12 text-center mt-5">
                <a href="food-shop/product-listing.html" class="btn web-btn rounded-pill">Load More <i class="las la-arrow-right"></i> </a>
            </div>
        </div> -->
    </div>
</section>
@endsection