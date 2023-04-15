@extends('admin.master')
@section('script_atas')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $('.previewimg').css("transition", "transform " + 0.02 * $('.previewimg').height() + "s ease");
</script>
@endsection
@section('style')
<style>
    input[type="radio"] {
        width: 100%;
        height: 100px;
    }

    /* 
    .form label {
        position: relative;
        color: #fff;
        background-color: transparent;
        font-size: 24px;
        text-align: center;
        height: 350px;
        line-height: 160px;
        display: block;
        cursor: pointer;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    } */
    .border {
        margin-top: -50px;
        wid
        padding: 10px;
    }

    input[type="radio"]:checked+.border .preview {
        border: 15px solid #0075ff !important;
    }

    .preview {
        position: relative;
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .preview .previewimg {
        width: 100%;
        height: auto;
    }
</style>
@endsection
@section('content')
<section class="section">
    <div class="page-header">
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="/admin/themes">Themes Profile</a></li>
            </ol>
        </nav>
    </div>
    <div class="row layout-spacing">
        <div class="col-md-12 layout-top-spacing">
            <!--container-->
            <div class="card author-box card-primary">
                <div class="card-body">
                    <form action="{{route('update_themes')}}" method="post">
                        @csrf

                        <div class="card-body">
                            @if (session('message'))
                            <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
                            @endif
                            <div class="row justify-content-end py-3 pr-4">
                                <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="far fa-save mr-2"></i>Simpan</button>
                            </div>
                            <div class="row">
                                @foreach ($themes as $theme)
                                @if ($theme->id==$profil->themes_id)

                                <div class="col-md-4 mb-5">
                                    <input type="radio" name="themes" id="{{$theme->id}}" value="{{$theme->id}}" checked>
                                    <div class="border">
                                        <div class="preview">
                                            <img class="previewimg" src="{{ asset($theme->picture)}}" />
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="col-md-4 mb-5">
                                    <input type="radio" name="themes" id="{{$theme->id}}" value="{{$theme->id}}">
                                    <div class="border">
                                        <div class="preview">
                                            <img class="previewimg" src="{{ asset($theme->picture)}}" />
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection