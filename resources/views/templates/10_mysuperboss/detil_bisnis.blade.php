@extends('templates.10_mysuperboss.master')
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
            <h4>Detail Bisnis</h4>
            <div class="crumbs">
                <nav aria-label="breadcrumb" class="breadcrumb-items">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/{{ session('data')->username }}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href>Detail Bisnis</a></li>
                    </ol>
                    <a class="text-white" href="javascript:history.back(-1)" style="float: left;" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="blog-content">
    <div class="container">
        <div class="row mt-5 justify-content-end wow slideInUp">
            <div class="col-lg-12 col-md-12 mb-5">
                @if($count_produk < 1) <br>
                    @else
                    <a href="{{ env('APP_URL') }}/{{$link}}/produk/{{ $bisnis->slug }}" class="btn btn-medium btn-rounded yellow-and-white-slider-btn mb-3" style="float:right;"><i class="fa fa-shopping-cart"></i> Daftar Produk</a>
                    @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 align-self-center">
                <div class="cards mb-3" style="max-width:100%;overflow:scroll;">
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="card-header">

                                <img src="{{ (@file_exists(public_path($bisnis->logo))) ? asset($bisnis->logo) : asset('images/no-business.svg') }}" class="img-fluid" style="width:50px;float:left;" alt="...">
                                <h5 class="text-center pt-4">{!! $bisnis->nama !!}</h5>
                            </div>
                            <p class="card-text">{!! $bisnis->keterangan !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection