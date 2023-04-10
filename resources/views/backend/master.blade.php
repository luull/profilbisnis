<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('templates/admin/assets/css/app.min.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('templates/admin/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('templates/admin/assets/css/components.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/v4-shims.min.css" integrity="sha512-p++g4gkFY8DBqLItjIfuKJPFvTPqcg2FzOns2BNaltwoCOrXMqRIOqgWqWEvuqsj/3aVdgoEo2Y7X6SomTfUPA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('templates/admin/assets/css/custom.css')}}">
  <link rel="icon" href="{{ asset('favicon.png')}}" type="image/x-generic">
  <link rel="shortcut icon" href="{{ asset('favicon.png')}}" type="image/x-generic">
    @yield('style')
    @yield('script_atas')

</head>

<body>

   <div class="loader"></div>
   <div id="app"> 
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div class="main-wrapper main-wrapper-1">

       @include('backend.header')

        @include('backend.sidebar')

       
       

      
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="main-content">

            @yield('content_title')
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
       <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2021 MySuperBoss.Com<div class="bullet"></div> Developed By <a href="https://solusi-it.com">Solusi-IT</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="{{ asset('templates/admin/assets/js/app.min.js')}}"></script>
 
  <!-- JS Libraies -->
  <script src="{{ asset('templates/admin/assets/bundles/chartjs/chart.min.js')}}"></script>
  <script src="{{ asset('templates/admin/assets/bundles/apexcharts/apexcharts.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ asset('templates/admin/assets/js/page/index.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{ asset('templates/admin/assets/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('templates/admin/assets/js/custom.js')}}"></script>

    @yield('script')
</body>
<div class="modal" tabindex="-1" role="dialog" id="mymodal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" id="btnOk" class="btn btn-primary">Save changes</button>
          <button type="button" id="btnClose" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</html>