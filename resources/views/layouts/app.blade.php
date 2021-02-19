<!DOCTYPE html>
@php
    $locale = app()->getLocale();
@endphp
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="{{ $locale == 'en' ? 'ltr' : 'rtl' }}">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>{{ config('app.name', 'Baitna Depot') }}</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/favicon/apple-touch-icon-152x152.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/favicon/Ofavicon-32x32.png') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@if($locale == 'en')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/vendors.min.css') }}">
    <!-- data tables starts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/data-tables/css/select.dataTables.min.css') }}">
    <!-- data tables ends -->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/vertical-dark-menu-template/materialize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/vertical-dark-menu-template/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/data-tables.css')}}">
    <!-- toaster -->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/toastr/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/toastr/toastr.css') }}">

    @yield('styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/custom/custom.css') }}">
@else
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/vendors-rtl.min.css') }}">
    <!-- data tables starts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/data-tables/css/select.dataTables.min.css') }}">
    <!-- data tables ends -->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/style-rtl.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/themes/vertical-dark-menu-template/materialize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/themes/vertical-dark-menu-template/style.css') }}">
    <!-- Data tables -->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/data-tables.css')}}">

    @yield('styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/custom/custom.css') }}">
@endif
</head>
<!-- END: Head-->

<body class="vertical-layout page-header-light vertical-menu-collapsible preload-transitions 2-columns" data-open="click" data-menu="vertical-dark-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('layouts.header')
    <!-- END: Header-->

    <!-- BEGIN: SideNav-->
    @include(Auth::guard('admin')->check() ? 'admin.layouts.navigation' : 'layouts.navigation')
    <!-- END: SideNav-->

    <!-- BEGIN: Page Main-->
    <div id="main">
        @include('layouts.flash-message')
        @include('layouts.toast')
        @yield('content')
    </div>
    <!-- END: Page Main-->

    <!-- BEGIN: Footer-->
    @include('layouts.footer')
    @include('layouts.scripts')
    {{-- @include('layouts.sweetalert') --}}

    @if(Session::has('success'))
    <script>
       toastr.success("{{session('success')}}")
    </script>
    @endif
    @if(Session::has('error'))
    <script>
        toastr.error("{{session('error')}}")
    </script>
    @endif
    @if(Session::has('warning'))
    <script>
        toastr.warning("{{session('warning')}}")
    </script>
    @endif
    <style>
        #dropdown1{
            width: 180px !important;
        }
        #dropdown1  li a{
           color: dimgray !important;
        }
        #dropdown1 i{
            font-size: 20px !important;
            color: dimgray !important;
        }
        .dropdown-trigger i{
            color: dimgray !important;
        }


    </style>
</body>
</html>
