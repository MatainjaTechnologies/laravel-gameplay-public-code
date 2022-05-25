@extends('layouts.frontend_layout.frontend_design')

@section('content')
<div class="header-title">
        <div class="container d-flex align-items-center">
            <a href="#" class="header-title-back">
                <img class="img-fluid" src="{{ asset('images/ico_prev_white.png')}}" alt="Prev">
            </a>
            Game
        </div>
    </div>

    <div class="content-wrapper">
        <div class="container">
            <ul class="category-button">
                <li>
                    <a href="#" class="btn btn-sm main-category-btn active">
                        <img src="{{ asset('images/ico_champ.png')}}" width="18" alt="Champ">
                        Top Chart
                    </a>
                    <a href="#" class="btn btn-sm main-category-btn">Card Game</a>
                    <a href="#" class="btn btn-sm main-category-btn">Puzzle</a>
                    <a href="#" class="btn btn-sm main-category-btn">Fighting</a>
                    <a href="#" class="btn btn-sm main-category-btn">Funny</a>
                </li>
            </ul>
            <div class="row section-heading">
                <div class="col-7 text-left">
                    <p class="page-heading">Top Chart</p>
                </div>
            </div>
            <div class="row no-gutters game-list-wrapper">
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="{{ asset('images/game_4.png')}}" alt="Images">
                            <p class="game-item-title text-truncate">One Punch Man</p>
                            <div class="game-item-star star-full"></div>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="{{ asset('images/game_5.png')}}" alt="Images">
                            <p class="game-item-title text-truncate">Deus Sea</p>
                            <div class="game-item-star star-third"></div>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="{{ asset('images/game_6.png')}}" alt="Images">
                            <p class="game-item-title text-truncate">Fighter</p>
                            <div class="game-item-star star-full"></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row no-gutters game-list-wrapper">
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="{{ asset('images/game_1.png')}}" alt="Images">
                            <p class="game-item-title text-truncate">Sword Art</p>
                            <div class="game-item-star star-full"></div>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="{{ asset('images/game_2.png')}}" alt="Images">
                            <p class="game-item-title text-truncate">Castle</p>
                            <div class="game-item-star star-third"></div>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="{{ asset('images/game_3.png')}}" alt="Images">
                            <p class="game-item-title text-truncate">Candy Cat</p>
                            <div class="game-item-star star-full"></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row no-gutters game-list-wrapper">
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="{{ asset('images/game_4.png')}}" alt="Images">
                            <p class="game-item-title text-truncate">One Punch Man</p>
                            <div class="game-item-star star-full"></div>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="{{ asset('images/game_5.png')}}" alt="Images">
                            <p class="game-item-title text-truncate">Deus Sea</p>
                            <div class="game-item-star star-third"></div>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="{{ asset('images/game_6.png')}}" alt="Images">
                            <p class="game-item-title text-truncate">Fighter</p>
                            <div class="game-item-star star-full"></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row no-gutters game-list-wrapper">
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="{{ asset('images/game_1.png')}}" alt="Images">
                            <p class="game-item-title text-truncate">Sword Art</p>
                            <div class="game-item-star star-full"></div>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="{{ asset('images/game_2.png')}}" alt="Images">
                            <p class="game-item-title text-truncate">Castle</p>
                            <div class="game-item-star star-third"></div>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="{{ asset('images/game_3.png')}}" alt="Images">
                            <p class="game-item-title text-truncate">Candy Cat</p>
                            <div class="game-item-star star-full"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
