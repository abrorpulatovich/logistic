<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    @include('admin.layouts.includes.css_links')
    <title>@yield('title', 'KhanTech')</title>

</head>
<body class="hold-transition skin-blue sidebar-mini fixed">

<div class="wrapper">
    <!-- Header -->
    @include('admin.layouts.includes.header')

    @include('admin.layouts.includes.aside')

    @section('content')
    @show
    
    @include('admin.layouts.includes.footer')
</div>
<!-- ./wrapper -->

@include('admin.layouts.includes.scripts')

@section('custom_scripts')@show

</body>
</html>
