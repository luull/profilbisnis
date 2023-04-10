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
    <link href="{{ asset('templates/new-admin/assets/css/authentication/form-1.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/new-admin/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/new-admin/assets/css/forms/switches.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/new-admin/assets/css/style.css')}}">
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
    @yield('content')
    <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">Copyright © 2023 <a target="_blank" href="#">Profil Bisnis</a>, All rights reserved.</p>
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
    @yield('script')
</body>

</html>