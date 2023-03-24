@extends('templates.3_templates.master')
@section('hero')
<section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Detil Bisnis</h2>
      <ol>
        <li><a href="/{{ session('data')->username }}">Home</a></li>
        <li><a href="/bisnis">Bisnis</a></li>
        <li>Detil Bisnis</li>
      </ol>
    </div>
    </div>
  </section>
@stop
@section('content')
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-4 entries">

            <article class="entry entry-single">
                <div class="text-center">

                <img src="{{ (@file_exists(public_path($bisnis->logo))) ? asset($bisnis->logo) : asset('images/no-business.svg') }}" class="img-fluid" style="width:200px;" alt="...">
                </div>
            </article>
            @if(!empty($count_produk))
            <a href="{{ env('APP_URL') }}/{{$link}}/produk/{{ $bisnis->slug }}" class="btn btn-main" style="width:100%;"> <i class="bi bi-bag-fill"></i> Daftar Produk</a>
            @endif
        </div>
        <div class="col-lg-8 entries">

          <article class="entry entry-single">
            <h2 class="entry-title">
              <a href="blog-single.html">{!! $bisnis->nama !!}</a>
            </h2>
            <div class="entry-content">
              <p>
                {!! $bisnis->keterangan !!}
              </p>
            </div>
          </article>
        </div>

        </div>
      </div>
    </div>
</section>
@endsection