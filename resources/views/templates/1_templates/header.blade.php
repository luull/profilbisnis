<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('logo/emblem.png')}}" alt="">
        <span>{{session('konfigurasi')->app_name}}</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link {{ Request::is('/',session('data')->username) ? 'active' : '' }}" href="/{{ session('data')->username }}">Home</a></li>
          <li><a class="nav-link {{ Request::is('profil') ? 'active' : '' }}" href="/profil">Profil</a></li>
          <li><a class="nav-link {{ Request::is('bisnis') ? 'active' : '' }}" href="/bisnis">Bisnis</a></li>
          <li><a class="nav-link {{ Request::is('produk') ? 'active' : '' }}" href="/produk">Produk</a></li>
          <li class="dropdown"><a href="#"><span>Galeri</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a class="{{ Request::is('agenda') ? 'active' : '' }}" href="/agenda">Agenda</a></li>
                <li><a class="{{ Request::is('foto') ? 'active' : '' }}" href="/foto">Photo</a></li>
                <li><a class="{{ Request::is('video') ? 'active' : '' }}" href="/video">Video</a></li>
                <li><a href="#"></a></li>
            </ul>
        </li>
        <li><a class="nav-link {{ Request::is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a></li>
        <li><a class="nav-link scrollto" href="/{{ session('data')->username }}#join">Daftar</a></li>
          {{-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li> --}}
          <li><a class="getstarted" href="{{env('APP_URL')}}/kartunama/{{session('username')}}" rel="nofollow" target="_blank">Kartu Nama</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>