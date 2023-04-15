<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{$data2->materi}}</title>

<meta property="og:title" content="{{ $data2->materi }}" />
<meta property="og:image" itemprop="image" content="{{ (@file_exists(public_path($data2->foto))) ? asset($data2->foto) : asset('images/no-product.svg') }}" />
<meta property="og:image:type" content="image/jpeg">
<meta property="og:description" content="{{ $data2->caption }}" />
<meta property="og:type" content="website" />

<link rel="stylesheet" type="text/css" href="{{ asset('templates/landing-page/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/landing-page/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/landing-page/css/animate.min.css')}}">
<link rel="stylesheet" href="{{ asset('templates/landing-page/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{ asset('templates/landing-page/css/cubeportfolio.min.css')}}">
<link rel="stylesheet" href="{{ asset('templates/landing-page/css/jquery.fancybox.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/landing-page/css/settings.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/landing-page/css/style.css')}}">

<link rel="icon" href="{{ asset('favicon.png')}}" type="image/x-generic">
<link rel="shortcut icon" href="{{ asset('favicon.png')}}" type="image/x-generic">
<style>
    img{
        text-align: center !important;
        justify-content: center !important;
        margin: auto !important;
    }
   .single-items {
   background-attachment: fixed !important;
   background-position: center center !important;
   -webkit-background-size: cover;
   background-size: cover !important;
   background-repeat: no-repeat !important;
   position: relative !important;
   width: 100% !important;
   padding: 20px !important;
   min-height: 450px !important;
   height: auto !important;
}
.floatingButtonWrap {
    display: block;
    position: fixed;
    bottom: 45px;
    right: 45px;
    z-index: 999999999;
    background:white !important;
}

.floatingButtonInner {
    position: relative;
}

.floatingButton {
    display: block;
    width: 60px;
    height: 60px;
    text-align: center;
    background:#40755c;
    color: #fff;
    line-height: 50px;
    position: absolute;
    border-radius: 50% 50%;
    bottom: 0px;
    right: 0px;
    border: 5px solid #284b3b;
    /* opacity: 0.3; */
    opacity: 1;
    transition: all 0.4s;
}

.floatingButton .fa {
    font-size: 15px !important;
}

.floatingButton.open,
.floatingButton:hover,
.floatingButton:focus,
.floatingButton:active {
    opacity: 1;
    color: #fff;
}


.floatingButton .fa {
    transform: rotate(0deg);
    transition: all 0.4s;
}

.floatingButton.open .fa {
    transform: rotate(270deg);
}

.floatingMenu {
    position: absolute;
    bottom: 60px;
    right: 0px;
    /* width: 200px; */
    display: none;
}

.floatingMenu li {
    width: 100%;
    float: right;
    list-style: none;
    text-align: right;
    margin-bottom: 5px;
    margin-right: 10px;
}

.floatingMenu li a {
   align-self: center;
   text-align: center;
    width: 40px;
    height: 40px;
    padding-top: 10px;
    display: inline-block;
    background: #f8f8f8;
    color: #40755c;
    border-radius: 50%;
    overflow: hidden;
    white-space: nowrap;
    transition: all 0.4s;
}

