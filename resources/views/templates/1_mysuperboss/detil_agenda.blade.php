@extends('templates.1_mysuperboss.master')
@section('nav')
@include('templates.1_mysuperboss.nav-content')
@stop
@section('content')
<!-- ======= Breadcrumbs ======= -->
<?php
$name = session('data')->username
?>
<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2><a href="javascript:history.back(-1)"><i class="fa fa-angle-left"></i></a> Detil Agenda</h2>
            <ol>
                <li><a href="/{{ session('data')->username }}">Home</a></li>
                <li><a href="/agenda">Agenda</a></li>
                <li>Detil Agenda</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->
<section class="detail-event section-bg3">
    <div class="container">

        <div class="row mt-5">
            <div class="col-md-4 col-lg-4">
            </div>
            <div class="col-md-8 col-lg-8 mb-3 text-center">
                <h2>{{ $data->acara }}</h2>
            </div>
        </div>

        <div class="row  mb-5">
            <div class="col-md-4 col-lg-4 mb-5  align-top ">
                <img src="{{ (@file_exists(public_path($data->foto))) ? asset($data->foto) : asset('images/no-business.svg') }}" alt="event thumb" class="img img-thumbnail align-top">
            </div>
            <div class="col-md-8 col-lg-8 mt-50 mb-50">


                <div style="overflow:auto">
                    {!! $data->keterangan !!}
                </div>
                <ul class="list-inline">
                    <div class="row">
                        <div class="col-3">

                            <li class="list-inline-item ">
                                <div class="d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-4">

                                            <i class="fa fa-map-marker text-danger icon-md mr-2"></i>
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
                        <div class="col-4">

                            <li class="list-inline-item ">
                                <div class="d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-4">

                                            <i class="fa fa-calendar text-danger icon-md mr-2"></i>
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
                        <div class="col-5">

                            <li class="list-inline-item ">
                                <div class="d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-4">

                                            <i class="fa fa-clock-o text-danger icon-md mr-2"></i>
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
        </div>


    </div>
</section>
@endsection