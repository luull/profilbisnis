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
            <h4>Kontak</h4>
            <div class="crumbs">
                <nav aria-label="breadcrumb" class="breadcrumb-items">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/{{ session('data')->username }}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href>Kontak</a></li>
                    </ol>
                    <a class="text-white" href="javascript:history.back(-1)" style="float: left;" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section id="contact" class="contacts blog-content">
    <div class="container" data-aos="fade-up">
        <div class="row">
            @if (!@empty($data->map))
            <div class="col-lg-12">
                <div class="info-box mb-4">
                    <iframe src="{{$data->map}}" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            @endif
            @if (!@empty($data->alamat))
            <div class="col-lg-12">
                <div class="info-box mb-4">
                    <i class="fa fa-map"></i>
                    <h3>Alamat</h3>
                    <p class="text-black">{{$data->alamat}}, {{$data->kelurahan}}, {{$data->subdistrict->subdistrict_name}}, {{$data->city->city_name.' '.$data->city->type}}, {{$data->province->province}} {{$data->kd_pos}}</p>
                </div>
            </div>
            @else
            <div class="col-lg-12">
                <div class="info-box mb-4">
                    <i class="fa fa-map"></i>
                    <h3>Alamat</h3>
                    <p class="text-black">-</p>
                </div>
            </div>
            @endif
            @if (!@empty($data->email))
            <div class="col-lg-4 col-md-6">
                <div class="info-box  mb-4">
                    <i class="fa fa-envelope"></i>
                    <h3>Email</h3>
                    <p class="text-black">{{$data->email}}</p>
                </div>
            </div>
            @else
            <div class="col-lg-4 col-md-6">
                <div class="info-box  mb-4">
                    <i class="fa fa-envelope"></i>
                    <h3>Email</h3>
                    <p class="text-black">-</p>
                </div>
            </div>
            @endif
            @if (!@empty($data->telp))
            <div class="col-lg-4 col-md-6">
                <div class="info-box  mb-4">
                    <i class="fa fa-phone"></i>
                    <h3>Telepon</h3>
                    <p class="text-black">{{$data->telp}}</p>
                </div>
            </div>
            @else
            <div class="col-lg-4 col-md-6">
                <div class="info-box  mb-4">
                    <i class="fa fa-phone"></i>
                    <h3>Telepon</h3>
                    <p class="text-black">-</p>
                </div>
            </div>
            @endif
            @if (!@empty($data->tube))
            <div class="col-lg-4 col-md-6">
                <div class="info-box  mb-4">
                    <i class="fa fa-youtube"></i>
                    <h3>Youtube</h3>
                    <p class="text-black">{{$data->tube}}</p>
                </div>
            </div>
            @else
            <div class="col-lg-4 col-md-6">
                <div class="info-box  mb-4">
                    <i class="fa fa-youtube"></i>
                    <h3>Youtube</h3>
                    <p class="text-black">-</p>
                </div>
            </div>
            @endif
            @if (!@empty($data->hp))
            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="fa fa-whatsapp"></i>
                    <h3>Whatsapp</h3>
                    <p class="text-black">{{$data->hp}}</p>
                </div>
            </div>
            @else
            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="fa fa-whatsapp"></i>
                    <h3>Whatsapp</h3>
                    <p class="text-black">-</p>
                </div>
            </div>
            @endif
            @if (!@empty($data->fb))
            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="fa fa-facebook"></i>
                    <h3>Facebook</h3>
                    <p class="text-black">{{$data->fb}}</p>
                </div>
            </div>
            @else
            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="fa fa-facebook"></i>
                    <h3>Facebook</h3>
                    <p class="text-black">-</p>
                </div>
            </div>
            @endif
            @if (!@empty($data->twitter))
            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="fa fa-twitter"></i>
                    <h3>Twitter</h3>
                    <p class="text-black">{{$data->twitter}}</p>
                </div>
            </div>
            @else
            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="fa fa-twitter"></i>
                    <h3>Twitter</h3>
                    <p class="text-black">-</p>
                </div>
            </div>
            @endif
            @if (!@empty($data->ig))
            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="fa fa-instagram"></i>
                    <h3>Instagram</h3>
                    <p class="text-black">{{$data->ig}}</p>
                </div>
            </div>
            @else
            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="fa fa-instagram"></i>
                    <h3>Instagram</h3>
                    <p class="text-black">-</p>
                </div>
            </div>
            @endif
        </div>

    </div>
</section>

@endsection