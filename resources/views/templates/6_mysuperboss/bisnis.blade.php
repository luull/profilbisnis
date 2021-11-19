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
        <h2 class="hide-cursor">Bisnis</h2>
        <ul class="page-breadcrumb link">
            <li><a href="/{{ session('data')->username }}"><span class="icon fas fa-home"></span>Home</a></li>
            <li>Bisnis</li>
            <a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a>
        </ul>
    </div>
</section>

<section class="half-section stats-bg">
    <div class="container">
        <div class="row align-items-center wow slideInUp">
            <div class="col-lg-12 col-md-12">
                <div class="row about-margin justify-content-center">
                    <!-- First Box -->
                    @foreach ($bisnis_default as $bs)
                    <div class="col-md-4 col-sm-12">
                        <div class="about-box center-block bg-green wow zoomIn" data-wow-delay="400ms">
                            <div class="about-main-icon pb-4">
                                <img src="{{ asset($bs->logo)}}" alt="img" style="height:100px">
                            </div>
                            <h5>{{ $bs->nama }}</h5>
                            <small class="pricing-para text-grey mb-3 pt-3">{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</small>
                            <br>
                            <a href="/bisnis1/{{$bs->slug}}" class="btn btn-medium btn-rounded btn-pink nav-button mt-3">Detil Bisnis</a>

                        </div>
                    </div>

                    @endforeach
                    @if(session('level')>0)
                    @foreach ($bisnis as $bs)
                    <div class="col-md-4 col-sm-12">
                        <div class="about-box center-block bg-green wow zoomIn" data-wow-delay="400ms">
                            <div class="about-main-icon pb-4">
                                <img src="{{ asset($bs->logo)}}" alt="img" style="height:100px">
                            </div>
                            <h5>{{ $bs->nama }}</h5>
                            <small class="pricing-para text-grey mb-3 pt-3">{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</small>
                            <br>
                            <a href="/bisnis/{{$bs->slug}}" class="btn btn-medium btn-rounded btn-pink nav-button mt-3">Detil Bisnis</a>

                        </div>
                    </div>

                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection