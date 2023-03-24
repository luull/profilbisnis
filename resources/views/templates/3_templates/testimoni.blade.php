@extends('templates.3_templates.master')
@section('hero')
<section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Testimoni</h2>
      <ol>
        <li><a href="/{{ session('data')->username }}">Home</a></li>
        {{-- <li><a href="/profil">Profil</a></li> --}}
        <li><a href="/produk">Produk</a></li>
        <li>Testimoni</li>
      </ol>

    </div>
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
              <br>
              <h4>{{$item->judul}}</h4>
              <hr>
              <p class="mb-0" style="font-style: normal;">{{$item->nama}}</p>
              <small class="text-muted">{{$item->alamat}}</small>
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
              <br>
              <h4>{{$item->judul}}</h4>
              <hr>
              <p class="mb-0" style="font-style: normal;">{{$item->nama}}</p>
              <small class="text-muted">{{$item->alamat}}</small>
            </div>
          </div>
        </div>
        </a>
        @endforeach
      </div>
    </div>
</section>
@endsection