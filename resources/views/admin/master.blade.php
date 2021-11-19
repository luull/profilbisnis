<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>
  <link href="{{ asset('templates/new-admin/assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
  <script src="{{ asset('templates/new-admin/assets/js/loader.js')}}"></script>

  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="{{ asset('templates/new-admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('templates/new-admin/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
  <!-- END GLOBAL MANDATORY STYLES -->

  <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
  <link href="{{ asset('templates/new-admin/plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('templates/new-admin/assets/css/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" class="dashboard-analytics" />
  <link rel="stylesheet" type="text/css" href="{{ asset('templates/new-admin/plugins/select2/select2.min.css')}}">
  <link href="{{ asset('templates/new-admin/assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('templates/new-admin/plugins/table/datatable/datatables.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('templates/new-admin/plugins/table/datatable/custom_dt_html5.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('templates/new-admin/plugins/table/datatable/dt-global_style.css')}}">
  <link href="{{ asset('templates/new-admin/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('templates/new-admin/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('templates/new-admin/assets/css/widgets/modules-widgets.css')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
  @yield('style')
  @yield('script_atas')

</head>

<body>
  <div id="load_screen">
    <div class="loader">
      <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
      </div>
    </div>
  </div>
  <!--**********************************
        Main wrapper start
    ***********************************-->
  @include('admin.header')

  <div class="main-container" id="container">
    @include('admin.sidebar')
    <div id="content" class="main-content">
      <div class="layout-px-spacing">
        @yield('content_title')
        @yield('content')
      </div>
      <div class="footer-wrapper">
        <div class="footer-section f-section-1">
          <p class="">Copyright © 2021 <a target="_blank" href="#">Profil Bisnis</a>, All rights reserved.</p>
        </div>

      </div>
    </div>
  </div>

  <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
  <script src="{{ asset('templates/new-admin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
  <script src="{{ asset('templates/new-admin/bootstrap/js/popper.min.js')}}"></script>
  <script src="{{ asset('templates/new-admin/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('templates/new-admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
  <script src="{{ asset('templates/new-admin/assets/js/app.js')}}"></script>
  <script>
    $(document).ready(function() {
      App.init();
    });
  </script>
  <script src="{{ asset('templates/new-admin/assets/js/custom.js')}}"></script>
  <script src="{{ asset('templates/new-admin/plugins/apex/apexcharts.min.js')}}"></script>
  <script src="{{ asset('templates/new-admin/assets/js/dashboard/dash_1.js')}}"></script>

  <script src="{{ asset('templates/new-admin/assets/js/scrollspyNav.js')}}"></script>
  <script src="{{ asset('templates/new-admin/plugins/select2/select2.min.js')}}"></script>
  <script src="{{ asset('templates/new-admin/plugins/select2/custom-select2.js')}}"></script>
  <script src="{{ asset('templates/new-admin/plugins/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
  <script src="{{ asset('templates/new-admin/plugins/bootstrap-maxlength/custom-bs-maxlength.js')}}"></script>
  <script src="{{ asset('templates/new-admin/plugins/table/datatable/datatables.js')}}"></script>
  <script src="{{ asset('templates/new-admin/assets/js/widgets/modules-widgets.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js" integrity="sha512-cyAbuGborsD25bhT/uz++wPqrh5cqPh1ULJz4NSpN9ktWcA6Hnh9g+CWKeNx2R0fgQt+ybRXdabSBgYXkQTTmA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $('#zero-config').DataTable({
      "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
      "oLanguage": {
        "oPaginate": {
          "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
          "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
        },
        "sInfo": "Showing page _PAGE_ of _PAGES_",
        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
        "sSearchPlaceholder": "Search...",
        "sLengthMenu": "Results :  _MENU_",
      },
      "stripeClasses": [],
      "lengthMenu": [7, 10, 20, 50],
      "pageLength": 7
    });
  </script>
  <script src="{{ asset('templates/admin/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
  <script src="{{ asset('templates/admin/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
  <script src="{{ asset('templates/admin/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
  <script src="{{ asset('templates/admin/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
  <script>
    $('#html5-extension').DataTable({
      "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
      buttons: {
        buttons: [{
            extend: 'copy',
            className: 'btn btn-sm'
          },
          {
            extend: 'csv',
            className: 'btn btn-sm'
          },
          {
            extend: 'excel',
            className: 'btn btn-sm'
          },
          {
            extend: 'print',
            className: 'btn btn-sm'
          }
        ]
      },
      "oLanguage": {
        "oPaginate": {
          "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
          "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
        },
        "sInfo": "Showing page _PAGE_ of _PAGES_",
        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
        "sSearchPlaceholder": "Search...",
        "sLengthMenu": "Results :  _MENU_",
      },
      "stripeClasses": [],
      "lengthMenu": [7, 10, 20, 50],
      "pageLength": 7
    });
  </script>
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