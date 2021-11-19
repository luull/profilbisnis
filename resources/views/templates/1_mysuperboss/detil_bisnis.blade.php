@extends('templates.1_mysuperboss.master')
@section('nav')
@include('templates.1_mysuperboss.nav-content')
@stop
@section('content')
<?php
$name = session('data')->username
?>
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2><a href="javascript:history.back(-1)"><i class="fa fa-angle-left"></i></a> Detil Bisnis</h2>
            <ol>
                <li><a href="/{{ session('data')->username }}">Home</a></li>
                <li><a href="/bisnis">Bisnis</a></li>
                <li>Detil Bisnis</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->
<section class="section-bg3">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="row">

                <div class="col-6 mb-3">
                    @if ($jproduk>0)
                    <a href="javascript:history.back(-1)" class="btn-custom"><i class="fa fa-undo"></i> Kembali</a>
                    @endif

                </div>
                <div class="col-6 mb-3">
                    @if($count_produk < 1) <br>
                        @else
                        <a href="{{ env('APP_URL') }}/{{$link}}/produk/{{ $bisnis->slug }}" class="btn-custom" style="float:right;"><i class="fa fa-shopping-cart"></i> Daftar Produk</a>
                        @endif
                </div>
                <div class="col-lg-12 col-md-12 align-self-center">
                    <div class="card mb-3" style="max-width:100%;overflow:scroll;">
                        <div class="row g-0">
                            <div class="col-md-12">
                                <div class="card-header">

                                    <img src="{{ (@file_exists(public_path($bisnis->logo))) ? asset($bisnis->logo) : asset('images/no-business.svg') }}" class="img-fluid" style="width:50px;float:left;" alt="...">
                                    <h5 class="text-center pt-4">{!! $bisnis->nama !!}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="container">

                                        <p class="card-text">{!! $bisnis->keterangan !!}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection