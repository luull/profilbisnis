@extends('templates.2_templates.master')
@section('hero')
<section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Galeri Video</h2>
      <ol>
        <li><a href="/{{ session('data')->username }}">Home</a></li>
        {{-- <li><a href="/profil">Profil</a></li> --}}
        <li>Galeri Video</li>
      </ol>

    </div>
    </div>
  </section>
@stop
@section('content')
<section id="portfolio" class="portfolio">

    <div class="container" data-aos="fade-up">

      <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

        @foreach ($gvideo as $photo)
        <div class="col-lg-4 col-md-4">
          <div class="gallery-item">
            <a href="https://www.youtube.com/watch?v={{$photo->id_youtube}}" target="_blank" class="img-fluid youtube" alt="" id="{{$photo->id_youtube}}" class="gallery-lightbox" data-gall="{{$photo->keterangan}}">
              <img src="https://img.youtube.com/vi/{{$photo->id_youtube}}/default.jpg"  alt="" id="{{$photo->id_youtube}}"  alt="" style="width: 100%" class="img-fluid">
            </a>
          </div>
        </div>
        @endforeach
        @if(session('level')>0)
        @foreach ($video as $photo)
        <div class="col-lg-4 col-md-4">
          <div class="gallery-item">
            <a href="https://www.youtube.com/watch?v={{$photo->id_youtube}}" target="_blank" class="img-fluid youtube" alt="" id="{{$photo->id_youtube}}" class="gallery-lightbox" data-gall="{{$photo->keterangan}}">
              <img src="https://img.youtube.com/vi/{{$photo->id_youtube}}/default.jpg"  alt="" id="{{$photo->id_youtube}}"  alt="" style="width: 100%" class="img-fluid">
            </a>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
</section>
@endsection