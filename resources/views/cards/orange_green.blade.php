<!DOCTYPE html')}}>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>{{env('APP_NAME')}} || Kartu Nama || {{session('username')}}</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('favicon.png')}}" type="image/png">
        
    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{asset('/css/LineIcons.2.0.css')}}">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{asset('/css/bootstrap-4.5.0.min.css')}}">
    <style>
        #right_side {
            background:url('/card/green.jpg') !important;
        }
         #left_side {
            background:url('/card/orange.jpg') !important;
            
         }

    </style>
    
    
</head>
<body >
    
       <div class="row justify-content-center m-3 mt-5  " >
            <div class="col-12 col-md-8 ">
                <div class="row ">
                        <div class="col-md-5 rounded-left   text-center pt-5 pb-5 " id="left_side" >
                        <a href="{{env('APP_URL').'/'.session('username')}}" class="text-light" style="text-decoration:none;color:#fff">
                        <img src="{{asset($data->foto)}}" style="width:auto;max-width:80%;" class="img-thumbnail rounded-circle">
                        <div class="pt-3 text-light text-center" style="color:#fff">
                            <br>
                            {{$data->nama}}
                            @if (!@empty($data->jabatan))
                            <br>
                            {{ $data->jabatan }}
                        @endif  
                        </a>  
                        </div>
                    </div>
            
                    <div class="col-md-7 pt-5 pb-5 rounded-right   " id="right_side">
                        <div  class="sticky-top" style="width:100%;margin-bottom:50px; overflow:auto">
                            <ul class="list-unstyled" style="margin-top:2%;margin-bottom:2%;overflow:auto ;">
                                @if (!@empty($data->website))
                                <li><a class="text-light" href="{{$data->website}}" target="_blank"  ><i class="lni lni-world" ></i> {{$data->website}}</a></li>
                                @endif
                                @if (!@empty($data->tube))
                                <li><a class="text-light" href="https://youtube.com/channel/{{$data->tube}}"  target="_blank"><i class="lni lni-youtube" ></i> ASANTE CHANNEL</a></li>
                                @endif
                        
                                @if (!@empty($data->email))
                                <li><a class="text-light" href="mailto:{{ $data->email }}" ><i class="lni lni-envelope" ></i> {{ $data->email }}</a></li>
                                @endif
                                @if (!@empty($data->telp))
                            
                                <li><a class="text-light" href="tel:{{ $data->telp }}" ><i class="lni lni-phone" ></i> {{ $data->telp }}</a></li>
                                @endif
                                @if (!@empty($data->hp))
                                <li><a class="text-light" href="tel:{{ $data->hp }}" ><i class="lni lni-mobile" ></i> {{ $data->hp }}</a></li>
                                @endif
                                @if (!@empty($data->wa))
                                <li ><a class="text-light" href="https://api.whatsapp.com/send?phone={{ $data->wa }}&text={{ $data->wa_template->kontak }}  {{ env('APP_NAME') }}" target="blank" ><i class="lni lni-whatsapp" ></i> {{ $data->wa }}</a></li>
                                    
                                @endif
                                @if (!@empty($data->fb))
                                <li><a class="text-light" href="http://facebook.com/{{ $data->fb }}" target="_blank" ><i class="lni lni-facebook"></i>{{$data->fb}}</a></li>
                                @endif
                                @if (!@empty($data->twitter))
                                <li><a class="text-light" href="http://twitter.com/{{ $data->twitter }}" target="_blank" ><i class="lni lni-twitter"></i>{{$data->twitter}}</a></li>
                                @endif
                                @if (!@empty($data->ig))
                                <li><a class="text-light" href="http://github.com/{{ $data->ig }}" target="_blank" ><i class="lni lni-instagram" ></i> {{$data->ig}}</a></li>
                                @endif
                                
                            </ul> 
                            
                    </div>
                       
                            <div class="sticky-bottom " >
                                <ul class="list-unstyled" >
                                <li class="text-light"><i class="lni lni-home" ></i> {{$data->alamat}}</li>
                                <li class="text-light"> {{$data->kelurahan .' - '.$data->subdistrict->subdistrict_name}}</li> 
                                <li class="text-light">{{$data->city->city_name.' - '.$data->province->province}}</li>
                                <li class="text-light"> {{$data->kd_pos}}</li>
                                </ul>
                                
                                
                             </div>
                             
                    </div>
                </div>
            </div>
       
        </div>




<!--====== Jquery js ======-->
<script src="{{asset('/js/jquery-3.5.1-min.js')}}"></script>
<script src="{{asset('/js/bootstrap-4.5.0.min.js')}}"></script>

@yield('script')
</body>
@yield('modal')
</html>