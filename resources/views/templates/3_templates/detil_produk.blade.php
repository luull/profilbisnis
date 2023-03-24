@extends('templates.3_templates.master')
@section('meta')
<meta property="og:title" content="{{ $produk->nama_brg }}" />
<meta property="og:image" content="{{ (@file_exists(public_path($produk->foto))) ? asset($produk->foto) : asset('images/no-product.svg') }}" />
<meta property="og:description" content="{{ $produk->keterangan_singkat }}" />
<meta property="og:type" content="website" />
@endsection
@section('hero')
<section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Detil Produk</h2>
      <ol>
        <li><a href="/{{ session('data')->username }}">Home</a></li>
        <li><a href="/produk">Produk</a></li>
        <li>Detil Produk</li>
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

                <img src="{{ (@file_exists(public_path($produk->foto))) ? asset($produk->foto) : asset('images/no-product.svg') }}" class="img-fluid" alt="{{ $produk->nama_brg }}">
                </div>
            </article>
     
            <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template }} <?PHP echo  str_replace(" ", "%20", $produk->nama_brg); ?>" target="_blank"class="btn btn-main" style="width:100%;"> <i class="bi bi-cart-plus"></i> Beli</a>
        
        </div>
        <div class="col-lg-8 entries">

          <article class="entry entry-single">
            <h2 class="entry-title">
              <a href="blog-single.html">{{ $produk->nama_brg }}</a>
              <h2>Rp.{{ number_format($produk->harga)}}</h2>
            </h2>
            <div class="entry-content">
              <p>
                {!! $produk->keterangan !!}
              </p>
            </div>
            <hr>
            @if(!empty($testimoni))
                <a href="{{ env('APP_URL') }}/testimoni/{{$produk->slug}}" class="btn btn-outline-main mt-auto"><span> <i class="bi bi-quote"></i> Testimoni</span></a>
            @endif
          </article>
        </div>

        </div>
      </div>
    </div>
</section>
@endsection