@extends('templates.2_templates.master')
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
<section id="gallery" class="gallery">

    
  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-0">

        @foreach ($gphoto as $photo)
        <div class="col-lg-4 col-md-4">
        <div class="gallery-item">
          <a href="{{  asset($photo->file_photo)  }}" class="gallery-lightbox" data-gall="{{$photo->keterangan}}">
            <img src="{{  asset($photo->file_photo)  }}" alt="" class="img-fluid">
          </a>
        </div>
      </div>
        @endforeach
        @if(session('level')>0)
        @foreach ($photos as $photo)
        <div class="col-lg-4 col-md-4">
          <div class="gallery-item">
            <a href="{{  asset($photo->file_photo)  }}" class="gallery-lightbox" data-gall="{{$photo->keterangan}}">
              <img src="{{  asset($photo->file_photo)  }}" alt="" class="img-fluid">
            </a>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
</section>
@endsection