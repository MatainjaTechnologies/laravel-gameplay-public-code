<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Slypee</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('lib/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('lib/slick-theme.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
@php 
    $home_active ='';
    $comp_active ='';
    $html_game_active ='';
    $content_active ='';
    $pro_active ='';

    if(Request::is('/')){
        $home_active = 'active';
    }
    if(Request::is('competition')){
        $comp_active = 'active';
    }
    if(Request::is('html-game')){
        $html_game_active = 'active';
    }
    if(Request::is('content')){
        $content_active = 'active';
    }
    if(Request::is('user/profile')){
        $pro_active = 'active';
    }
@endphp

@yield('content')

<script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('lib/slick.min.js')}}"></script>
<script src="{{ asset('js/main.js')}}"></script>
<script src="{{ asset('js/frontend/custom.js')}}"></script>

</html>