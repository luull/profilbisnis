<?php
$name = session('data')->username
?>
<header>
    <nav id="my-nav1" class="navbar navbar-expand-lg navbar-light rounded-bar transparent-bar">

        <div class="logo small-screen">
            <a href="/{{ $name }}"><img src="{{ asset('images/company-logo/logo-default.png')}}" alt="Logo Img" class="logos-little"></a>
        </div>

        <div class="container bg-trans-color">
            <div class="row no-gutters w-100">
                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                    <div class="collapse navbar-collapse">
                        <div class="col-3 col-md-2 col-lg-3 text-left p-0">
                            <div class="logo">
                                <a href="/{{ $name }}"><img src="{{ asset('images/company-logo/logo-default.png')}}" alt="Logo Img" class="logos"></a>
                            </div>
                        </div>
                        <div class="col-9 p-0">
                            <ul id="primary" class="navbar-nav text-center">

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

                                <!-- <li class="nav-item"><a href="#"><span>Galeri</span> <i class="fa fa-chevron-down"></i></a>
                                    <ul>
                                        <li><a class="nav-link {{ Request::is('/agenda') ? 'active' : '' }}" href="{{ asset('/agenda')}}">Agenda</a></li>
                                        <li><a class="nav-link {{ Request::is('/foto') ? 'active' : '' }}" href="{{ asset('/foto')}}">Foto</a></li>
                                        <li><a class="nav-link {{ Request::is('/video') ? 'active' : '' }}" href="{{ asset('/video')}}">Video</a></li>
                                    </ul>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/{{ session('data')->username }}#join">Daftar</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{env('APP_URL')}}/kartunama/{{session('username')}}" rel="nofollow" target="_blank" class="btn btn-slider pink-btn rounded-pill">Kartu Nama</a>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <a href="javascript:void(0)" class="sidemenu_btn" id="sidemenu_toggle">
            <span></span>
            <span></span>
            <span></span>
        </a>
    </nav>

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
                        <a class="nav-link" href="/{{ session('data')->username }}#join">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{env('APP_URL')}}/kartunama/{{ $name }}" rel="nofollow" target="_blank" class="btn btn-slider pink-btn rounded-pill">Kartu Nama</a>
                    </li>
                </ul>
            </nav>

            <!-- <div class="side-footer w-100">
                <div class="banner-icons">
                    <a href="#"><i class="lab la-facebook-f icons"></i></a>
                    <a href="#"><i class="lab la-twitter icons"></i></a>
                    <a href="#"><i class="lab la-instagram icons"></i></a>
                </div>
                <p>&copy; 2020 MegaOne. Made With Love by Themesindustry.</p>
            </div> -->
        </div>
    </div>
    <a id="close_side_menu" href="javascript:void(0);"></a>
    <!-- End side menu -->
</header>