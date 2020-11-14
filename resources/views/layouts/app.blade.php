<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    @include('layouts.includes.stylesheets')
    <!-- Favicon Icon -->
    <link rel="icon"  type="image/png" href="/themes/site/images/favicon.png">
    <!-- Favicon Icon -->
    <title>@yield('title', 'Logistic')</title>
</head>
<body>
    <div class="preloader">
        <img src="/themes/site/images/preloader.gif" alt="">
    </div>
    <div class="box">
        <!--header top bar start-->
        @include('layouts.includes.header_top_bar')
        <!--header top bar End-->
        <!--Header middle start-->
        @include('layouts.includes.header_middle_bar')
        <!--Header middle End-->
        <!--Header Start-->
        @include('layouts.includes.header')
        <!--Header End-->
        @section('content')@show
        <!--Footer Start-->
        @include('layouts.includes.footer')
        <!--Footer End-->
    </div>

    <a href="#" id="backToTop"><i class="fa fa-angle-up"></i></a>
    @include('layouts.includes.scripts')
    @section('scripts')@show
</body>
</html>