@extends('templates.3_templates.master')
@section('hero')
<section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Galeri Foto</h2>
      <ol>
        <li><a href="/{{ session('data')->username }}">Home</a></li>
        {{-- <li><a href="/profil">Profil</a></li> --}}
        <li>Galeri Foto</li>
      </ol>

    </div>
  </section>
@stop
@section('content')
<section id="portfolio" class="portfolio">
  <div class="container" data-aos="fade-up">
    <div class="row portfolio-container">
      @foreach ($gphoto as $photo)
      <div class="col-lg-4 col-md-6 portfolio-item">
        <div class="portfolio-wrap">
          <img src="{{  asset($photo->file_photo)  }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>{{$photo->keterangan}}</h4>
            <p>{{$photo->kategori}}</p>
          </div>
          <div class="portfolio-links">
            <a href="{{  asset($photo->file_photo)  }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{$photo->keterangan}}"><i class="bi bi-plus" style="font-size: 60px"></i></a>
          </div>
        </div>
      </div>
      @endforeach
      @if(session('level')>0)
      @foreach ($photos as $photo)
      <div class="col-lg-4 col-md-6 portfolio-item">
        <div class="portfolio-wrap">
          <img src="{{  asset($photo->file_photo)  }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>{{$photo->keterangan}}</h4>
            <p>{{$photo->kategori}}</p>
          </div>
          <div class="portfolio-links">
            <a href="{{  asset($photo->file_photo)  }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{$photo->keterangan}}"><i class="bi bi-plus" style="font-size: 60px"></i></a>
          </div>
        </div>
      </div>
      @endforeach
      @endif
    </div>
  </div>
</section>

@endsection