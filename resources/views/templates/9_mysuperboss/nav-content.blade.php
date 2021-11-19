<?php
$name = session('data')->username
?>
<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-lg-between">

        <!-- <h1 class="logo me-auto me-lg-0"><a href="index.html">Gp<span>.</span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="/{{ $name }}" class="logo me-auto me-lg-0"><img src="{{ asset('images/company-logo/logo-default.png')}}" alt="Logo Img" class="img-fluid"></a>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link {{ Request::is('/',$name) ? 'active' : '' }}" href="/{{ $name }}">Home</a></li>
                <li><a class="nav-link {{ Request::is('profil') ? 'active' : '' }}" href="/profil">Profil</a></li>
                <li><a class="nav-link {{ Request::is('bisnis') ? 'active' : '' }}" href="/bisnis">Bisnis</a></li>
                <li><a class="nav-link {{ Request::is('produk') ? 'active' : '' }}" href="/produk">Produk</a></li>
                <li class="dropdown"><a href="#"><span>Galeri</span> <i class="fa fa-chevron-down"></i></a>
                    <ul>
                        <li><a class="nav-link {{ Request::is('/agenda') ? 'active' : '' }}" href="{{ asset('/agenda')}}">Agenda</a></li>
                        <li><a class="nav-link {{ Request::is('/foto') ? 'active' : '' }}" href="{{ asset('/foto')}}">Photo</a></li>
                        <li><a class="nav-link {{ Request::is('/video') ? 'active' : '' }}" href="{{ asset('/video')}}">Video</a></li>
                    </ul>
                </li>
                <li><a class="nav-link {{ Request::is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a></li>
                <li><a class="nav-link" href="/{{ $name }}#join">Daftar</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a href="{{env('APP_URL')}}/kartunama/{{ $name }}" target="_blank" class="get-started-btn">Kartu Nama</a>

    </div>
</header><!-- End Header -->