<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data->name }}</title>
    <link href="{{ asset('templatesBanner/global/font/font.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('templatesBanner/banner1/css/style.css') }}">
    <link rel="stylesheet" href="{{asset('templatesBanner/global/font-awesome/font-awesome.min.css')}}">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                            <div id="htmltoimage">
                            <div class="banner" style="background-image: url({{ asset($data->file_photo)}}) !important;">
                                <div class="overlay"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                    <h3>Header</h3>
                                    <h1>Title</h3>
                                    <h4>Sub title</h4>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
