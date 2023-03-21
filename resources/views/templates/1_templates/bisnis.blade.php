@extends('templates.1_templates.master')
@section('hero')
<section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="/{{ session('data')->username }}">Home</a></li>
        {{-- <li><a href="/profil">Profil</a></li> --}}
        <li>Bisnis</li>
      </ol>
      <h2>Bisnis</h2>

    </div>
  </section>
@stop
@section('content')
@if (count($bisnis_default)>=1 or count($bisnis)>=1 )
  <section id="services" class="services">

    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center gy-4" style="display: flex;flex-wrap: wrap;">
        @foreach ($bisnis_default as $bs)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-box blue">
            <img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:150px;height:auto;">
            <hr>
            <h3>{{ $bs->nama }}</h3>
            {{-- <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p> --}}
            <a href="/bisnis1/{{$bs->slug}}" class="read-more"><span>Detil Bisnis</span> <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
        @endforeach
        @if(session('level')>0)
        @foreach ($bisnis as $bs)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-box blue">
              <img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:150px;height:auto;">
              <hr>
              <h3>{{ $bs->nama }}</h3>
              {{-- <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p> --}}
              <a href="/bisnis/{{$bs->slug}}" class="read-more"><span>Detil Bisnis</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        @endforeach
        @endif
      </div>
      
    </div>
  </section>
  @endif
@endsection