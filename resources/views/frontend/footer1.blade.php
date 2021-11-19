<!-- Footer -->
    <footer class="site-footer style-3" id="footer" style="background-image: url(images/background/bg11.png), var(--gradient-sec); background-size: cover, 200%; ">
		<div class="footer-top">
            <div class="container">
				<div class="row">
					<div class="col-4 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                        <div class="widget widget_about">
							<div class="footer-logo">
								<a href="index.html"><img src="{{asset($company->logo)}}" alt=""/></a> 
							</div>
							<p>{{$company->tentang_web}}</p>
							<div class="dlab-social-icon">
								<ul>
									<li><a class="fa fa-facebook" href="https://facebook.com/{{$company->fb}};"></a></li>
									<li><a class="fa fa-instagram" href="https://instagram.com/{{$company->ig}};"></a></li>
									<li><a class="fa fa-twitter" href="https://twitter.com/{{$company->twitter}};"></a></li>
						        	<li><a class="fa fa-youtube" href="https://youtube.com/{{$company->tube}};"></a></li>
								</ul>
							</div>
						</div>
                    </div>
					<div class="col-4 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4s">
						<div class="widget widget_services style-1">
							<h5 class="footer-title">Link</h5>
							<ul>
								<li><a href="/">Beranda</a></li>
								<li><a href="/profil">Tentang Kami</a></li>
								<li><a href="/member">Daftar Member</a></li>
								<li><a href="/kontak">Hubungi Kami</a></li>
							</ul>
						</div>
                    </div>
					
					
					<div class="col-4 wow fadeIn" data-wow-duration="2s" data-wow-delay="1.0s">
						<div class="widget widget_getintuch">
							<h5 class="footer-title">Kontak Kami</h5>
							<ul>
								<li>
									<i class="fa fa-phone gradient"></i>
									<span>{{$company->telp}}</span> 
								</li>
								<li>
									<i class="fa fa-envelope gradient"></i> 
									<span>{{$company->email}}</span>
								</li>
								<li>
									<i class="fa fa-whatsapp gradient"></i>
									<span>{{$company->wa}}</span>
								</li>
							</ul>
						</div>
					</div>
                </div>
            </div>
		</div>
        <!-- footer bottom part -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12 text-center"> 
						<span class="copyright-text">Copyright © 2021 <a href="https://mysuperboss.com/" target="_blank">MySuperBoss.Com</a>. All rights reserved.</span> 
					</div>
                </div>
            </div>
        </div>
    </footer>