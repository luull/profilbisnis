<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-5 col-md-6">
                    <div class="footer-info">
                        <h3>{{session('konfigurasi')->app_name}}</h3>
                        <p>
                            {{session('data')->tentang_web}}
                        </p>
                        <div class="social-links mt-3">
                            <a href="http://twitter.com/{{ session('data')->twitter }}" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="http://facebook.com/{{ session('data')->fb }}" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="http://instagram.com/{{ session('data')->ig }}" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
                            <a href="https://www.youtube.com/channel/{{ session('data')->tube }}/featured" target="_blank" class="youtube"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Layanan</h4>
                    <ul>
                        <li><i class="fa fa-angle-right"></i> <a href="/profil"> Profil</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href="/bisnis"> Bisnis</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href="/produk"> Produk</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href="/kartunama/{{session('username')}}"> Kartu Nama</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Kontak</h4>
                    <ul>
                        <li><a>{{session('data')->city->city_name.' '.session('data')->city->type}} - {{session('data')->province->province}}
                            </a></li>
                        <li><a href="tel:{{ session('data')->hp }}">No.Hp : {{ session('data')->hp }}</a></li>
                        <li><a href="mailto:{{ session('data')->email }}"> Email : {{ session('data')->email }}</a></li>
                        <li><a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ session('data')->wa_template->kontak }} {{session('konfigurasi')->app_name}}" target="blank" href="#"> Whatsapp : {{ session('data')->wa }}</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 footer-newsletter">
                    <h4></h4>
                    {!!session('qrcode')!!}

                </div>


            </div>
        </div>
    </div>

    <div class="container">

        <div class="copyright">
            &copy; {{session('konfigurasi')->copyright}}
        </div>
        <div class="credits">

            Powered by <a href="{{session('konfigurasi')->app_url}}" class="text-white">{{session('konfigurasi')->poweredby}}</a>
        </div>

    </div>
</footer>