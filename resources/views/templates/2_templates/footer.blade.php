<footer id="footer" class="footer">


    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="{{ asset('logo/emblem.png')}}" alt="">
              <span> {{session('konfigurasi')->app_name}}</span>
            </a>
            <p>{{session('data')->tentang_web}}</p>
            <br>
            {!!session('qrcode')!!}
            <br>
            <br>
            <div class="social-links mt-3">
              <a href="http://twitter.com/{{ session('data')->twitter }}" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="http://facebook.com/{{ session('data')->fb }}" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="http://instagram.com/{{ session('data')->ig }}" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="https://www.youtube.com/channel/{{ session('data')->tube }}/featured" target="_blank" class="youtube"><i class="bi bi-youtube"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6 footer-links">
            <h4>Layanan</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="/profil"> Profil</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/bisnis"> Bisnis</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/produk"> Produk</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/kontak"> Kontak</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/kartunama/{{session('username')}}"> Kartu Nama</a></li>
            </ul>
          </div>

  
          <div class="col-lg-4 col-md-12 footer-contact text-center text-md-start">
            <h4>Kontak Kami</h4>
            <p>
              {{session('data')->city->city_name.' '.session('data')->city->type}} - {{session('data')->province->province}} <br><br>
              <strong>Phone:</strong> {{ session('data')->hp }}<br>
              <strong>Email:</strong> {{ session('data')->email }}<br>
              <strong>Whatsapp:</strong> {{ session('data')->wa }}<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span> {{session('konfigurasi')->copyright}}</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
   
        Powered by <a href=" {{session('konfigurasi')->url}}">{{session('konfigurasi')->poweredby}}</a>
      </div>
    </div>
  </footer>