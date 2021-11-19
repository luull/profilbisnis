@extends('templates.6_mysuperboss.master')
@section('nav')
@include('templates.6_mysuperboss.nav-content')
@stop
@section('content')

<?php
$name = session('data')->username
?>
<section class="page-title">
    <div class="bg-overlay bg-black opacity-4"></div>
    <div class="container">
        <h2 class="hide-cursor">Detail Bisnis</h2>
        <ul class="page-breadcrumb link">
            <li><a href="/{{ session('data')->username }}"><span class="icon fas fa-home"></span>Home</a></li>
            <li>Detail Bisnis</li>
            <a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a>
        </ul>
    </div>
</section>
<section class="section-bg">
    <div class="container">
        <div class="row mt-5 justify-content-center wow slideInUp">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    @if($count_produk < 1) <br>
                        @else
                        <a href="{{ env('APP_URL') }}/{{$link}}/produk/{{ $bisnis->slug }}" class="btn btn-small btn-rounded btn-pink nav-button mb-3" style="float:right;"><i class="fa fa-shopping-cart"></i> Daftar Produk</a>
                        @endif
                </div>
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
    </div>
</section>
@endsection