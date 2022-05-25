<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Slypee</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/custom.css')}}">
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
    if(Request::is('competition') || Request::is('winner')){
        $comp_active = 'active';
    }
    if(Request::is('html-game')){
        $html_game_active = 'active';
    }
    if(Request::is('app') || Request::is('wallpaper')){
        $content_active = 'active';
    }
    if(Request::is('user/profile')){
        $pro_active = 'active';
    }
@endphp
<body>
    <div class="loading align-items-center justify-content-center">
        <img src="{{url('/images/loading.gif')}}" alt="Loading">
    </div>
    @php
      $link = (isset($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];;
      $link_array = explode('/',$link);
      $page = end($link_array);
      
    @endphp
    
    @if($page == 'app_list' OR $page == 'android' OR $page == 'login' OR $page == 'email' OR in_array('details',$link_array) OR in_array('more',$link_array) OR in_array('registration',$link_array) OR in_array('profile',$link_array)) 

    @else

        @include('layouts.frontend_layout.frontend_header')

    @endif 

    @yield('content')
  
    @if(in_array('details',$link_array) OR in_array('more',$link_array) OR $page == 'login' OR $page == 'email' OR in_array('registration',$link_array) OR in_array('profile',$link_array)) 

    @else

    <div class="bottom-nav">
        <div class="row no-gutters">
            <div class="col {{$home_active}}">
                <div class="nav-box">
                    <a href="{{ url('/') }}">
                        <div class="nav-box-ico home"></div>
                        <div class="nav-title">Home</div>
                    </a>
                </div>
            </div>
            <div class="col {{$comp_active}}">
                <div class="nav-box">
                    <a href="{{ url('competition') }}">
                        <div class="nav-box-ico competition"></div>
                        <div class="nav-title">Competition</div>
                    </a>
                </div>
            </div>
            <div class="col {{$html_game_active}}">
                <div class="nav-box">
                    <a href="{{ url('html-game') }}">
                        <div class="nav-box-ico html5"></div>
                        <div class="nav-title">HTML5 Game</div>
                    </a>
                </div>
            </div>
            <div class="col {{$content_active}}">
                <div class="nav-box">
                    <a href="{{ url('app') }}">
                        <div class="nav-box-ico content"></div>
                        <div class="nav-title">Content</div>
                    </a>
                </div>
            </div>
            <div class="col {{$pro_active}}">
                <div class="nav-box">
                    
                    @if(session()->has('id'))

                        <a href="{{ url('login') }}">
                            <div class="nav-box-ico profile"></div>
                            <div class="nav-title">Login{{Auth::user()->id}}</div>
                        </a>

                    @else

                        <a href="{{ url('profile') }}">
                            <div class="nav-box-ico profile"></div>
                            <div class="nav-title">Profile</div>
                        </a>

                    @endif

                </div>
            </div>
        </div>
    </div>

    @endif 
    </body>

    {{-- id="modalPurchaseOption"  --}}
    <div id="modalPurchaseOption" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="position-relative mb-4">
                        <p>Purchase with:</p>
                        <div class="button-close" data-dismiss="modal" aria-label="Close"></div>
                    </div>
                    <a href="#" id="inputMsisdn" style="margin-bottom: 10px; display: block;">
                        <div class="button-purchase-green">
                            <div class="media">
                                <img class="mr-3 img-fluid" src="images/ico_smartphone.png" alt="Icon">
                                <div class="media-body">
                                    <p class="mt-0">Daily Subscribe</p>
                                    <p class="item-price">/&nbsp;Rp.2.200</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" style="margin-bottom: 10px; display: block;">
                        <div class="button-purchase-green">
                            <div class="media">
                                <img class="mr-3 img-fluid" src="images/ico_smartphone.png" alt="Icon">
                                <div class="media-body">
                                    <p class="mt-0">Weekly Subscribe</p>
                                    <p class="item-price">/&nbsp;Rp.8.000</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" style="margin-bottom: 10px; display: block;">
                        <div class="button-purchase-green">
                            <div class="media">
                                <img class="mr-3 img-fluid" src="images/ico_smartphone.png" alt="Icon">
                                <div class="media-body">
                                    <p class="mt-0">Monthly Subscribe</p>
                                    <p class="item-price">/&nbsp;Rp.32.000</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <hr class="or">
                    <a href="#" style="margin-bottom: 10px; display: block;">
                        <div class="button-purchase-red">
                            <div class="media">
                                <img class="mr-3 img-fluid" src="images/ico_basket.png" alt="Icon">
                                <div class="media-body">
                                    <p class="mt-0">One Time Purchase</p>
                                    <p class="item-price">/&nbsp;Rp.2.200</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="InsertPhoneNumber" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="header-modal-img text-center">
                <img class="img-fluid" width="100" src="{{url('images/slypee-logo.png')}}" alt="Logo">
                <div class="button-close" data-dismiss="modal" aria-label="Close"></div>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h5 class="mb-4">Insert Your Phone Number</h5>
                    <div class="mb-4">
                        <input type="number" name="msisdn" class="form-control msisdn" placeholder="Phone Number">
                        <span class="error" style="color: red"></span>
                    </div>
                    <a  class="btn button-purchase-green text-white" id="msisdnSubmit">Submit</a>
                </div>
            </div>
        </div>
    </div>
</div>



    <div id="ExampleModalAlert" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <img class="img-fluid mb-2" width="70" src="images/ico_alert_success.png" alt="Ico">
                        <h5>Thank You!</h5>
                        <p>Your Purchase is Success</p>
                        <a data-dismiss="modal" aria-label="Close" class="btn button-purchase-green text-white">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('lib/slick.min.js')}}"></script>
<script src="{{ asset('js/main.js')}}"></script>
<script src="{{ asset('js/frontend/custom.js')}}"></script>

</html>