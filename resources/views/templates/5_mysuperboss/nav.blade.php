<?php
$name = session('data')->username
?>

<header class="navigation-bar">
    <nav class="navbar navbar-expand-lg fixed-top navbar-fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/{{ session('data')->username }}">
                <img src="{{ asset('images/company-logo/logo-default.png')}}">
            </a>
            <!--Nav Links-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                        <a class="nav-link" href="/{{ session('data')->username }}">Daftar</a>
                    </li>
                    <li class="nav-item nav-btn">
                        <a class="btn button btn-rounded pink-btn btn-hvr-black" href="{{env('APP_URL')}}/kartunama/{{session('username')}}" rel="nofollow" target="_blank">KARTU NAMA</a>
                    </li>
                </ul>
            </div>
        </div>
        <!--Side Menu Button-->
        <a href="javascript:void(0)" class="sidemenu_btn link" id="sidemenu_toggle">
            <span></span>
            <span></span>
            <span></span>
        </a>
    </nav>

    <!-- Side Menu -->
    <div class="side-menu hidden side-menu-opacity">
        <div class="inner-wrapper">
            <span id="btn_sideNavClose">
                <i class="las la-times btn-close"></i>
            </span>
            <div class="container">
                <div class="row  side-menu-inner-content">
                    <div class="col-12 d-flex justify-content-center align-items-center text-center">
                        <a class="logo-image" href="/{{ session('data')->username }}">
                            <img src="{{ asset('images/company-logo/logo-default.png')}}" alt="logo"></a>
                    </div>
                    <div class="col-12 col-lg-8 text-center text-lg-left">
                        <nav class="side-nav w-100">
                            <ul class="navbar-nav">
                                <li class="nav-item {{ Request::is('/',$name) ? 'active' : '' }}">
                                    <a class="nav-link" href="/{{ $name }}">Home</a>
                                </li>
                                <li class="nav-item {{ Request::is('profil') ? 'active' : '' }}">
                                    <a class="nav-link " href="/profil">Profil</a>
                                </li>
                                <li class="nav-item {{ Request::is('bisnis') ? 'active' : '' }}">
                                    <a class="nav-link " href="/bisnis">Bisnis</a>
                                </li>
                                <li class="nav-item {{ Request::is('produk') ? 'active' : '' }}">
                                    <a class="nav-link " href="/produk">Produk</a>
                                </li>
                                <li class="nav-item {{ Request::is('/agenda') ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ asset('/agenda')}}">Agenda</a>
                                </li>
                                <li class="nav-item {{ Request::is('/foto') ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ asset('/foto')}}">Foto</a>
                                </li>
                                <li class="nav-item {{ Request::is('/video') ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ asset('/video')}}">Video</a>
                                </li>
                                <li class="nav-item {{ Request::is('kontak') ? 'active' : '' }}">
                                    <a class="nav-link " href="/kontak">Kontak</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="/{{ session('data')->username }}">Daftar</a>
                                </li>
                                <li class=" nav-item nav-btn mt-3">
                                    <a class="btn button btn-rounded pink-btn btn-hvr-black" href="{{env('APP_URL')}}/kartunama/{{session('username')}}" rel="nofollow" target="_blank">KARTU NAMA</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-12 col-lg-4 d-flex align-items-center text-center text-lg-left">
                        <div class="side-footer text-white w-100">
                            <ul class="social-icons-simple">
                                <li><a class="icon-hovr" href="http://facebook.com/{{ session('data')->fb }}" target="_blank"><i class="fab fa-facebook-f"></i></a> </li>
                                <li><a class="icon-hovr" href="http://twitter.com/{{ session('data')->twitter }}" target="_blank"><i class="fab fa-twitter"></i> </a> </li>
                                <li><a class="icon-hovr" href="https://www.youtube.com/channel/{{ session('data')->tube }}/featured" target="_blank"><i class="fab fa-youtube"></i> </a> </li>
                                <li><a class="icon-hovr" href="http://instagram.com/{{ session('data')->ig }}" target="_blank"><i class="fab fa-instagram"></i> </a> </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a id="close_side_menu" href="javascript:void(0);"></a>
</header>