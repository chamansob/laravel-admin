<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Admin - @yield('title') </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('backend/assets/src/assets/img/favicon.ico')}}"/>
    <link href="{{ asset('backend/assets/layouts/vertical-light-menu/css/light/loader.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/layouts/vertical-light-menu/css/dark/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('backend/assets/layouts/vertical-light-menu/loader.js')}}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('backend/assets/src/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('backend/assets/layouts/vertical-light-menu/css/light/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/src/assets/css/light/pages/error/error.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('backend/assets/layouts/vertical-light-menu/css/dark/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/src/assets/css/dark/pages/error/error.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <style>
        body.dark .theme-logo.dark-element {
            display: inline-block;
        }
        .theme-logo.dark-element {
            display: none;
        }
        body.dark .theme-logo.light-element {
            display: none;
        }
        .theme-logo.light-element {
            display: inline-block;
        }
    </style>
    
</head>
<body class="error text-center">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->
    
    
    {{ $slot }}
   
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('backend/assets/src/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>
</html>