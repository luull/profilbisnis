@extends('templates.9_mysuperboss.master')
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
            <h2><a href="javascript:history.back(-1)"><i class="fa fa-angle-left"></i></a> Daftar Produk {{ Str::upper($nama_bisnis) }}</h2>
            <ol>
                <li><a href="/{{ session('data')->username }}">Home</a></li>
                <li>Daftar Produk</li>
            </ol>
        </div>

    </div>
</section>
<section class="product bg-section" id="produk">
    <div class="container" data-aos="fade-up">
        @include('templates.global.search2')
        <div class="row gy-4 mt-3 justify-content-center" data-aos="fade-left">
            @foreach ($produk as $item)
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <a href="{{ env('APP_URL') }}/{{$link}}/{{ session('data')->username }}/{{$item->slug}}">
                    <div class="card box" style="height:auto;">
                        <div class="card-body">
                            <div class="box">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3 class="text-white">{{ $item->nama_brg }}</h3>
                                        <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                                        <div style="height: 120px;color:#fff !important;">
                                            <p>{!! Str::limit($item->keterangan_singkat, 150, '...') !!}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="price"><sup>Rp.</sup><?PHP echo number_format($item->harga); ?></div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-12">
                                        <div class="row justify-content-center">
                                            <div class="col-md-3">

                                                <a href="{{ env('APP_URL') }}/{{$link}}/{{ session('data')->username }}/{{$item->slug}}" class="btn pink-btn2 button btn-rounded">Detail</a>
                                            </div>
                                            <div class="col-md-7">
                                                <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template1 }} <?PHP echo  str_replace(" ", "%20", $item->nama_brg); ?>" target="_blank" class="btn pink-btn btn-hvr-white button btn-rounded">Beli</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection