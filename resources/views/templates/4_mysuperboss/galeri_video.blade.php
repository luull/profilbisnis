@extends('templates.4_mysuperboss.master')
@section('nav')
@include('templates.4_mysuperboss.nav-content')
@stop

@section('content')

<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2><a href="javascript:history.back(-1)"><i class="fa fa-angle-left"></i></a> Galeri Video</h2>
            <ol>
                <li><a href="/{{session('data')->username}}">Home</a></li>
                <li>Galeri Video</li>
            </ol>
        </div>

    </div>
</section>

<section class="section">
    <div class="container">
        <div class="col-sm-12 col-md-12 ">
            <div class="row">

                @foreach ($gvideo as $photo)
                <div class="col-md-6 col-lg-4 py-4" data-aos="zoom-in" data-aos-delay="100" id="t-{{$photo->id}}">
                    <div class="gallery-container">
                        <img src="https://img.youtube.com/vi/{{$photo->id_youtube}}/0.jpg" class="img-fluid youtube" alt="" id="{{$photo->id_youtube}}" style="cursor:pointer" alt="">

                        <div class="overlay">
                            <p class="text p-2">
                                <span id="ket-{{$photo->id_youtube}}">{{$photo->judul}}</span><br>
                                <span class="small">{{$photo->katagori}}</span>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                @if (session('level')>0)
                @foreach ($video as $photo)
                <div class="col-md-6 col-lg-4 py-4" data-aos="zoom-in" data-aos-delay="100" id="t-{{$photo->id}}">
                    <div class="gallery-container">
                        <img src="https://img.youtube.com/vi/{{$photo->id_youtube}}/0.jpg" class="img-fluid youtube" alt="" id="{{$photo->id_youtube}}" style="cursor:pointer" alt="">

                        <div class="overlay">
                            <p class="text p-2">
                                <span id="ket-{{$photo->id_youtube}}">{{$photo->judul}}</span><br>
                                <span class="small">{{$photo->katagori}}</span>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@section('modal')
<div class="modal fade" id="modal-video" tabindex="-1" aria-labelledby="modal-fotoLabel" aria-hidden="true" style="background:rgba(0, 0, 0, 0.4) !important;">
    <div class=" modal-dialog">
        <div class="modal-content" style="background:transparent !important;border:none !important;color:#fff !important;">
            <div class="modal-header" style="border:none !important;padding:0px !important;">
                <h5 class="modal-title" id="modal_title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle" style="color:#fff;font-size:30px;"></i></button>
            </div>
            <div class="modal-body" id="modal-body">
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
        $(".youtube").click(function() {
            var id = $(this).attr('id');
            $("#ym_id").val(id);
            // var url="https://www.youtube.com/embed/" + id + "?rel=0&amp;showinfo=0";
            var mbed = '<iframe id="videoPlayer" class="videoPlayer" style="overflow: hidden !important;min-height:250px !important;" src="https://www.youtube.com/embed/' + id + '?autoplay=1&rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>';
            var ket = $("#ket-" + id).html();
            $("#modal-body").html(mbed);
            $("#modal_title").html(ket)
            $('#modal-video').modal('toggle')

        })
        $(".team-member-content").click(function() {
            var idnya = $(this).attr('id').split("-");
            var id = "g-" + idnya[1];
            var gambar = $("#" + id).html();
            var ket = $("#ket-" + idnya[1]).html();
            $("#modal-body").html(gambar);
            $("#modal_title").html(ket)
            $("#modal-video").modal();

        })
        $("#btnStop").click(function() {
            pausevideo();
            $('#modal-video').modal('toggle');
        })

        $("#close").click(function() {

            var id = $("#ym_id").val();
            // var url="https://www.youtube.com/embed/" + id + "?rel=0&amp;showinfo=0";
            var mbed = '<iframe id="videoPlayer" class="videoPlayer" style="width:auto ;height:auto;min-width:475px; min-height:315px;overflow:auto" src="https://www.youtube.com/embed/' + id + '?autoplay=0&rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>';

            var ket = $("#ket-" + id).html();
            $("#modal-body").html(mbed);
            $('#modal-video').modal('toggle');

        })

    })
</script>
@endsection