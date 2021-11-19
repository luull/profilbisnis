@extends('templates.5_mysuperboss.master')
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
                <h2>Detail Agenda</h2>
                <ul class="page-breadcrumb ">
                    <li><a href="/{{ session('data')->username }}"><i class="fas fa-home"></i>Home <i class="fas fa-angle-double-right white-icon"></i></a></li>
                    <li>Detail Agenda</li>
                    <br>
                    <li> <a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a></li>
                </ul>
            </div>

        </div>
    </div>
</section>
<section class="main-page">
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
            <div class="col-12 mb-50">
                <h3>Tentang Acara</h3>
                {!! $data->keterangan !!}
            </div>
        </div>
    </div>
</section>
@endsection