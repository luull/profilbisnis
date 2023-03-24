@extends('templates.3_templates.master')
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
        <div class="col-lg-4 col-md-6 portfolio-item">
          <div class="portfolio-wrap">
            <img src="https://img.youtube.com/vi/{{$photo->id_youtube}}/default.jpg" style="width: 100%"  alt="" id="{{$photo->id_youtube}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{$photo->keterangan}}</h4>
              <p>{{$photo->kategori}}</p>
            </div>
            <div class="portfolio-links">
              <a href="https://www.youtube.com/watch?v={{$photo->id_youtube}}" target="_blank" class="img-fluid youtube" alt="" id="{{$photo->id_youtube}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{$photo->keterangan}}"><i class="bi bi-plus" style="font-size: 60px"></i></a>
            </div>
          </div>
        </div>
      
        @endforeach
        @if(session('level')>0)
        @foreach ($video as $photo)
        <div class="col-lg-4 col-md-6 portfolio-item">
          <div class="portfolio-wrap">
            <img src="https://img.youtube.com/vi/{{$photo->id_youtube}}/default.jpg" style="width: 100%"  alt="" id="{{$photo->id_youtube}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{$photo->keterangan}}</h4>
              <p>{{$photo->kategori}}</p>
            </div>
            <div class="portfolio-links">
              <a href="https://www.youtube.com/watch?v={{$photo->id_youtube}}" target="_blank" class="img-fluid youtube" alt="" id="{{$photo->id_youtube}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{$photo->keterangan}}"><i class="bi bi-plus" style="font-size: 60px"></i></a>
            </div>
          </div>
        </div>
      
        @endforeach
        @endif
      </div>
    </div>
</section>
@endsection