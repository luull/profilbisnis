<?php
$name = session('data')->username
?>
<div class="d-flex flex-row justify-content-end kd-on">
    <ul class="head-icon">
        <li><a href="http://facebook.com/{{ session('data')->fb }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
        <li><a href="http://twitter.com/{{ session('data')->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
        <li><a href="http://instagram.com/{{ session('data')->ig }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
        <li><a href="https://www.youtube.com/channel/{{ session('data')->tube }}/featured" target="_blank"><i class="fa fa-youtube"></i></a></li>
    </ul>
</div>


<nav class="navbar navbar-expand-md navbar-light sticky-top">
    <div class="container">
        <a href="/{{ session('data')->username }}" class="logo"><img src="{{ asset('images/company-logo/logo-default.png')}}" alt="Logo Img" class="img-fluid"></a>
        <div class="navbar-toggler-right">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse flex-column " id="navbar">

            <ul class="navbar-nav  w-100 justify-content-end px-3">

                <li class="nav-item {{ Request::is('/',$name) ? 'active' : '' }}"><a class="nav-link" href="/{{ $name }}">Home</a></li>
                <li class="nav-item {{ Request::is('profil') ? 'active' : '' }}"><a class="nav-link" href="/profil">Profil</a></li>
                <li class="nav-item {{ Request::is('bisnis') ? 'active' : '' }}"><a class="nav-link" href="/bisnis">Bisnis</a></li>
                <li class="nav-item {{ Request::is('produk') ? 'active' : '' }}"><a class="nav-link" href="/produk">Produk</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Galery
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item {{ Request::is('/agenda') ? 'active' : '' }}" href="{{ asset('/agenda')}}">Agenda</a>
                        <a class="dropdown-item {{ Request::is('/foto') ? 'active' : '' }}" href="{{ asset('/foto')}}">Photo</a>
                        <a class="dropdown-item {{ Request::is('/video') ? 'active' : '' }}" href="{{ asset('/video')}}">Video</a>
                    </div>
                </li>

                <li class="nav-item"><a class="nav-link {{ Request::is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a></li>
                <li class="nav-item"><a class="nav-link scroll" href="#join" onclick="reloadPage();">Daftar</a></li>
                <li class="nav-item"><a class="nav-link getstarted" data-scroll-nav="0" href="{{env('APP_URL')}}/kartunama/{{session('username')}}" rel="nofollow" target="_blank">Kartu Nama</a></li>


            </ul>




        </div>
    </div>

</nav>
<script>
    var check = function() {
        return $(window).width() <= 800
    }

    function reloadPage() {
        if (check()) {
            location.reload(true);
        }
    }
</script>