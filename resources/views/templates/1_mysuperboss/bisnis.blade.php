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
            <h2><a href="javascript:history.back(-1)"><i class="fa fa-angle-left"></i></a> Bisnis</h2>
            <ol>
                <li><a href="/{{ session('data')->username }}">Home</a></li>
                <li>Bisnis</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<!-- section business -->
<section class="section-bg3 business">
    <div class="container">

        <div class="row mt-5 justify-content-center">
            @foreach ($bisnis_default as $bs)
            <div class="col-lg-4 col-md-6 align-self-center " data-aos="zoom-in" data-aos-delay="100">
                <a href="/bisnis1/{{$bs->slug}}">
                    <div class="icon-box">
                        <div class="icon"> <img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:100px;height:auto;"></div>
                        <h4>{{ $bs->nama }}</h4>
                        <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                        <div class="text-center">
                            <a href="/bisnis1/{{$bs->slug}}" class="btn-custom3 mb-3">Detil Bisnis</a>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @if(session('level')>0)
            @foreach ($bisnis as $bs)
            <div class="col-lg-4 col-md-6 align-self-center " data-aos="zoom-in" data-aos-delay="100">
                <a href="/bisnis/{{$bs->slug}}">
                    <div class="icon-box">
                        <div class="icon"> <img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:100px;height:auto;"></div>
                        <h4><a href="/bisnis/{{$bs->slug}}">{{ $bs->nama }}</a></h4>
                        <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                        <div class="text-center">
                            <a href="/bisnis/{{$bs->slug}}" class="btn-custom3 mb-3">Detil Bisnis</a>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endsection