<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="/backend/dashboard">
        <!-- <img alt="image" src="{{ asset(session('logo')) }}" class="header-logo" />-->
        <span class="logo-name">MySuperBoss</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Main</li>
      <li class="dropdown active">
        <a href="/backend/dashboard" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>

      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-solar-panel"></i><span>Control Panel</span></a>
        <ul class="dropdown-menu">
          <li><a href="/backend/profile">Profil</a></li>
          <li><a href="/backend/ubah_password" class="nav-link">Ubah Password</a></li>
          @if(session('akses')<=2) <li><a href="/backend/admin">Daftar User Admin</a>
      </li>
      <li><a href="/backend/admin">Daftar Template</a>
        <ul>
          <li><a href="/backend/themes">Web</a></li>
          <li><a href="/backend/card">Kartu nama</a></li>
        </ul>
      </li>

      @endif
      <li><a href="/backend/photo-profile" class="nav-link">Upload Photo Profile</a></li>
      <li><a href="/backend/import" class="nav-link">Import Member</a></li>
      <li><a href="/backend/member" class="nav-link">Daftar Member</a></li>
      <li><a href="/backend/filemanager" class="nav-link">File Manager</a></li>
      <li><a href="/backend/welcome_note" class="nav-link">Welcome Note</a></li>
      <li><a href="/backend/wa-templates" class="nav-link">Whatasapp Template</a></li>
      <li><a href="/backend/bank" class="nav-link">Data Bank</a></li>
      <li><a href="/backend/kategori-pekerjaan" class="nav-link">Kategori Pekerjaan</a></li>
      <li><a href="/backend/sub-kategori-pekerjaan" class="nav-link">Sub Kategori Pekerjaan</a></li>
      <li><a href="/backend/konfigurasi" class="nav-link">Konfigurasi Website</a></li>
    </ul>
    </li>
    <li class="dropdown">
      <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Content Management</span></a>
      <ul class="dropdown-menu">
        <li><a href="/backend/bisnis" class="nav-link">Data Bisnis</a></li>
        <li><a href="/backend/produk" class="nav-link">Data Produk</a></li>
        <li><a href="/backend/display" class="nav-link">Produk Pilihan</a></li>
        <li><a href="/backend/photo" class="nav-link">Gallery Photo</a></li>
        <li><a href="/backend/video" class="nav-link">Gallery Video </a></li>
        <li><a href="/backend/testimoni" class="nav-link">Testimoni Produk </a></li>
        <li><a href="/backend/agenda" class="nav-link">Agenda Kegiatan</a></li>
      </ul>
    </li>

    <li class="dropdown ">
      <a href="{{ route('logout_backend') }}" class="nav-link"><i class="fas fa-lock"></i><span>Log Out</span></a>

    </li>
    </ul>
  </aside>
</div>