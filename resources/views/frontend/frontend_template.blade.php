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
    <style>
        body {
        top: 0px !important; 
        }
        
        .goog-logo-link {
            display:none !important;
        } 
            
        .goog-te-gadget {
            color: transparent !important;
        }
        
        .goog-te-banner-frame.skiptranslate {
        display: none !important;
        } 
    </style>
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
        <div class="header">
            <div class="container box-wrapper">
                <div class="row">
                    <div class="col-7 header-left">
                        <ul class="logo">
                            <li>
                                <span class="logo-main">
                                    <a href="{{url('/')}}">
                                        <img class="img-fluid" src="{{asset('frontend_theme/images/logo-gemezz-white.png')}}" width="100" alt="Gemezz">
                                    </a>
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-5 header-right">
                        {{-- <div id="google_translate_element"></div> --}}
                         <ul class="bar">
                            <li>
                                <span class="bar-notif">
                                    <select name="lang" id="lang">
                                        @forelse ($languages as $lang)
                                            <option @if (config('app.locale') == $lang->short_code) selected @endif value="{{$lang->short_code}}">{{$lang->name}}</option>                                            
                                        @empty
                                            <option @if (config('app.locale') == 'end') selected @endif value="eng">English</option>                                          
                                        @endforelse
                                    </select>
                                </span>
                            </li>
                            <li>
                                <span class="bar-notif"><a id="showSearch" class="text-white d-block" style="outline: none;" href="#">
                                        <i class="h6 m-0 fas fa-search"></i>
                                    </a>
                                </span>
                            </li>
                             <li>
                                <span class="bar-profile">
                                    <a href="profile.html"><img class="img-fluid" src="{{asset('frontend_theme/images/ico_profile.png')}}" alt="Profile"></a>
                                </span>
                            </li> 
                        </ul>
                    </div>
                </div> 
                <div class="row">
                    <div class="search-box shadow" style="display: none;">
                        <form action="{{url('/search')}}" id="search-form" method="GET">
                            <div class="row">
                                <div class="col-8">
                                    @php
                                        $ph = __('lang.search_game');
                                    @endphp
                                    <input type="text" class="form-control main-search" name="q" id="search-box" name="serach_keyword" placeholder="{{$ph}}" value="{{Request::get('q')}}">
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary">{{__('lang.search')}}</button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
        @include('frontend.frontend_bottom_buttons')
        @include('components.user_msisdn_login_modal')
        {{-- <script type="text/javascript">
            function googleTranslateElementInit() {
              new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
            }
            </script>
            
            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> --}}
    </body>
    
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js" referrerpolicy="no-referrer"></script>
    <script src="{{asset('frontend_theme/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend_theme/lib/slick.min.js')}}"></script>
    <script src="{{asset('frontend_theme/js/main.js')}}"></script>
    <script src="{{asset('frontend_theme/js/common.js')}}"></script>

</html>