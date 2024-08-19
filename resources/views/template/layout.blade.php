<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="@if ($title === ''){{ __('lang.title') }} (STMIK Bandung)@else{{ $title }} | {{ __('lang.title') }} (STMIK Bandung)@endif">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="E8IC2-u3MywJiOkJYJ8BJRmf65LWtQkRlf_72G4xjgc">
    <meta property="og:site_name" content="STMIK Bandung | Knowledge & Enterpreneurship University" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ __('lang.title') }}" />
    <meta property="og:description" content="@if ($title === ''){{ __('lang.title') }} (STMIK Bandung)@else{{ $title }} | {{ __('lang.title') }} (STMIK Bandung)@endif" />
    <meta property="og:url" content="{{ URL::current() }}" />
    <meta property="og:image" content="{{ URL::to('assets/img/core-img/logo.png') }}" />

    <!-- Title -->
    <title>
        @if ($title === '')
        {{ __('lang.title') }} (STMIK Bandung)
        @else
        {{ $title }} - {{ __('lang.title') }} (STMIK Bandung)
        @endif
    </title>

    <link rel="canonical" href="{{ URL::current() }}" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/core-img/logo2.png') }}">

    <!-- Font Awesome 5 -->
    <script src="https://kit.fontawesome.com/9cd24b794f.js" crossorigin="anonymous"></script>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>

<body class="bg-light">
    @include('template.preloader')
    @include('template.search')
    @include('template.videoDetail')
    @include('template.header')

    @yield('content')

    @include('template.footer')

    <!-- jQuery-2.2.4 js -->
    <script src="{{ asset('assets/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- Instafeed -->
    <script src="https://cdn.jsdelivr.net/gh/stevenschobert/instafeed.js@2.0.0rc1/src/instafeed.min.js"></script>
    <!-- All Plugins js -->
    <script src="{{ asset('assets/js/plugins/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('assets/js/active.js') }}"></script>
    <!-- Ionicons js -->
    <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
    <!-- Custom Js-->
    
</body>