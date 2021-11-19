<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <title>{{env('APP_NAME')}} || Kartu Nama</title>
    <link rel="stylesheet" href="{{asset('card/global/share.css') }}">

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('favicon.png')}}" type="image/png">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('card/black_purple/css/main.css')}}">
    <!--Bootstrap-->
    <link rel="stylesheet" href="{{asset('card/black_purple/css/bootstrap.min.css') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('card/black_purple/font-awesome/font-awesome.min.css')}}">

</head>

<body>

    <div class="row justify-content-center m-3 mt-5  ">
        <div class="col-lg-7 col-md-8 col-sm-10 col-12">
            <div id="htmltoimage">
                <div class="cardname" onclick="javascript:goToURL()" id="get" data-name="{{ session('data')->username }}">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-7 left">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <ul class="list-group">
                                        <div class="row row1">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                                @if (!@empty($data->website))
                                                <li class="list-group-item"><a href="{{$data->website}}" target="_blank"><i class="fa fa-globe"></i>{{$data->website}}</a></li>
                                                @endif
                                                @if (!@empty($data->email))
                                                <li class="list-group-item"><a href="mailto:{{ $data->email }}" target="_blank"><i class="fa fa-envelope"></i>{{$data->email}}</a></li>
                                                @endif
                                                @if (!@empty($data->telp))
                                                <li class="list-group-item"><a href="tel:{{ $data->telp }}" target="_blank"><i class="fa fa-phone"></i>{{$data->telp}}</a></li>
                                                @endif
                                                @if (!@empty($data->hp))
                                                <li class="list-group-item"><a href="tel:{{ $data->hp }}" target="_blank"><i class="fa fa-mobile"></i>{{$data->hp}}</a></li>
                                                @endif
                                                @if (!@empty($data->wa))
                                                <li class="list-group-item"><a href="https://api.whatsapp.com/send?phone={{ $data->wa }}&text={{ $data->wa_template->kontak }}  {{ env('APP_NAME') }}" target="_blank"><i class="fa fa-whatsapp"></i>{{$data->wa}}</a></li>
                                                @endif
                                                @if (!@empty($data->tube))
                                                <li class="list-group-item"><a href="https://youtube.com/channel/{{$data->tube}}" target="_blank"><i class="fa fa-youtube"></i>{{$data->tube}}</a></li>
                                                @endif
                                                @if (!@empty($data->fb))
                                                <li class="list-group-item"><a href="http://facebook.com/{{ $data->fb }}" target="_blank"><i class="fa fa-facebook custom"></i>{{$data->fb}}</a></li>
                                                @endif

                                                @if (!@empty($data->twitter))
                                                <li class="list-group-item"><a href="http://twitter.com/{{ $data->twitter }}" target="_blank"><i class="fa fa-twitter custom"></i>{{$data->twitter}}</a></li>
                                                @endif

                                                @if (!@empty($data->ig))
                                                <li class="list-group-item"><a href="http://instagram.com/{{ $data->ig }}" target="_blank"><i class="fa fa-instagram custom"></i>{{$data->ig}}</a></li>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row row2">
                                            <div class="col-lg-8 col-md-8 col-sm-10 col-10">
                                                <ul class="list-group">
                                                    <li class="list-group-item"><a href="#/"><i class="fa fa-map-marker"></i>{{$data->alamat}},{{$data->kelurahan .' - '.$data->subdistrict->subdistrict_name}},{{$data->city->city_name.' - '.$data->province->province}},{{$data->kd_pos}} </a></li>
                                                </ul>
                                            </div>

                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-5 right">
                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <div class="row mb-0">
                                        <div class="col-md-12">
                                            <img src="{{asset($data->foto)}}" class="img-fluid mt-0 mb-2">
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-12">
                                            <h4 class="mb-0"> {{$data->nama}}</h4>
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-12">
                                            @if (!@empty($data->jabatan))
                                            <p class="mb-0"> {{$data->jabatan}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="qr">{!!$qr!!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('cards.global.share')
        </div>
    </div>
    <script>
        function doCapture() {
            var container = document.getElementById("htmltoimage");; // full page 
            html2canvas(container, {
                allowTaint: true,
            }).then(function(canvas) {

                var link = document.createElement("a");
                document.body.appendChild(link);
                link.download = "kartunama-{{session('username')}}.png";
                link.href = canvas.toDataURL("image/png");
                link.target = '_blank';
                link.click();
            });
        }
    </script>
    <!-- jQuery -->
    <script src="{{ asset('card/black_purple/js/html2canvas.js')}}"></script>
    <script src="{{ asset('card/black_purple/js/html2canvas.min.js')}}"></script>

    <!-- jQuery -->
    <script src="{{ asset('card/black_purple/js/jquery-3.6.0.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('card/black_purple/js/bootstrap.min.js')}}"></script>
    @yield('script')
</body>
@yield('modal')

</html>