<div class="overlay"></div>
<div class="search-overlay"></div>
<div class="sidebar-wrapper sidebar-theme">

  <nav id="compactSidebar">
    <ul class="navbar-nav theme-brand flex-row">
      <li class="nav-item theme-logo">
        <a href="/dashboard">
          <img src="{{ asset('images/emblem.png')}}" class="navbar-logo" alt="logo">
        </a>
      </li>
    </ul>
    <ul class="menu-categories">
      <li class="menu menu-single {{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="/dashboard" data-active="{{ Request::is('dashboard') ? 'true' : 'false' }}" class="menu-toggle">
          <div class="base-menu">
            <div class="base-icons">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
            </div>
            <span>Dashboard</span>
          </div>
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
          <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
      </li>
      <li class="menu menu-single {{ Request::is('admin/themes') ? 'active' : '' }}">
        <a href="/admin/themes" data-active="{{ Request::is('admin/themes') ? 'true' : 'false' }}" class="menu-toggle">
          <div class="base-menu">
            <div class="base-icons">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="3" y1="9" x2="21" y2="9"></line>
                <line x1="9" y1="21" x2="9" y2="9"></line>
              </svg>
            </div>
            <span>Themes <br> Profile</span>
          </div>
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
          <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
      </li>
      <li class="menu menu-single {{ Request::is('/admin/bank_content') ? 'active' : '' }}">
        <a href="/admin/bank_content" data-active="{{ Request::is('/admin/bank_content') ? 'true' : 'false' }}" class="menu-toggle">
          <div class="base-menu">
            <div class="base-icons">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="3" y1="9" x2="21" y2="9"></line>
                <line x1="9" y1="21" x2="9" y2="9"></line>
              </svg>
            </div>
            <span>Bank <br> Content</span>
          </div>
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
          <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
      </li>
      <li class="menu menu-single {{ Request::is('admin/token') ? 'active' : '' }}">
        <a href="/admin/token" data-active="{{ Request::is('admin/token') ? 'true' : 'false' }}" class="menu-toggle">
          <div class="base-menu">
            <div class="base-icons">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                <line x1="1" y1="10" x2="23" y2="10"></line>
              </svg>
            </div>
            <span>Beli <br> Token</span>
          </div>
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
          <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
      </li>
      <li class="menu {{ Request::is('admin/profile','admin/photo-profile','admin/filemanager','admin/filemanager','admin/wa-templates','admin/welcome_note','admin/bank','admin/banner') ? 'active' : '' }}">
        <a href="#control" data-active="{{ Request::is('admin/profile','admin/photo-profile','admin/filemanager','admin/filemanager','admin/wa-templates','admin/welcome_note','admin/bank','admin/banner') ? 'true' : 'false' }}" class="menu-toggle">
          <div class="base-menu">
            <div class="base-icons">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu">
                <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                <rect x="9" y="9" width="6" height="6"></rect>
                <line x1="9" y1="1" x2="9" y2="4"></line>
                <line x1="15" y1="1" x2="15" y2="4"></line>
                <line x1="9" y1="20" x2="9" y2="23"></line>
                <line x1="15" y1="20" x2="15" y2="23"></line>
                <line x1="20" y1="9" x2="23" y2="9"></line>
                <line x1="20" y1="14" x2="23" y2="14"></line>
                <line x1="1" y1="9" x2="4" y2="9"></line>
                <line x1="1" y1="14" x2="4" y2="14"></line>
              </svg>
            </div>
            <span>Control <br> Panel</span>
          </div>
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
          <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
      </li>
      @if (session('level')==1)
      <li class="menu {{ Request::is('admin/bisnis','admin/produk','admin/photo','admin/video','admin/testimoni','admin/agenda','admin/landing-page') ? 'active' : '' }}">
        <a href="#special" data-active="{{ Request::is('admin/bisnis','admin/produk','admin/photo','admin/video','admin/testimoni','admin/agenda','admin/landing-page') ? 'true' : 'false' }}" class="menu-toggle">
          <div class="base-menu">
            <div class="base-icons">

              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay">
                <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                <polygon points="12 15 17 21 7 21 12 15"></polygon>
              </svg>
            </div>
            <span>Special <br> Features</span>
          </div>
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
          <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
      </li>

      @endif
      @if (session('level')==0)
      <li class="menu {{ Request::is('admin/agenda','admin/photo','admin/video') ? 'active' : '' }}">
        <a href="#member" data-active="{{ Request::is('admin/agenda','admin/photo','admin/video') ? 'true' : 'false' }}" class="menu-toggle">
          <div class="base-menu">
            <div class="base-icons">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay">
                <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                <polygon points="12 15 17 21 7 21 12 15"></polygon>
              </svg>
            </div>
            <span>Member <br> Features</span>
          </div>
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
          <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
      </li>
      @endif
    </ul>
  </nav>

  <div id="compact_submenuSidebar" class="submenu-sidebar">

    <div class="submenu" id="control">
      <ul class="submenu-list" data-parent-element="#control">
        <li class="{{ Request::is('admin/profile') ? 'active' : '' }}"><a href="/admin/profile">Profil</a></li>
        <li class="{{ Request::is('admin/photo-profile') ? 'active' : '' }}"><a href="/admin/photo-profile">Upload Photo Profile</a></li>
        @if (session('level')==1)
        <li class="{{ Request::is('admin/filemanager') ? 'active' : '' }}"><a href="/admin/filemanager">File Manager</a></li>
        <li class="{{ Request::is('admin/wa-templates') ? 'active' : '' }}"><a href="/admin/wa-templates">Whatsapp Template</a></li>
        @endif
        <li class="{{ Request::is('admin/welcome_note') ? 'active' : '' }}"><a href="/admin/welcome_note">Welcome Note</a></li>
        <li class="{{ Request::is('admin/bank') ? 'active' : '' }}"><a href="/admin/bank">Data Bank</a></li>
        <li class="{{ Request::is('admin/banner') ? 'active' : '' }}"><a href="/admin/banner">Data Banner</a></li>
      </ul>
    </div>
    <div class="submenu" id="special">
      <ul class="submenu-list" data-parent-element="#special">
        <li class="{{ Request::is('admin/bisnis') ? 'active' : '' }}"><a href="/admin/bisnis">Data Bisnis</a></li>
        <li class="{{ Request::is('admin/produk') ? 'active' : '' }}"><a href="/admin/produk">Data Produk</a></li>
        <li class="{{ Request::is('admin/photo') ? 'active' : '' }}"><a href="/admin/photo">Gallery Photo</a></li>
        <li class="{{ Request::is('admin/video') ? 'active' : '' }}"><a href="/admin/video">Gallery Video </a></li>
        <li class="{{ Request::is('admin/testimoni') ? 'active' : '' }}"><a href="/admin/testimoni">Testimoni Produk </a></li>
        <li class="{{ Request::is('admin/agenda') ? 'active' : '' }}"><a href="/admin/agenda">Agenda Kegiatan</a></li>
        <li class="{{ Request::is('admin/landing-page') ? 'active' : '' }}"><a href="/admin/landing-page">Landing Page</a></li>
      </ul>
    </div>
    <div class="submenu" id="member">
      <ul class="submenu-list" data-parent-element="#member">
        <li class="{{ Request::is('admin/photo') ? 'active' : '' }}"><a href="/admin/photo">Gallery Photo</a></li>
        <li class="{{ Request::is('admin/video') ? 'active' : '' }}"><a href="/admin/video">Gallery Video </a></li>
        <li class="{{ Request::is('admin/agenda') ? 'active' : '' }}"><a href="/admin/agenda">Agenda Kegiatan</a></li>
      </ul>
    </div>

  </div>

</div>