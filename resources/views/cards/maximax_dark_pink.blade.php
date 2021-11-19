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
    <link rel="stylesheet" href="{{asset('card/maximax_dark_pink/css/main.css')}}">
    <!--Bootstrap-->
    <link rel="stylesheet" href="{{asset('card/maximax_dark_pink/css/bootstrap.min.css') }}">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="{{asset('card/maximax_dark_pink/fonts/metropolis.css') }}">
    <link rel="stylesheet" href="{{asset('card/maximax_dark_pink/font-awesome/font-awesome.min.css')}}">

</head>

<body>
    <div class="row justify-content-center m-3 mt-5  ">
        <div class="col-lg-7 col-md-8 col-sm-10 col-12">
            <div id="htmltoimage">
                <div class="cardname" onclick="javascript:goToURL()" id="get" data-name="{{ session('data')->username }}">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 left">
                            <div class="row mb-0">
                                <div class="col-md-12 top">

                                    <div class="row mb-0">
                                        <div class="col-md-12">
                                            <h4 class="mb-0 name"> {{$data->nama}}</h4>
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-12">
                                            @if (!@empty($data->jabatan))
                                            <p class="mb-0 major"> {{$data->jabatan}}</p>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 bottom">
                                    <ul class="list-group mr-auto">

                                        <li class="list-group-item address"><a href="#/">{{$data->city->city_name.' - '.$data->province->province}}</a></li>
                                        @if (!@empty($data->hp))
                                        <li class="list-group-item hp"><a href="tel:{{ $data->hp }}" target="_blank">{{$data->hp}}</a></li>
                                        @else
                                        <li class="list-group-item hp"><a href="#">-</a></li>
                                        @endif
                                        @if (!@empty($data->email))
                                        <li class="list-group-item email"><a href="mailto:{{ $data->email }}" target="_blank">{{$data->email}}</a></li>
                                        @else
                                        <li class="list-group-item email"><a href="#">-</a></li>
                                        @endif
                                        @if (!@empty($data->website))
                                        <li class="list-group-item website"><a href="{{$data->website}}" target="_blank">{{$data->website}}</a></li>
                                        @else
                                        <li class="list-group-item website"><a href="#">-</a></li>
                                        @endif

                                    </ul>
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
    <script src="{{ asset('card/maximax_dark_pink/js/html2canvas.js')}}"></script>
    <script src="{{ asset('card/maximax_dark_pink/js/html2canvas.min.js')}}"></script>

    <!-- jQuery -->
    <script src="{{ asset('card/maximax_dark_pink/js/jquery-3.6.0.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('card/maximax_dark_pink/js/bootstrap.min.js')}}"></script>
    @yield('script')
</body>
@yield('modal')

</html>