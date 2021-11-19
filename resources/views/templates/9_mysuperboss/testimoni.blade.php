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
            <h2><a href="javascript:history.back(-1)"><i class="fa fa-angle-left"></i></a> Testimoni</h2>
            <ol>
                <li><a href="/{{ session('data')->username }}">Home</a></li>
                <li>Testimoni</li>
            </ol>
        </div>

    </div>
</section>
<section class="testimonial bg-section">
    <div class="container">
        <div class="row justify-content-center mt-5">
            @foreach ($data1 as $item)
            <div class="col-md-4 mb-4">
                <div class="card" style="height: auto;">
                    <a href="{{ env('APP_URL') }}/testimoni1/detil/{{ session('data')->username }}/{{$item->id}}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="{{asset($item->foto)}}" class="img-fluid" alt="{{ $item->nama_brg }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="card-header bg-transparent mb-0" style="border:none !important;">
                                        <i class="fa fa-quote-right mb-0"></i>
                                    </div>
                                    <div class="card-content mb-5">
                                        <h5 class="mb-0"><strong>{{$item->judul}}</strong></h5>
                                    </div>

                                    <div class="card-footer bg-transparent mt-3 mb-3">
                                        <small class="mb-0"><strong>{{$item->nama}}</strong></small>
                                        <br>
                                        <small class="mb-0">{{$item->alamat}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            @foreach ($data as $item)
            <div class="col-md-4 mb-4">
                <div class="card" style="height: auto;">
                    <a href="{{ env('APP_URL') }}/testimoni/detil/{{ session('data')->username }}/{{$item->id}}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="{{asset($item->foto)}}" class="img-fluid" alt="{{ $item->nama_brg }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="card-header bg-transparent mb-0" style="border:none !important;">
                                        <i class="fa fa-quote-right mb-0"></i>
                                    </div>
                                    <div class="card-content mb-5">
                                        <h5 class="mb-0"><strong>{{$item->judul}}</strong></h5>
                                    </div>

                                    <div class="card-footer bg-transparent mt-3 mb-3">
                                        <small class="mb-0"><strong>{{$item->nama}}</strong></small>
                                        <br>
                                        <small class="mb-0">{{$item->alamat}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>