<?PHP
if (empty($judul))
      $judul = env('APP_NAME');
?>

<div class="fq-header-wrapper" style="margin-top: -20px;">
      <div class="container">
            <img src="{{ asset('images/emblem2.png')}}" class="img-fluid mt-4 logo" alt="logo">
            @if (\Request::is('findmember/*'))
            <div class="row">
                  <div class="col-md-6 left order-md-0 order-1">
                        <h1 class="">{{strtoupper($judul)}}</h1>
                  </div>
                  <div class="col-md-6 order-md-0 order-0">
                        <a target="_blank" href="#" class="banner-img">
                              <img src="{{ asset('templates/frontend/assets/images/banner2.png')}}" class="d-block">
                        </a>
                  </div>
            </div>
            @else
            <div class="row">
                  <div class="col-md-6 left order-md-0 order-1">
                        <h1 class="">{{strtoupper($judul)}}</h1>
                  </div>
                  <div class="col-md-6 order-md-0 order-0">
                        <a target="_blank" href="#" class="banner-img">
                              <img src="{{ asset('templates/frontend/assets/images/banner.png')}}" class="d-block">
                        </a>
                  </div>
            </div>
            @endif
      </div>
</div>