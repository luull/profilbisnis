@extends('templates.4_mysuperboss.master')
@section('nav')
@include('templates.4_mysuperboss.nav-content')
@stop
@section('content')

<?php

$name = session('data')->username
?>
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2><a href="javascript:history.back(-1)"><i class="fa fa-angle-left"></i></a> Galeri Foto</h2>
            <ol>
                <li><a href="/{{ session('data')->username }}">Home</a></li>
                <li>Galeri Foto</li>
            </ol>
        </div>

    </div>
</section>
<section id="gallery" class="gallery">
    <div class="container">
        <div class="section-heading">
            <div class="row">
                <div class="col-md-12 pt-5">

                    <div id="js-grid-mosaic" class="cbp cbp-l-grid-mosaic">
                        @foreach ($gphoto as $photo)
                        <div class="cbp-item">
                            <a href="{{ asset($photo->file_photo)}}" class="cbp-caption cbp-lightbox">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{{ asset($photo->file_photo)}}" alt="img">
                                </div>
                                <div class="cbp-caption-activeWrap portfolio-hover-effect d-flex align-items-end">
                                    <div class="hover-text">
                                        <h4 class="p-hover-title">{{$photo->keterangan}}</h4>
                                        <p class="p-hover-des">{{$photo->katagori}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        @if(session('level')>0)
                        @foreach ($photos as $photo)
                        <div class="cbp-item">
                            <a href="{{ asset($photo->file_photo)}}" class="cbp-caption cbp-lightbox">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{{ asset($photo->file_photo)}}" alt="img">
                                </div>
                                <div class="cbp-caption-activeWrap portfolio-hover-effect d-flex align-items-end">
                                    <div class="hover-text">
                                        <h4 class="p-hover-title">{{$photo->keterangan}}</h4>
                                        <p class="p-hover-des">{{$photo->katagori}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('modal')
<!-- Modal -->
<div class="modal fade" id="modal-foto" tabindex="-1" aria-labelledby="modal-fotoLabel" aria-hidden="true" style="background:rgba(114, 179, 197, 0.6) !important;">
    <div class=" modal-dialog">
        <div class="modal-content" style="background:transparent !important;border:none !important;color:#fff !important;">
            <div class="modal-header" style="border:none !important;padding:0px !important;">
                <h5 class="modal-title" id="modal_title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle" style="color:#fff;font-size:30px;"></i></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div id="img"></div>
                    <p id="ket"></p>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
@section('script')

<script type="text/javascript">
    $(function() {
        $(".image").click(function() {
            var idnya = $(this).attr('id');
            var id = "g-" + idnya;
            var gambar = $("#" + id).html();
            var ket = $("#ket-" + idnya).html();
            $("#img").html(gambar);
            $("#modal_title").html(ket)
            $("#modal-foto").modal();
        })
        $(".image1").click(function() {
            var idnya = $(this).attr('id').split("-");
            var id = "g1-" + idnya[1];
            var gambar = $("#" + id).html();
            var ket = $("#ket1-" + idnya[1]).html();
            $("#img").html(gambar);
            $("#modal_title").html(ket)
            $("#modal-foto").modal('toggle');
        })
    })
</script>
@endsection