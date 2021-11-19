<!-- Header -->
	<header class="site-header header mo-left header-transparent">
		<!-- Main Header -->
		<div class="sticky-header main-bar-wraper navbar-expand-lg bg-dark">
			<div class="main-bar clearfix ">
				<div class="container clearfix">
					<!-- Website Logo -->
					<div class="logo-header ">
						<a href="/"><img class="logo-3" src="{{asset($company->logo)}}" alt=""></a>
					</div>
					<!-- Nav Toggle Button -->
					<button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					
					<div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown" >
					
						<div class="logo-header">
							<a href="index.html"><img src="{{asset($company->logo)}}" alt=""></a>
						</div>
						<ul class="nav navbar-nav navbar">	
							<li class="active"><a href="/"><span>Beranda</span></a></li>
							<li ><a href="/profil"><span>Tentang Kami</span></a></li>
							<li ><a href="/member"><span>Daftar Member</span></a></li>
							<li ><a href="/kontak"><span>Hubungi Kami</span></a></li>
							
							
						</ul>
						<div class="dlab-social-icon">
							<ul>
								<li><a class="fa fa-facebook" href="javascript:void(0);"></a></li>
								<li><a class="fa fa-twitter" href="javascript:void(0);"></a></li>
								<li><a class="fa fa-linkedin" href="javascript:void(0);"></a></li>
								<li><a class="fa fa-instagram" href="javascript:void(0);"></a></li>
							</ul>
						</div>		
					</div>
				</div>
			</div>
		</div>
		<!-- Main Header End -->
	</header>
	<!-- Header End -->