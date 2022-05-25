@extends('layouts.frontend_layout.frontend_design_how_to_play')

@section('content')
    <body class="body-login">
        <div class="login-wrapper">
            <div class="container">
                <div class="welcome-slide" id="welcomeSlide1">
                    <div class="welcome-image">
                        <img class="img-fluid" src="images/welcome_1.png" alt="Images">
                    </div>
                    <ul class="welcome-dots">
                        <li class="active">
                            <span class="dots"></span>
                        </li>
                        <li>
                            <span class="dots"></span>
                        </li>
                        <li>
                            <span class="dots"></span>
                        </li>
                    </ul>
                    <div class="welcome-content">
                        <h5>Choose Competition</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s </p>
                    </div>
                    <div class="welcome-nav">
                        <a href="#" id="btnShowWelcome2" class="btn btn-light text-uppercase btn-block mb-3">Next</a>
                        <a href="{{url('/')}}" class="btn btn-outline-light text-uppercase btn-block">Skip</a>
                    </div>
                </div>
                <div class="welcome-slide" id="welcomeSlide2" style="display: none;">
                    <div class="welcome-image">
                        <img class="img-fluid" src="images/welcome_3.png" alt="Images">
                    </div>
                    <ul class="welcome-dots">
                        <li>
                            <span class="dots"></span>
                        </li>
                        <li class="active">
                            <span class="dots"></span>
                        </li>
                        <li>
                            <span class="dots"></span>
                        </li>
                    </ul>
                    <div class="welcome-content">
                        <h5>Collect Score</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s </p>
                    </div>
                    <div class="welcome-nav">
                        <a href="#" id="btnShowWelcome3" class="btn btn-light text-uppercase btn-block mb-3">Next</a>
                        <a href="{{url('/')}}" class="btn btn-outline-light text-uppercase btn-block">Skip</a>
                    </div>
                </div>
                <div class="welcome-slide" id="welcomeSlide3" style="display: none;">
                    <div class="welcome-image">
                        <img class="img-fluid" src="images/welcome_3.png" alt="Images">
                    </div>
                    <ul class="welcome-dots">
                        <li>
                            <span class="dots"></span>
                        </li>
                        <li>
                            <span class="dots"></span>
                        </li>
                        <li class="active">
                            <span class="dots"></span>
                        </li>
                    </ul>
                    <div class="welcome-content">
                        <h5>Check Leaderboard</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s </p>
                    </div>
                    <div class="welcome-nav">
                        <a href="{{url('/')}}" class="btn btn-light text-uppercase btn-block">Finish</a>
                    </div>
                </div>
            </div>
        </div>    
    </body>
@endsection