@extends('templates.4_mysuperboss.master')
@section('nav')
@include('templates.4_mysuperboss.nav-content')
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
</section>
<section id="feature" class="feature">
    <div class="container">
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
            @foreach ($bisnis_default as $bs)
            <div class="col-12 col-md-4 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="300">
                <a href="/bisnis1/{{$bs->slug}}" style="color:grey">
                    <div class="card box text-center">
                        <div class="feature-icon text-center">
                            <img src="{{ asset($bs->logo)}}" alt="img" style="height:100px">
                        </div>
                        <div class="card-body">
                            <p class="card-text sub-heading text-black">{{ $bs->nama }}.</p>
                            <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                            <a href="/bisnis1/{{$bs->slug}}" class="btn btn-slider pink-btn rounded-pill mt-2">Detil Bisnis</a>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @if(session('level')>0)
            @foreach ($bisnis as $bs)
            <div class="col-12 col-md-4 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="300">
                <a href="/bisnis/{{$bs->slug}}" style="color:grey">
                    <div class="card box text-center">
                        <div class="feature-icon text-center">
                            <img src="{{ asset($bs->logo)}}" alt="img" style="height:100px">
                        </div>
                        <div class="card-body">
                            <p class="card-text sub-heading text-black">{{ $bs->nama }}.</p>
                            <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                            <a href="/bisnis/{{$bs->slug}}" class="btn btn-slider pink-btn rounded-pill mt-2">Detil Bisnis</a>
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