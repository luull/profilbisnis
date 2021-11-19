<footer class="footer">
    <div class="container">
        <div class="row justify-content-center  wow slideInUp">
            <div class="col-lg-8 col-md-8 col-12 text-center">

                {{session('qrcode')}}
                <h4 class="text-white fadeIn mt-4"><strong>{{session('konfigurasi')->app_name}}</strong></h4>
                <p class="company-about fadeIn mb-0">{{session('data')->tentang_web}}</p>
                <p class="company-about fadeIn">
                    {{session('data')->city->city_name.' '.session('data')->city->type}} - {{session('data')->province->province}}
                </p>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row align-items-center  wow slideInUp">
            <div class="col-12 text-center">

                <div class="footer-social">
                    <ul class="list-unstyled social-icons social-icons-simple">
                        <li><a class="social-icon wow fadeInUp" href="tel:{{ session('data')->hp }}"><i class="fa fa-phone"></i></a></li>
                        <li><a class="social-icon wow fadeInUp" href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ session('data')->wa_template->kontak }} {{session('konfigurasi')->app_name}}" target="blank"><i class="fa fa-whatsapp"></i></a></li>
                        <li><a class="social-icon wow fadeInUp" href="mailto:{{ session('data')->email }}"><i class="fa fa-envelope"></i></a></li>

                    </ul>
                </div>
                <!--Text-->
                <p class="company-about fadeIn">&copy; {{session('konfigurasi')->copyright}}
                    Powered by <a href="{{session('konfigurasi')->app_url}}">{{session('konfigurasi')->poweredby}}</a></p>

            </div>
        </div>
    </div>
</footer>