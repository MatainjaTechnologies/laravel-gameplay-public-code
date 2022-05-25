<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gemezz</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="{{asset('frontend_theme/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend_theme/lib/slick.css')}}">
        <link rel="stylesheet" href="{{asset('frontend_theme/lib/slick-theme.css')}}">
        <link rel="stylesheet" href="{{asset('frontend_theme/css/style.css')}}">
        <link rel="icon" href="{{asset('frontend_theme/images/logo-gemezz-white.png')}}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/css/bootstrapvalidator.min.css" rel="stylesheet">
    </head>
    @php
        $pro_active ='';
        $home_active ='';
        $comp_active ='';
        $category_active ='';

        if(Request::is('/') || Request::is('en') || Request::is('thi')){
            $home_active = 'active';
        }
        if(Request::is('competition')){
            $comp_active = 'active';
        }
        if(Request::is('winner')){
            $comp_active = 'active';
        }
        if(Request::is('category')){
            $category_active = 'active';
        }
        if(Request::is('profile')){
            $pro_active = 'active';
        }
    @endphp
    <body>
        <div class="loading align-items-center justify-content-center">
            <img src="{{asset('frontend_theme/images/loading.gif')}}" alt="Loading">
        </div>
        @yield('content')
        @include('frontend.frontend_bottom_buttons')
    </body>
    
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js" referrerpolicy="no-referrer"></script>
    <script src="{{asset('frontend_theme/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend_theme/lib/slick.min.js')}}"></script>
    <script src="{{asset('frontend_theme/js/main.js')}}"></script>
    <script src="{{asset('frontend_theme/js/common.js')}}"></script>

</html>