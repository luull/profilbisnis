<?php
$name = session('data')->username
?>
<header class="cursor-light">

    <!--Navigation-->
    <nav class="navbar navbar-top-default nav-radius navbar-expand-lg pb-0">
        <div class="container">
            <a href="/{{ session('data')->username }}" title="Logo" class="logo">
                <!--Logo Default-->
                <img src="{{ asset('images/company-logo/logo-default.png')}}" alt="logo" class="logo-dark logo-default">
                <img src="{{ asset('images/company-logo/logo-default.png')}}" alt="logo" class="logo-light logo-scrolled">
            </a>

            <!--Nav Links-->
            <div class="collapse navbar-collapse">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link {{ Request::is('/',$name) ? 'active' : '' }}" href="/{{ $name }}">Home</a>
                    <a class="nav-link {{ Request::is('profil') ? 'active' : '' }}" href="/profil">Profil</a>
                    <a class="nav-link {{ Request::is('bisnis') ? 'active' : '' }}" href="/bisnis">Bisnis</a>
                    <a class="nav-link {{ Request::is('produk') ? 'active' : '' }}" href="/produk">Produk</a>
                    <a class="nav-link {{ Request::is('/agenda') ? 'active' : '' }}" href="{{ asset('/agenda')}}">Agenda</a>
                    <a class="nav-link {{ Request::is('/foto') ? 'active' : '' }}" href="{{ asset('/foto')}}">Foto</a>
                    <a class="nav-link {{ Request::is('/video') ? 'active' : '' }}" href="{{ asset('/video')}}">Video</a>
                    <a class="nav-link {{ Request::is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a>
                    <a class="nav-link scroll" href="#join">Daftar</a>
                </div>
                <a href="{{env('APP_URL')}}/kartunama/{{session('username')}}" rel="nofollow" target="_blank" class="btn btn-green btn btn-small btn-rounded ml-3 mr-4">Kartu Nama</a>

            </div>
            <!--Side Menu Button-->
            <a href="javascript:void(0)" class="parallax-btn sidemenu_btn" id="sidemenu_toggle">
                <div class="animated-wrap sidemenu_btn_inner">
                    <div class="animated-element">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </a>
        </div>
    </nav>

    <!--Side Nav-->
    <div class="side-menu hidden">
        <div class="inner-wrapper">
            <span class="btn-close link" id="btn_sideNavClose"></span>
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
                        <a class="nav-link scroll" href="#join">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{env('APP_URL')}}/kartunama/{{session('username')}}" rel="nofollow" target="_blank" class="btn btn-green btn btn-medium btn-rounded mt-2 mb-3">Kartu Nama</a>
                    </li>
                </ul>
            </nav>

            <div class="side-footer w-100">
                <ul class="social-icons-simple">
                    <li><a href="http://facebook.com/{{ session('data')->fb }}" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a> </li>
                    <li><a href="http://twitter.com/{{ session('data')->twitter }}" target="_blank" class="social-icon"><i class="fab fa-twitter"></i> </a> </li>
                    <li><a href="https://www.youtube.com/channel/{{ session('data')->tube }}/featured" target="_blank" class="social-icon"><i class="fab fa-youtube"></i> </a> </li>
                    <li><a href="http://instagram.com/{{ session('data')->ig }}" target="_blank" class="social-icon"><i class="fab fa-instagram"></i> </a> </li>
                </ul>

            </div>
        </div>
    </div>
    <a id="close_side_menu" href="javascript:void(0);"></a>
    <!-- End side menu -->
</header>