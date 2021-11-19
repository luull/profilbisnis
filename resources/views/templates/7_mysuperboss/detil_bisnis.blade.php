@extends('templates.7_mysuperboss.master')
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
                    <h2 class="hide-cursor wow fadeInUp" data-wow-delay="1.2s">Detail Bisnis</h2>
                    <ul class="page-breadcrumb link wow fadeInUp" data-wow-delay="1.6s">
                        <li><a href="/{{ session('data')->username }}"><span class="icon fas fa-home"></span>Home</a></li>
                        <li>Detail Bisnis</li>
                        <br>
                        <li style="float: left;"> <a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-grey">
    <div class="container">
        <div class="row mt-5 justify-content-end wow slideInUp">
            <div class="col-lg-12 col-md-12 mb-5">
                @if($count_produk < 1) <br>
                    @else
                    <a href="{{ env('APP_URL') }}/{{$link}}/produk/{{ $bisnis->slug }}" class="btn btn-medium btn-rounded btn-blue-dark-white mb-3" style="float:right;"><i class="fa fa-shopping-cart"></i> Daftar Produk</a>
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