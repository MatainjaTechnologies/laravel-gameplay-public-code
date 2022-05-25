@extends('layouts.frontend_layout.frontend_design')
@section('content')
       <div class="header-title">
        <div class="container d-flex align-items-center">
            <a href="#" class="header-title-back">
                <img class="img-fluid" src="images/ico_prev_white.png" alt="Prev">
            </a>
            App
        </div>
    </div>

    <div class="content-wrapper">
        <div class="container">
            <ul class="category-button">
                <li>
                    <a href="#" class="btn btn-sm main-category-btn active">
                        <img src="images/ico_champ.png" width="18" alt="Champ">
                        Top App
                    </a>
                    <a href="#" class="btn btn-sm main-category-btn">Education</a>
                    <a href="#" class="btn btn-sm main-category-btn">News</a>
                    <a href="#" class="btn btn-sm main-category-btn">Social Media</a>
                    <a href="#" class="btn btn-sm main-category-btn">Life Style</a>
                </li>
            </ul>
            <div class="row section-heading">
                <div class="col-7 text-left">
                    <p class="page-heading">Top App</p>
                </div>
            </div>
            <div class="row no-gutters game-list-wrapper">
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="images/app_bigo.png" alt="Images">
                            <p class="game-item-title text-truncate">Bigo Live</p>
                            <div class="game-item-star star-third"></div>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="images/app_luluchat.png" alt="Images">
                            <p class="game-item-title text-truncate">Lulu Chat</p>
                            <div class="game-item-star star-third"></div>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="images/app_mangolive.png" alt="Images">
                            <p class="game-item-title text-truncate">Mango Live</p>
                            <div class="game-item-star star-third"></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row no-gutters game-list-wrapper">
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="images/app_skype.png" alt="Images">
                            <p class="game-item-title text-truncate">Skype</p>
                            <div class="game-item-star star-full"></div>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="images/app_wa.png" alt="Images">
                            <p class="game-item-title text-truncate">WhatsApp</p>
                            <div class="game-item-star star-full"></div>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="images/app_mangolive.png" alt="Images">
                            <p class="game-item-title text-truncate">Mango Live</p>
                            <div class="game-item-star star-third"></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row no-gutters game-list-wrapper">
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="images/app_bigo.png" alt="Images">
                            <p class="game-item-title text-truncate">Bigo Live</p>
                            <div class="game-item-star star-third"></div>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="images/app_luluchat.png" alt="Images">
                            <p class="game-item-title text-truncate">Lulu Chat</p>
                            <div class="game-item-star star-third"></div>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="images/app_mangolive.png" alt="Images">
                            <p class="game-item-title text-truncate">Mango Live</p>
                            <div class="game-item-star star-third"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
