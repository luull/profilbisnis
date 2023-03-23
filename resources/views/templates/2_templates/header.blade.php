<div id="topbar" class="d-flex align-items-center fixed-top">
  <div class="container d-flex justify-content-center justify-content-md-between">

    <div class="contact-info d-flex align-items-center">
      <i class="bi bi-whatsapp d-flex align-items-center"><span>{{session('data')->wa}}</span></i>
      <i class="bi bi-envelope d-flex align-items-center ms-4"><span> {{session('data')->email}}</span></i>
    </div>

    {{-- <div class="languages d-none d-md-flex align-items-center">
      <ul>
        <li>En</li>
        <li><a href="#">De</a></li>
      </ul>
    </div> --}}
  </div>
</div>


<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

    {{-- <a href="index.html" class="logo d-flex align-items-center">
      <img src="{{ asset('logo/emblem.png')}}" alt="">
      <span>{{session('konfigurasi')->app_name}}</span>
    </a> --}}
    <h1 class="logo me-auto me-lg-0"><a href="index.html"> <img src="{{ asset('logo/emblem2.png')}}" style="height: 100px;" alt=""> {{session('konfigurasi')->app_name}}</a></h1>

    <nav id="navbar" class="navbar order-last order-lg-0">
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
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
    <a href="{{env('APP_URL')}}/kartunama/{{session('username')}}" rel="nofollow" target="_blank" class="book-a-table-btn scrollto d-none d-lg-flex">Kartu Nama</a>

  </div>
</header>