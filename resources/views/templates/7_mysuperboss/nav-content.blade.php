<?php
$name = session('data')->username
?>
<header>
    <!--Navigation-->
    <nav class="navbar navbar-top-default navbar-expand-lg navbar-simple nav-line">
        <div class="container">
            <a href="/{{ $name }}" title="Logo" class="logo">
                <!--Logo Default-->
                <img src="{{ asset('images/company-logo/logo-default.png')}}" title="logo" alt="logo" class="logo-default">
            </a>

            <!--Nav Links-->
            <div class="collapse navbar-collapse" id="megaone">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link line {{ Request::is('/',$name) ? 'active' : '' }}" href="/{{ $name }}">Home</a>
                    <a class="nav-link line {{ Request::is('profil') ? 'active' : '' }}" href="/profil">Profil</a>
                    <a class="nav-link line {{ Request::is('bisnis') ? 'active' : '' }}" href="/bisnis">Bisnis</a>
                    <a class="nav-link line {{ Request::is('produk') ? 'active' : '' }}" href="/produk">Produk</a>
                    <a class="nav-link line {{ Request::is('/agenda') ? 'active' : '' }}" href="{{ asset('/agenda')}}">Agenda</a>
                    <a class="nav-link line {{ Request::is('/foto') ? 'active' : '' }}" href="{{ asset('/foto')}}">Foto</a>
                    <a class="nav-link line {{ Request::is('/video') ? 'active' : '' }}" href="{{ asset('/video')}}">Video</a>
                    <a class="nav-link line {{ Request::is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a>
                    <a class="nav-link" href="/{{ $name }}#join">Daftar</a>
                    <a href="{{env('APP_URL')}}/kartunama/{{ $name }}" rel="nofollow" target="_blank" class="btn btn-medium btn-rounded btn-primary ml-4">Kartu Nama</a>
                </div>
            </div>
        </div>

        <!--Side Menu Button-->
        <div class="navigation-toggle">
            <ul class="slider-social toggle-btn my-0">
                <li>
                    <a href="javascript:void(0);" class="sidemenu_btn" id="sidemenu_toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!--Side Nav-->
    <div class="side-menu hidden">
        <div class="inner-wrapper">
            <span class="btn-close" id="btn_sideNavClose"><i></i><i></i></span>
            <a href="/{{ session('data')->username }}" title="Logo" class="logo side-logo">
                <!--Logo Default-->
                <img src="{{ asset('images/company-logo/logo-default.png')}}" alt="logo">
            </a>
            <nav class="side-nav w-100">
                <ul class="navbar-nav side-navbar">
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
                    <li class="nav-item">
                        <a href="{{env('APP_URL')}}/kartunama/{{ $name }}" rel="nofollow" target="_blank" class="btn btn-medium btn-rounded btn-primary">Kartu Nama</a>
                    </li>
                </ul>
            </nav>
            <div class="side-footer w-100">
                <ul class="social-icons-simple">
                    <li><a class="social-icon" href="http://facebook.com/{{ session('data')->fb }}" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a> </li>
                    <li><a class="social-icon" href="http://twitter.com/{{ session('data')->twitter }}" target="_blank" class="social-icon"><i class="fab fa-twitter"></i> </a> </li>
                    <li><a class="social-icon" href="https://www.youtube.com/channel/{{ session('data')->tube }}/featured" target="_blank" class="social-icon"><i class="fab fa-youtube"></i> </a> </li>
                    <li><a class="social-icon" href="http://instagram.com/{{ session('data')->ig }}" target="_blank" class="social-icon"><i class="fab fa-instagram"></i> </a> </li>
                </ul>

            </div>
        </div>
    </div>
    <a id="close_side_menu" href="javascript:void(0);"></a>
</header>