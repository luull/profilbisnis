@extends('templates.1_templates.master')
@section('hero')
<section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="/{{ session('data')->username }}">Home</a></li>
        {{-- <li><a href="/profil">Profil</a></li> --}}
        <li>Testimoni</li>
      </ol>
      <h2>Testimoni</h2>

    </div>
  </section>
@stop
@section('content')
<section id="team" class="team">

    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center gy-4">
        @foreach ($data1 as $item)
        <a href="{{ env('APP_URL') }}/testimoni1/detil/{{ session('data')->username }}/{{$item->id}}">
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="member">
            <div class="member-img">
                @if(!empty($item->foto))
                    <img src="{{asset($item->foto)}}" class="img-fluid" alt="">
                @else
                    <img src="{{asset('images/no-image.jpg')}}" class="img-fluid" alt="">
                @endif
             
            </div>
            <div class="member-info">
              <h4>{{$item->judul}}</h4>
              <span>{{$item->alamat}}</span>
              <p style="font-style: normal;">{{$item->nama}}</p>
            </div>
          </div>
        </div>
        </a>
        @endforeach
        @foreach ($data as $item)
        <a href="{{ env('APP_URL') }}/testimoni/detil/{{ session('data')->username }}/{{$item->id}}">
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="member">
            <div class="member-img">
                @if(!empty($item->foto))
                    <img src="{{asset($item->foto)}}" class="img-fluid" alt="">
                @else
                    <img src="{{asset('images/no-image.jpg')}}" class="img-fluid" alt="">
                @endif
             
            </div>
            <div class="member-info">
              <h4>{{$item->judul}}</h4>
              <span>{{$item->nama}}</span>
              <p>{{$item->alamat}}</p>
            </div>
          </div>
        </div>
        </a>
        @endforeach
      </div>
    </div>
</section>
@endsection