.floatingMenu li a:hover {
    margin-right: 10px;
    text-decoration: none;
}
.shadow{
  overflow: hidden;
  color: #fff;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  position: relative;
  align-items: center;
  display: flex;
  justify-content: center;
  height: 100vh;
  text-align: center;
  margin: auto;
  /*
  *
  * HERE IS THE SECRET
  * MAKE SURE TO ALWAYS USE A LINEAR-GRADIENT VALUE
  * THE FIRST ONE WILL BE FOR A BLACK OPACITY
  * THE SECOND ONE (COMMENTED) WILL BE FOR A WHITE OPACITY
  *
  */
  background: linear-gradient(to bottom, rgba(0,0,0,0.7) 0%,rgba(0,0,0,0.7) 100%) , url(https://images.pexels.com/photos/34676/pexels-photo.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260);
  
  /*** WHITE OPACITY ***/
  /* background: linear-gradient(to bottom, rgba(255, 255, 255, 0.7) 0%,rgba(255, 255, 255, 0.7) 100%), url(https://images.pexels.com/photos/34676/pexels-photo.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260);*/
}

form {
    padding: 20px
}

input[type="checkbox"] {
    appearance: none;
    width: 18px;
    height: 18px;
    padding-bottom: 10px;
    padding-right: 10px;
    background-color: #eee;
    position: relative;
    border-radius: 3px;
    cursor: pointer
}

input[type="checkbox"]:after {
    position: absolute;
    width: 100%;
    height: 100%;
    font-family: "Font Awesome 5 Free";
    font-weight: 600;
    content: "\f00c";
    color: #fff;
    font-size: 12px;
    display: none
}

input[type="checkbox"]:checked,
input[type="checkbox"]:checked:hover {
    background-color: #0d6efd
}

input[type="checkbox"]:checked::after {
    display: flex;
    align-items: center;
    justify-content: center
}

input[type="checkbox"]:hover {
    background-color: #ddd
}

.container .icons .icon {
    font-size: 16px;
    width: 40px;
    height: 40px;
    color: white;
    background-color: #0d6efd;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer
}

.container .icons .icon:hover {
    background-color: #0b5ed7
}

::placeholder {
    font-size: 11px
}

label {
    cursor: pointer
}

.textmuted {
    color: rgb(119, 119, 119);
    font-size: 13px;
    font-weight: 500
}

.btn.btn-primary {
    height: 50px;
    font-weight: 600;
    padding: 12px 0
}

  

</style>
</head>

<body>

{{-- <div class="floatingButtonWrap">
   <div class="floatingButtonInner">
       <a href="#" class="floatingButton">
           <i class="fa fa-plus icon-default"></i>
       </a>
       <ul class="floatingMenu social-icons">
         <p id="p1" style="display: none;">{{ Request::url() }}</p>
         @foreach($share as $key => $value)
         <li>
             <a href="{{$value}}" target="_blank">
                 @if($key == "facebook")
                 <i class="fa fa-facebook"></i>
                 @elseif($key == "twitter")
                 <i class="fa fa-twitter"></i>
                 @elseif($key == "whatsapp")
                 <i class="fa fa-whatsapp"></i>
                 @elseif($key == "telegram")
                 <i class="fa fa-telegram"></i>
                 @else
                 <i class="fa fa-home"></i>
                 @endif
             </a>
         </li>
         @endforeach
         <li>
            <a href onclick="copyToClipboard('#p1')">
                <i class="fa fa-copy"></i>
            </a>
        </li>
       </ul>
   </div>
</div> --}}
    {{-- <a href="javascript:void(0)" class="scrollToTop"><i class="fa fa-angle-up"></i></a> --}}

<!--Single portfolio items-->
@if(!empty($data->section1))
@if ($data->format1 == 'paralax')
<section class="single-items center-block parallaxie shadow full-screen" style="background-repeat: no-repeat; background-size: cover;background: linear-gradient(to bottom, rgba(0,0,0,0.5) 0%,rgba(0,0,0,0.5) 100%) , url('{{ asset($data->image1) }}');" id="home">
@else
<section class="single-items center-block parallaxie full-screen" style="background-color: {{ $data->background1 }} !important;" id="home">
@endif
    <div class="container wow fadeInUp">
       <div class="row">
          <div class="col-md-12 col-sm-12">
             <div class="item-titles {{$data->fontcolor1 }} {{$data->position1}}">
                <h2 class="font-xlight wow fadeInUp" data-wow-delay="300ms">
                   <a href="#">{{$data->title1 }}</a>
                </h2>
                <p class="top25 bottom25 wow fadeInUp" data-wow-delay="350ms">{!! $data->section1 !!}</p>
              
             </div>
          </div>
       </div>
    </div>
 </section>
 @endif
 @if(!empty($data->section2))
 @if ($data->format2 == 'paralax')
  <section class="single-items center-block parallaxie shadow full-screen" style="background-repeat: no-repeat; background-size: cover;background: linear-gradient(to bottom, rgba(0,0,0,0.5) 0%,rgba(0,0,0,0.5) 100%) , url('{{ asset($data->image2) }}');" id="home">
 @else
 <section class="single-items center-block parallaxie full-screen" style="background-color: {{ $data->background2 }} !important;" id="home">
 @endif
    <div class="container wow fadeInUp">
       <div class="row">
          <div class="col-md-5 col-sm-8">
             <div class="item-titles {{$data->fontcolor2}} {{$data->position2}}">
                <h2 class="font-xlight wow fadeInUp" data-wow-delay="300ms">
                   <a href="#">{{$data->title2}}</a>
                </h2>
                <p class="top25 bottom25 wow fadeInUp" data-wow-delay="350ms">{!! $data->section2 !!}</p>
             </div>
          </div>
       </div>
    </div>   
 </section>
 @endif
 @if(!empty($data->section3))
 @if ($data->format3 == 'paralax')
 <section class="single-items center-block parallaxie shadow full-screen" style="background-repeat: no-repeat; background-size: cover;background: linear-gradient(to bottom, rgba(0,0,0,0.5) 0%,rgba(0,0,0,0.5) 100%) , url('{{ asset($data->image3) }}');" id="home">
 @else
 <section class="single-items center-block parallaxie full-screen" style="background-color: {{ $data->background3 }} !important;" id="home">
 @endif
    <div class="container wow fadeInUp">
       <div class="row">
          <div class="col-md-5 offset-md-7 col-sm-8 offset-sm-4">
             <div class="item-titles {{$data->fontcolor3 }} {{$data->position3}}">
                <h2 class="font-xlight wow fadeInUp" data-wow-delay="300ms">
                   <a href="#">{{$data->title3}}</a>
                </h2>
                <p class="top25 bottom25 wow fadeInUp" data-wow-delay="350ms">{!! $data->section3 !!}</p>
             
             </div>
          </div>
       </div>
    </div>
 </section>
 @endif
 @if(!empty($data->section4))
 @if ($data->format4 == 'paralax')
 <section class="single-items center-block parallaxie shadow full-screen" style="background-repeat: no-repeat; background-size: cover;background: linear-gradient(to bottom, rgba(0,0,0,0.5) 0%,rgba(0,0,0,0.5) 100%) , url('{{ asset($data->image4) }}');" id="home">
 @else
 <section class="single-items center-block parallaxie full-screen" style="background-color: {{ $data->background4 }} !important;" id="home">
 @endif
    <div class="container wow fadeInUp">
       <div class="row">
          <div class="col-md-5 col-sm-8">
             <div class="item-titles {{$data->fontcolor4}} {{$data->position4}}">
                <h2 class="font-xlight wow fadeInUp" data-wow-delay="300ms">
                    <a href="#">{{$data->title4}}</a>
                </h2>
                <p class="top25 bottom25 wow fadeInUp" data-wow-delay="350ms">{!! $data->section4 !!}</p>
             </div>
          </div>
       </div>
    </div>   
 </section>
 @endif
 @if(!empty($data->section5))
 @if ($data->format5 == 'paralax')
 <section class="single-items center-block parallaxie shadow full-screen" style="background-repeat: no-repeat; background-size: cover;background: linear-gradient(to bottom, rgba(0,0,0,0.5) 0%,rgba(0,0,0,0.5) 100%) , url('{{ asset($data->image5) }}');" id="home">
 @else
 <section class="single-items center-block parallaxie full-screen" style="background-color: {{ $data->background5 }} !important;" id="home">
 @endif
    <div class="container wow fadeInUp">
       <div class="row">
          <div class="col-md-5 offset-md-7 col-sm-8 offset-sm-4">
             <div class="item-titles {{$data->fontcolor5 }} {{$data->position5}}">
                <h2 class="font-xlight wow fadeInUp" data-wow-delay="300ms">
                    <a href="#">{{$data->title5}}</a>
                </h2>
                <p class="top25 bottom25 wow fadeInUp" data-wow-delay="350ms">{!! $data->section5 !!}</p>
             </div>
          </div>
       </div>
    </div>
 </section>

@endif
<section style="background-color: #f8f8f8">
<div class="container" >
  <div class="row justify-content-center">
     <div class="col-md-7">
      <form action="{{route('send')}}" method="POST" target="_blank">
         @csrf
         <input type="text" value="{{$user->wa}}" name="wa" hidden>
         <p class="h4 text-center pt-4 bold mb-0">FORM PEMESANAN</p>
         <p class="h5 text-center bold mb-5">ISI DATA DIRI ANDA</p>
         <hr>
         <div class="row">
            <div class="col-md-6 mb-4 "> <label class="mb-2">Nama</label><input class="form-control" type="text" name="name" placeholder="Nama Lengkap"> </div>
            <div class="col-md-6 mb-4 "> <label class="mb-2">Email</label><input class="form-control" type="email" name="email" placeholder="Email"> </div>
         </div>
         <div class="row">
            <div class="col-md-12 col-sm-12 col-12 mb-4"> <label class="mb-2">Nomor Hp / WhatsApp</label><input type="text" placeholder="+62XXX" name="no_telp" class="form-control"> </div>
         </div>
         <div class="row">
            <div class="col-md-8 col-sm-12 col-12 mb-4"> <label class="mb-2">Produk</label><input type="text" name="produk" class="form-control" value="{{$data2->produk}}" readonly> </div>
            <div class="col-md-4 col-sm-12 col-12 mb-4"><label class="mb-2">Jumlah Pesanan</label> <input type="number" placeholder="1" min="1" name="qty" class="form-control"> </div>
         </div>
         <div class="row">
                    <div class="col-md-4 col-sm-12 col-12 mb-4"> 
                        <label class="mb-2">Provinsi</label>
                            <select name="propinsi" id="propinsi" class="form-control @error('propinsi')is-invalid @enderror" name="propinsi" required>
                                <option selected>Pilih Provinsi</option>
                                @foreach ($province as $prov)
                                <option value="{{$prov->province_id}}">{{$prov->province}}</option>
                                @endforeach
                            </select>
                    </div>
                   <div class="col-md-4 col-sm-12 col-12 mb-4"> 
                        <label class="mb-2">Kota</label>
                            <select id="kota" name="kota" class="form-control input-default @error('kota')is-invalid @enderror" required>

                            </select>
                    </div>
                   <div class="col-md-4 col-sm-12 col-12 mb-4"> 
                        <label class="mb-2">Kecamatan</label>
                            <select id="kecamatan" name="kecamatan" class="form-control input-default @error('kecamatan')is-invalid @enderror" required>

                            </select>
                    </div>
        </div>
         <div class="row">
            <div class="col-md-12 mb-4">
               <label class="mb-2">Alamat rumah</label>
               <textarea class="form-control" name="address" cols="30" rows="3"></textarea>
            </div>
         </div>
         <hr>
         <div class="row">
             <div class="col-12 mb-4">
                 <button type="submit" class="btn btn-success btn-block"> KIRIM / PESAN SEKARANG </button>
             </div>
         </div>
        
     </form>
     </div>
  </div>
</div>
</section>
<script>
   function copyToClipboard(element) {
       var $temp = $("<input>");
       $("body").append($temp);
       $temp.val($(element).text()).select();
       document.execCommand("copy");
       $temp.remove();
   }
</script>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
   $(document).ready(function(){
       $(function(){
          new WOW().init(); 
        });
       $("#propinsi").change(function() {
            var propinsi = $("#propinsi").val();
            $.ajax({
                type: 'get',
                method: 'get',
                url: '/city/find/' + propinsi,
                data: '_token = <?php echo csrf_token() ?>',
                success: function(hsl) {
                    if (hsl.code == 404) {
                        alert(hsl.error);

                    } else {
                        var data = [];
                        data = hsl.result;
                        $("#kota").children().remove().end();
                        $.each(data, function(i, item) {
                            $("#kota").append('<option value="' + item.city_id + '">' + item.city_name + ' ' + item.type + '</option>');
                        })
                        kecamatan();
                        $("#kota").focus();

                    }
                }
            });
        })
        $("#kota").change(function() {
            kecamatan();
        })

    function kecamatan() {
        var kota = $("#kota").val();
        $.ajax({
            type: 'get',
            method: 'get',
            url: '/subdistrict/find/' + kota,
            data: '_token = <?php echo csrf_token() ?>',
            success: function(hsl) {
                if (hsl.code == 404) {
                    alert(hsl.error);

                } else {
                    var data = [];
                    data = hsl.result;
                    $("#kecamatan").children().remove().end();
                    $.each(data, function(i, item) {
                        $("#kecamatan").append('<option value="' + item.subdistrict_id + '">' + item.subdistrict_name + '</option>');
                    })

                    $("#kecamatan").focus();

                }
            }
        });
    }
        $('.floatingButton').on('click',
            function(e){
                e.preventDefault();
                $(this).toggleClass('open');
                if($(this).children('.fa').hasClass('fa-plus'))
                {
                    $(this).children('.fa').removeClass('fa-plus');
                    $(this).children('.fa').addClass('fa-close');
                } 
                else if ($(this).children('.fa').hasClass('fa-close')) 
                {
                    $(this).children('.fa').removeClass('fa-close');
                    $(this).children('.fa').addClass('fa-plus');
                }
                $('.floatingMenu').stop().slideToggle();
            }
        );
        $(this).on('click', function(e) {
          
            var container = $(".floatingButton");
            // if the target of the click isn't the container nor a descendant of the container
            if (!container.is(e.target) && $('.floatingButtonWrap').has(e.target).length === 0) 
            {
                if(container.hasClass('open'))
                {
                    container.removeClass('open');
                }
                if (container.children('.fa').hasClass('fa-close')) 
                {
                    container.children('.fa').removeClass('fa-close');
                    container.children('.fa').addClass('fa-plus');
                }
                $('.floatingMenu').hide();
            }
          
            // if the target of the click isn't the container and a descendant of the menu
            if(!container.is(e.target) && ($('.floatingMenu').has(e.target).length > 0)) 
            {
                $('.floatingButton').removeClass('open');
                $('.floatingMenu').stop().slideToggle();
            } 
        });
    });
</script>

<!--Bootstrap Core-->
<script src="{{ asset('templates/landing-page/js/popper.min.js')}}"></script>
<script src="{{ asset('templates/landing-page/js/bootstrap.min.js')}}"></script>

<!--to view items on reach-->
<script src="{{ asset('templates/landing-page/js/jquery.appear.js')}}"></script>

<!--Equal-Heights-->
<script src="{{ asset('templates/landing-page/js/jquery.matchHeight-min.js')}}"></script>

<!--Owl Slider-->
<script src="{{ asset('templates/landing-page/js/owl.carousel.min.js')}}"></script>

<!--Parallax Background-->
<script src="{{ asset('templates/landing-page/js/parallaxie.js')}}"></script>
  
<!--FancyBox popup-->
<script src="{{ asset('templates/landing-page/js/jquery.fancybox.min.js')}}"></script>                

<!--Morphing Text-->
<script src="{{ asset('templates/landing-page/js/morphext.min.js')}}"></script>                  
              
<!--WOw animations-->
<script src="{{ asset('templates/landing-page/js/wow.min.js')}}"></script>
            
<!--Revolution SLider-->
<script src="{{ asset('templates/landing-page/js/revolution/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{ asset('templates/landing-page/js/revolution/jquery.themepunch.revolution.min.js')}}"></script>

<script src="{{ asset('templates/landing-page/js/revolution/extensions/revolution.extension.parallax.min.js')}}"></script>

<script src="{{ asset('templates/landing-page/js/functions.js')}}"></script>

</body>
</html>