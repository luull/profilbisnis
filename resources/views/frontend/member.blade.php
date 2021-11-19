@extends('frontend.master')
@section('breadcrumb')
<div class="dlab-bnr-inr style-1 bg-primary" style="background-image: url(images/banner/bnr2.png), var(--gradient-sec);  background-size: cover, 200%; ">
			<div class="container">
				<div class="dlab-bnr-inr-entry">
					
                    <h1 class="title text-white">Daftar Member</h1>
				</div>
			</div>
		</div>
		

    
@endsection
@section('content')
<div class="row">
       <!-- <div class="team-carousel2 owl owl-carousel owl-none owl-theme dots-style-1">-->
            @foreach ($member_spesial as $item)
                <div class="col-md-3">
                
                    <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.1s" >
                        
                        <div class="flip-bx dlab-team style-2 m-tb30">
                            <div class="front">
                                <div class="inner text-white">
                                    <div class="dlab-media">
                                        <a href="{{env('APP_URL')}}/{{$item->username}}"><img src="{{asset($item->foto)}}" class="fluid" alt="" border=0></a>
                                    </div>
                                </div>
                            </div>
                            <div class="back">
                                <div class="inner text-white">
                                    <div class="dlab-content">
                                        <h4 class="dlab-name"><a href="{{env('APP_URL')}}/{{$item->username}}" style="color:#fff">{{$item->nama}}</a></h4>
                                        <span class="dlab-position mb-2 d-block"><a href="{{env('APP_URL')}}/{{$item->username}}" style="color:#fff">{{$item->pekerjaan}}<br>
                                        {{$item->perusahaan}}</a></span>
                                        <ul class="dlab-social-icon">
                                            <li><a href="https://facebook.com/{{$item->fb}}" class="fa fa-facebook"></a></li>
                                            <li><a href="https://instagram.com/{{$item->ig}}" class="fa fa-instagram"></a></li>
                                            <li><a href="https://twitter.com/{{$item->twitter}});" class="fa fa-twitter"></a></li>
                                            <li><a href="https://youtube.com/{{$item->tube}});" class="fa fa-twitter"></a></li>
                                        </ul>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
             @foreach ($member_reguler as $item)
                <div class="col-md-3">
                
                    <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.1s" >
                        
                        <div class="flip-bx dlab-team style-2 m-tb30">
                            <div class="front">
                                <div class="inner text-white">
                                    <div class="dlab-media">
                                        <a href="{{env('APP_URL')}}/{{$item->username}}"><img src="{{asset($item->foto)}}" class="fluid" alt="" border=0></a>
                                    </div>
                                </div>
                            </div>
                            <div class="back">
                                <div class="inner text-white">
                                    <div class="dlab-content">
                                        <h4 class="dlab-name"><a href="{{env('APP_URL')}}/{{$item->username}}" style="color:#fff">{{$item->nama}}</a></h4>
                                        <span class="dlab-position mb-2 d-block"><a href="{{env('APP_URL')}}/{{$item->username}}" style="color:#fff">{{$item->pekerjaan}}<br>
                                        {{$item->perusahaan}}</a></span>
                                        <ul class="dlab-social-icon">
                                            <li><a href="https://facebook.com/{{$item->fb}}" class="fa fa-facebook"></a></li>
                                            <li><a href="https://instagram.com/{{$item->ig}}" class="fa fa-instagram"></a></li>
                                            <li><a href="https://twitter.com/{{$item->twitter}});" class="fa fa-twitter"></a></li>
                                            <li><a href="https://youtube.com/{{$item->tube}});" class="fa fa-twitter"></a></li>
                                        </ul>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
            
            
            
            
        <!--</div>-->
    
</div>
                
@endsection
