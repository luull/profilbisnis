
@extends('templates.basic.master-lp')
@section('style')
    
    
@endsection
@section('content')

    <style>
    @foreach ($data as $dt)
        @if ($dt->paralax1>0)
            .parallax1 {
                 @if (!empty($dt->bg1))
                    background-image: url({{$dt->bg1}});
                @endif
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                background-color:{{$dt->bg_color1}};
              
            }
        @else
            .parallax1{
               @if (!empty($dt->bg1))
                background-image: url({{$dt->bg1}});
                @endif
                background-size: cover;
                background-color:{{$dt->bg_color1}};

            }
        @endif
        @if ($dt->paralax2>0)
            .parallax2 {
                @if (!empty($dt->bg2))
                background-image: url({{$dt->bg2}});
                @endif
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                background-color:{{$dt->bg_color2}};
            }   
        @else
            .parallax2{
                @if (!empty($dt->bg2))
                background-image: url({{$dt->bg2}});
                @endif
                background-size: cover;
                background-color:{{$dt->bg_color2}};

            }
        @endif
        @if ($dt->paralax3>0)
    
            .parallax3 {
                @if (!empty($dt->bg3))
                background-image: url({{$dt->bg3}});
                @endif
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                background-color:{{$dt->bg_color3}};
            }
        @else
            .parallax3{
                @if (!empty($dt->bg3))
                background-image: url({{$dt->bg3}});
                @endif
                background-size: cover;
                background-color:{{$dt->bg_color3}};

            }
        @endif
        @if ($dt->paralax4>0)
    
            .parallax4 {
                @if (!empty($dt->bg4))
                background-image: url({{$dt->bg4}});
                @endif
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                background-color:{{$dt->bg_color4}};
            }
        @else
            .parallax4{
                @if (!empty($dt->bg4))
                background-image: url({{$dt->bg4}});
                @endif
                background-size: cover;
                background-color:{{$dt->bg_color4}};

            }
        @endif
    @endforeach
    
    </style>
    @foreach ($data as $dt)
        
        <section class="pt-5 pb-5 parallax1">
            <div class="container wow zoomIn " >{!!$dt->section1!!}</div>
        </section>
        <section class="pt-5 pb-5  parallax2">
            <div class="container wow zoomIn">{!!$dt->section2!!}</div>
        </section>
        <section class="pt-5 pb-5 parallax3">
            <div class="container wow zoomIn ">{!!$dt->section3!!}</div>
        </section>
        <section class="pt-5 pb-5  parallax4">
            <div class="container wow zoomIn">{!!$dt->section4!!}</div>
        </section>
    @endforeach
@endsection