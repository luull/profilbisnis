<!DOCTYPE html')}}>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <title>{{env('APP_NAME')}} || Kartu Nama</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('favicon.png')}}" type="image/png">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('card/light/css/main.css')}}">
    <!--Bootstrap-->
    <link rel="stylesheet" href="{{asset('card/light/css/bootstrap.min.css') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('card/light/font-awesome/font-awesome.min.css')}}">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script>
    $(document).ready(function() {
        var nm_file = "{{session('username')}}" + ".png";
        var nm_file1 = "{{session('username')}}" + "_belakang.png";

        var element = $("#kartu_depan"); // global variable
        var element1 = $("#kartu_belakang"); // global variable
        var getCanvas1; // global variable

        $("#btn-Preview-Image").on('click', function() {
            html2canvas(element, {
                onrendered: function(canvas) {
                    $("#previewImage").append(canvas);
                    getCanvas = canvas;
                }
            });
        });

        $("#btn-Convert-Html2Image").on('click', function() {
            html2canvas(element, {
                onrendered: function(canvas) {
                    //  $("#previewImage").append(canvas);
                    getCanvas = canvas;
                }
            });
            var imgageData = getCanvas.toDataURL("image/png");
            // Now browser starts downloading it instead of just showing it
            var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
            $("#btn-Convert-Html2Image").attr("download", nm_file).attr("href", newData);
        });

        $("#btn-Convert-Html2Image1").on('click', function() {
            html2canvas(element1, {
                onrendered: function(canvas1) {
                    //  $("#previewImage").append(canvas);
                    getCanvas1 = canvas1;
                }
            });
            var imgageData = getCanvas1.toDataURL("image/png");
            // Now browser starts downloading it instead of just showing it
            var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
            $("#btn-Convert-Html2Image1").attr("download", nm_file1).attr("href", newData);
        });

    });
</script>
</head>
<style type="text/css">
    .kartu {
        width: 1051px;
        height: 673px;
        max-width: 100%;
        max-height: 100%;
        margin: 10px auto;
        background: url({{asset('images/kartu_depan.png')}}) no-repeat;

    }

    .kartu_belakang {
        width: 1051px;
        height: 673px;
        max-width: 100%;
        max-height: 100%;
        margin: 10px auto;
        background: url({{asset('images/kartu_belakang.jpeg')}}) no-repeat;
        border-radius: 20px;

    }

    .nomitra {
        font-size: 40px;
        padding-top: 380px;
        padding-left: 60px;
        font-weight: bold;
    }

    .namamitra {
        font-size: 30px;
        padding-left: 60px;
    }

    .col1,
    .col2,
    .col3 {
        padding: 20px;
        margin-top: 20px;

    }

    .col1 {
        width: 15%;
        float: left;
        position: relative;
    }

    .col1 p {
        padding-left: 40px;
        font-size: 30px;
    }

    .col2 {
        width: 58%;
        text-align: center;
        float: left;

    }

    .col2 p {

        font-size: 30px;


    }

    .col3 {
        width: 25%;
        text-align: right;
        float: right;
    }

    .col3 p {
        padding-right: 40px;
        font-size: 30px;

    }
</style>

<body>
    <div id="kartu_depan">
        
        <div class="kartu" id="kartu">
            <div class="nomitra" id="nomitra">{{session('member_id')}}</div> 
            <div class="namamitra">{{session('data')->nama}}</div> 
            <div class="col1"><p>Sejak<br><span> 08-2021 </span></p></div>
            <div class="col2"><p>Mitra Utama<br>
                {{session('data')->sponsor}}<br><span>
            {{session('data')->sponsor}}</span></p></div>
            <div class="col3"><p>{{env('APP_NAME')}}
                    </p></div>


        </div>
    </div>

    <p align="center"><a id="btn-Convert-Html2Image" class="button" href="#">Download</a></p>

    <div id="kartu_belakang">
        <div class="kartu_belakang"></div>
    </div>
    <p align="center"><a id="btn-Convert-Html2Image1" class="button" href="#">Download</a></p>



</body>

</html>