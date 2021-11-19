  <!-- Site footer -->
  <section class="site-footer">
      <div class="container">
          <div class="row">

              <div class="col-sm-12 col-md-6 wow fadeInLeft" data-aos="fade-left" data-aos-delay="100">
                  <h4>{{session('konfigurasi')->app_name}}</h4>
                  <p class="text-justify text-white">{{session('data')->tentang_web}}</p>
                  <div class="row">
                      <div class="col-md-3 col-lg-3 col-3 mb-3" style="padding-top: 40px;padding-bottom:40px;">
                          {!!session('qrcode')!!}
                      </div>
                  </div>
              </div>

              <div class="col-xs-6 col-md-3 wow fadeInUp" data-aos="fade-up" data-aos-delay="100">
                  <h6>Layanan</h6>
                  <ul class="footer-links">
                      <li><i class="fa fa-angle-right"></i> <a href="/profil"> Profil</a></li>
                      <li><i class="fa fa-angle-right"></i> <a href="/bisnis"> Bisnis</a></li>
                      <li><i class="fa fa-angle-right"></i> <a href="/produk"> Produk</a></li>
                      <li><i class="fa fa-angle-right"></i> <a href="/kartunama/{{session('username')}}"> Kartu Nama</a></li>
                  </ul>
              </div>

              <div class="col-xs-6 col-md-3 wow fadeInRight" data-aos="fade-right" data-aos-delay="100">
                  <h6>Kontak</h6>
                  <ul class="footer-links">
                      <li><a>Alamat : {{session('data')->city->city_name.' '.session('data')->city->type}} - {{session('data')->province->province}}</a></li>
                      <li><a href="tel:{{ session('data')->hp }}">No.Hp : {{ session('data')->hp }}</a></li>
                      <li><a href="mailto:{{ session('data')->email }}"> Email : {{ session('data')->email }}</a></li>
                      <li><a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ session('data')->wa_template->kontak }} {{session('konfigurasi')->app_name}}" target="blank" href="#"> Whatsapp : {{ session('data')->wa }}</a></li>
                  </ul>
              </div>

          </div>
          <hr>
          <div class="row">

              <div class="col-md-8 col-sm-6 col-xs-12 wow fadeIn">
                  <p class="copyright-text text-white">&copy; {{session('konfigurasi')->copyright}}
                      Powered by <a href="{{session('konfigurasi')->app_url}}" class="text-light">{{session('konfigurasi')->poweredby}}</a>
                  </p>
              </div>


              <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                  <ul class="social-icons">
                      <li><a class="facebook" href="http://facebook.com/{{ session('data')->fb }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                      <li><a class="twitter" href="http://twitter.com/{{ session('data')->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                      <li><a class="youtube" href="https://www.youtube.com/channel/{{ session('data')->tube }}/featured" target="_blank"><i class="fa fa-youtube"></i></a></li>
                      <li><a class="instagram" href="http://instagram.com/{{ session('data')->ig }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                  </ul>
              </div>
          </div>
      </div>
  </section>