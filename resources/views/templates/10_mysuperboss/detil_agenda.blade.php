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
            <h4>Detail Agenda</h4>
            <div class="crumbs">
                <nav aria-label="breadcrumb" class="breadcrumb-items">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/{{ session('data')->username }}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href>Detail Agenda</a></li>
                    </ol>
                    <a class="text-white" href="javascript:history.back(-1)" style="float: left;" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="blog-content">
    <div class="container">
        <div class="row mt-5 wow slideInUp">
            <div class="col-12 mb-4">
                <h2>{{ $data->acara }}</h2>
                <img src="{{ (@file_exists(public_path($data->foto))) ? asset($data->foto) : asset('images/no-business.svg') }}" alt="event thumb" class="img-fluid w-100">
            </div>
        </div>
        <div class="row align-items-center mb-5">
            <div class="col-lg-12">
                <ul class="list-inline">
                    <div class="row">
                        <div class="col-md-3">

                            <li class="list-inline-item mr-xl-5 mr-4 mb-3 mb-lg-0">
                                <div class="d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-4">

                                            <i class="fa fa-map-marker text-success icon-md mr-2"></i>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8">

                                            <div class="text-left">
                                                <h6 class="mb-0">HARI</h6>
                                                <p class="mb-0">{{only_day($data->tanggal)}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>
                        <div class="col-md-4">

                            <li class="list-inline-item mr-xl-5 mr-4 mb-3 mb-lg-0">
                                <div class="d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-4">

                                            <i class="fa fa-calendar text-success icon-md mr-2"></i>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8">

                                            <div class="text-left">
                                                <h6 class="mb-0">TANGGAL</h6>
                                                <p class="mb-0">{{convert_tgl1($data->tanggal)}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>
                        <div class="col-md-5">

                            <li class="list-inline-item mr-xl-5 mr-4 mb-3 mb-lg-0">
                                <div class="d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-4">

                                            <i class="fa fa-clock-o text-success icon-md mr-2"></i>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8">

                                            <div class="text-left">
                                                <h6 class="mb-0">WAKTU</h6>
                                                <p class="mb-0">{{ $data->jam }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>
                    </div>

                </ul>
            </div>
            <div class="col-12 mt-4 order-4">
                <div class="border-bottom border-light"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-5">
                <h3>Tentang Acara</h3>
                {!! $data->keterangan !!}
            </div>
        </div>
    </div>
</section>
@endsection