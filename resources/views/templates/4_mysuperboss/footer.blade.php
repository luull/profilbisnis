<!-- <section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-12">
                <h4>{{env('APP_NAME')}}</h4>
                <p>{{session('data')->tentang_web}}</p>
                <p>{!!session('qrcode')!!}</p>
            </div>
            <div class="col-lg-3 col-md-3 col-12">
                <h6>Layanan</h6>
                <ul class="footer-links">
                    <li><i class="fa fa-angle-right"></i> <a href="/profil"> Profil</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="/bisnis"> Bisnis</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="/produk"> Produk</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="/kartunama/{{session('username')}}"> Kartu Nama</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <h6>Kontak</h6>
                <ul class="footer-links">
                    <li><i class="fa fa-map-marker mr-2"></i><a>{{ session('data')->alamat }}{{ session('data')->hp }}</a></li>
                    <li><i class="fa fa-phone mr-2"></i><a href="tel:{{ session('data')->hp }}"> {{ session('data')->hp }}</a></li>
                    <li><i class="fa fa-envelope mr-2"></i><a href="mailto:{{ session('data')->email }}">{{ session('data')->email }}</a></li>
                    <li><i class="fa fa-whatsapp mr-2"></i><a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ session('data')->wa_template->kontak }} {{ env('APP_NAME') }}" target="blank" href="#">{{ session('data')->wa }}</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">&copy; Copyright 2021 All Rights Reserved
                    Powered by <a href="https://wwww.shadnetwork.com" class="text-dark">Shadnetwork.com.</a>
                </p>
            </div>

        </div>
    </div>
    <svg class="right-square contact-square" viewBox="0 0 150 390" xmlns="http://www.w3.org/2000/svg">
        <rect x="0" y="32" width="1616" height="1616" rx="18" ry="18" fill="#000" transform="rotate(-45 310 100)" />
    </svg>
</section> -->
<section id="contact" class="contact">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="row mt-5">
                    <div class="col-sm-12" id="result"></div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-8" data-aos="fade-right" data-aos-delay="300">
                        <img src="{{ asset('images/logo-mysuperboss.png')}}" alt="Logo Img" class="logos mb-3">
                        <p>{{session('data')->tentang_web}}</p>
                        <p>{{session('data')->city->city_name.' '.session('data')->city->type}} - {{session('data')->province->province}}
                        </p>
                    </div>
                    <div class="col-12 col-md-4" data-aos="fade-left" data-aos-delay="300">
                        <div style="padding-top:350px !important;padding-right:100px !important;"> {{session('qrcode')}}</div>
                    </div>
                </div>
            </div>

        </div>

        <!--   FOOTER SECTION ROW-->
        <div class="row footer" data-aos="fade-up" data-aos-delay="300">
            <div class="col-12 col-md-4">

                <ul class="footer_ul">
                    <li class="footer_list"><a href="tel:{{ session('data')->hp }}"><i class="las la-phone phone"></i></a></li>
                    <li class="footer_list"><a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ session('data')->wa_template->kontak }} {{session('konfigurasi')->app_name}}" target="blank" href="#"><i class="lab la-whatsapp wa"></i></a></li>
                    <li class="footer_list"><a href="mailto:{{ session('data')->email }}"><i class="las la-envelope gmail"></i></a></li>
                    <!-- <li class="footer_list"><i class="lab la-facebook-f fb"></i></li>
                    <li class="footer_list"><i class="lab la-twitter twt"></i></li>
                    <li class="footer_list"><i class="lab la-google-plus gogle"></i></li>
                    <li class="footer_list"><i class="lab la-instagram inst"></i></li> -->
                </ul>
                <p class="info footer_text ml-3 mb-5"><i class="far fa-copyright"></i> {{session('konfigurasi')->copyright}}
                    Powered by <a href="{{session('konfigurasi')->app_url}}" class=" text-dark">{{session('konfigurasi')->poweredby}}</a></p>

            </div>
        </div>

    </div>
    <svg class="right-square contact-square" viewBox="0 0 150 390" xmlns="http://www.w3.org/2000/svg">
        <rect x="0" y="32" width="1616" height="1616" rx="18" ry="18" fill="#fa2851" transform="rotate(-45 310 100)" />
    </svg>
</section>