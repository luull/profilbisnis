<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <title>{{env('APP_NAME')}} || Kartu Member</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('favicon.png')}}" type="image/png">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('card/member/css/main.css')}}">
    <!--Bootstrap-->
    <link rel="stylesheet" href="{{asset('card/member/css/bootstrap.min.css') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('card/member/font-awesome/font-awesome.min.css')}}">

</head>

<body>
    <div class="row justify-content-center m-3 mt-5  ">
        <div class="col-lg-7 col-md-8 col-sm-10 col-12">
            <div id="htmltoimage">
                <div class="cardname" onclick="javascript:goToURL()" id="get" data-name="{{ session('data')->username }}">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 center">
                            <div class="row mb-0">
                                <div class="col-md-12 text-center">
                                    <img src="{{asset($data->foto)}}" class="img-fluid mt-0 mb-2">
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <p class="mb-0 text-center">MEMBER</h4>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <h4 class="mb-0"> {{$data->nama}}</h4>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <p class="mb-0 ex">Expired : {{$data->tgl_expired}}</h4>
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
                link.download = "kartumember-{{session('username')}}.png";
                link.href = canvas.toDataURL("image/png");
                link.target = '_blank';
                link.click();
            });
        }
    </script>
    <!-- jQuery -->
    <script src="{{ asset('card/member/js/html2canvas.js')}}"></script>
    <script src="{{ asset('card/member/js/html2canvas.min.js')}}"></script>

    <!-- jQuery -->
    <script src="{{ asset('card/member/js/jquery-3.6.0.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('card/member/js/bootstrap.min.js')}}"></script>
    @yield('script')
</body>
@yield('modal')

</html>