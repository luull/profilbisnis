@extends('templates.3_templates.master')
@section('meta')
@foreach ($data as $item)
<meta property="og:title" content="{{$item->judul}}" />
<meta property="og:image" content="{{asset($item->foto)}}" />
<meta property="og:description" content="{{$item->nama}} - {{$item->alamat}}" />
<meta property="og:type" content="website" />
@endforeach
@endsection
@section('hero')
<section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Detil Testimoni</h2>
      <ol>
        <li><a href="/{{ session('data')->username }}">Home</a></li>
        <li><a href="/testimoni/{{ Str::slug($item->nama_brg)}}">Testimoni</a></li>
        <li>Detil Testimoni</li>
      </ol>

    </div>
    </div>
  </section>
@stop
@section('content')
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row">
        @foreach ($data as $item)
            <div class="col-lg-4 entries">

                <article class="entry entry-single">
                    <div class="text-center">
                    <img src="{{ (@file_exists(public_path($item->foto))) ? asset($item->foto) : asset('images/no-image.jpg') }}" class="img-fluid" alt="{{ $item->nama_brg }}">
                    </div>
                </article>
                @include('templates.global.shared2')
            </div>
            <div class="col-lg-8 entries">
                <article class="entry entry-single">
                    <h2 class="entry-title">
                    <a href="blog-single.html">{{$item->judul}}</a>
                    
                    </h2>
                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center mb-2"><i class="bi bi-person"></i> <a href>{{$item->nama}}</a></li>
                        </ul>
                        <ul>
                        <li class="d-flex align-items-center"><i class="bi bi-geo-alt"></i> <a href>{{ $item->alamat }}</a></li>
                    </ul>
                    </div>
                    <div class="entry-content">
                    <p>
                        {!! $item->keterangan !!}
                    </p>
                    </div>
                
                </article>
            </div>
        @endforeach
        </div>
      </div>
</section>
@endsection