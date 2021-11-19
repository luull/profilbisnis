<?php
$name = session('data')->username
?>
<header id="home">
    <div class="upper-nav">
        <div class="container">
            <div class="row justify-content-end">

                <div class="col-12 col-lg-6 mt-auto mb-auto">
                    <ul class="top-detail d-block d-lg-flex justify-content-center justify-content-lg-end">

                        <li class="social-links">
                            <span class="fb"><a class="fb" href="http://facebook.com/{{ session('data')->fb }}" target="_blank" class="social-icon"><i class="la la-facebook-f"></i></a> </span>
                            <span class="twit"><a class="twit" href="http://twitter.com/{{ session('data')->twitter }}" target="_blank" class="social-icon"><i class="la la-twitter"></i> </a> </span>
                            <span class="insta"><a class="insta" href="https://www.youtube.com/channel/{{ session('data')->tube }}/featured" target="_blank" class="social-icon"><i class="la la-youtube"></i> </a> </span>
                            <span class="insta"><a class="insta" href="http://instagram.com/{{ session('data')->ig }}" target="_blank" class="social-icon"><i class="la la-instagram"></i> </a> </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Navigation-->
    <nav class="navbar navbar-top-default navbar-expand-lg navbar-simple nav-line">
        <div class="container">
            <div class="row no-gutters w-100">
                <div class="col-2">
                    <a href="/{{ $name }}" title="Logo" class="logo">
                        <!--Logo Default-->
                        <img src="{{ asset('images/company-logo/logo-default.png')}}" alt="logo" class="logo-dark">
                    </a>
                </div>
                <!--Nav Links-->
                <div class="col-8">
                    <div class="collapse navbar-collapse" id="megaone">
                        <div class="navbar-nav ml-auto">
                            <a class="nav-link {{ Request::is('/',$name) ? 'active' : '' }}" href="/{{ $name }}">Home</a>
                            <a class="nav-link {{ Request::is('profil') ? 'active' : '' }}" href="/profil">Profil</a>
                            <a class="nav-link {{ Request::is('bisnis') ? 'active' : '' }}" href="/bisnis">Bisnis</a>
                            <a class="nav-link {{ Request::is('produk') ? 'active' : '' }}" href="/produk">Produk</a>
                            <a class="nav-link {{ Request::is('/agenda') ? 'active' : '' }}" href="{{ asset('/agenda')}}">Agenda</a>
                            <a class="nav-link {{ Request::is('/foto') ? 'active' : '' }}" href="{{ asset('/foto')}}">Foto</a>
                            <a class="nav-link {{ Request::is('/video') ? 'active' : '' }}" href="{{ asset('/video')}}">Video</a>
                            <a class="nav-link {{ Request::is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a>
                            <a class="nav-link" href="/{{ $name }}#join">Daftar</a>
                            <a class="ml-4 mt-1 btn-card {{ Request::is('kontak') ? 'active' : '' }}" href="{{env('APP_URL')}}/kartunama/{{ $name }}" rel="nofollow" target="_blank">Kartu Nama</a>
                        </div>
                    </div>
                </div>
                <!--Side Menu Button-->
                <div class="col-2">
                    <a href="javascript:void(0)" class="sidemenu_btn" id="sidemenu_toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

</header>

<!--Side Nav-->
<div class="side-menu hidden">
    <div class="inner-wrapper">
        <span class="btn-close" id="btn_sideNavClose"><i></i><i></i></span>
        <nav class="side-nav w-100">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/',$name) ? 'active' : '' }}" href="/{{ $name }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('profil') ? 'active' : '' }}" href="/profil">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('bisnis') ? 'active' : '' }}" href="/bisnis">Bisnis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('produk') ? 'active' : '' }}" href="/produk">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/agenda') ? 'active' : '' }}" href="{{ asset('/agenda')}}">Agenda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/foto') ? 'active' : '' }}" href="{{ asset('/foto')}}">Foto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/video') ? 'active' : '' }}" href="{{ asset('/video')}}">Video</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/{{ $name }}#join">Daftar</a>
                </li>
                <hr>
                <a href="{{env('APP_URL')}}/kartunama/{{ $name }}" rel="nofollow" target="_blank" class="btn-card pb-0">Kartu Nama</a>
            </ul>
        </nav>
        <div class="side-footer text-white w-100">
            <ul class="social-icons-simple">
                <li><a class="facebook-text-hvr" href="http://facebook.com/{{ session('data')->fb }}" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a> </li>
                <li><a class="twitter-text-hvr" href="http://twitter.com/{{ session('data')->twitter }}" target="_blank" class="social-icon"><i class="fab fa-twitter"></i> </a> </li>
                <li><a class="instagram-text-hvr" href="https://www.youtube.com/channel/{{ session('data')->tube }}/featured" target="_blank" class="social-icon"><i class="fab fa-youtube"></i> </a> </li>
                <li><a class="instagram-text-hvr" href="http://instagram.com/{{ session('data')->ig }}" target="_blank" class="social-icon"><i class="fab fa-instagram"></i> </a> </li>
            </ul>

        </div>
    </div>
</div>
<a id="close_side_menu" href="javascript:void(0);"></a>