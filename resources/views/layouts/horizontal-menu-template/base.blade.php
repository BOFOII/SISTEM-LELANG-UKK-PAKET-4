<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title>Lelang AJA</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendor/css/vendors.min.css') }}">
    @stack('vendor-css')

    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/themes/semi-dark-layout.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendor/css/extensions/toastr.min.css') }}">
    @stack('page-css')

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('../assets/css/style.css') }}">
    <!-- END: Custom CSS-->
</head>

<body class="@yield('body_class')" data-open="hover" data-menu="horizontal-menu" data-col="@yield('body_data_col')">
    @yield('body')
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('../app-assets/vendor/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('../app-assets/vendor/js/ui/jquery.sticky.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/extensions/toastr.min.js') }}"></script>

    @stack('page-vendor-js')
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('../app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('../app-assets/js/core/app.js') }}"></script>
    @stack('theme-js')
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    @stack('page-js')
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

    @include('components.toaster')

</body>