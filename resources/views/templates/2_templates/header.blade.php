<header id="header" class="header fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">

    <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
        <img src="{{ asset('logo/emblem.png')}}" style="height: 50px" alt="">
        <h1>{{session('konfigurasi')->app_name}}<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="{{ Request::is('/',session('data')->username) ? 'active' : '' }}" href="/{{ session('data')->username }}">Home</a></li>
          <li><a class="{{ Request::is('profil') ? 'active' : '' }}" href="/profil">Profil</a></li>
          <li><a class="{{ Request::is('bisnis') ? 'active' : '' }}" href="/bisnis">Bisnis</a></li>
          <li><a class="{{ Request::is('produk') ? 'active' : '' }}" href="/produk">Produk</a></li>
          <li class="dropdown"><a href="#"><span>Galeri</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
                <li><a class="{{ Request::is('agenda') ? 'active' : '' }}" href="/agenda">Agenda</a></li>
                <li><a class="{{ Request::is('foto') ? 'active' : '' }}" href="/foto">Photo</a></li>
                <li><a class="{{ Request::is('video') ? 'active' : '' }}" href="/video">Video</a></li>
                <li><a href="#"></a></li>
            </ul>
        </li>
        <li><a class="{{ Request::is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a></li>
        <li><a href="/{{ session('data')->username }}#join">Daftar</a></li>

        </ul>
      </nav><!-- .navbar -->
      <a class="btn-book-a-table"  href="{{env('APP_URL')}}/kartunama/{{session('username')}}" rel="nofollow" target="_blank">Kartu Nama</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header>