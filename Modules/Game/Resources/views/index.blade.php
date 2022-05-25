@extends('layouts.frontend_layout.frontend_design')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <ul class="category-button">
                <li>
                    <a href="#" class="btn btn-sm main-category-btn active">
                        <img src="images/ico_champ.png" width="18" alt="Champ">
                        Top Chart
                    </a>
                    <a href="#" class="btn btn-sm main-category-btn">War</a>
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
                            <img class="img-fluid game-item-pic" src="images/game_html_1.png" alt="Images">
                            <p class="game-item-title text-truncate">Lethal Sniper</p>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="images/game_html_2.png" alt="Images">
                            <p class="game-item-title text-truncate">Monster Killer</p>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="images/game_html_3.png" alt="Images">
                            <p class="game-item-title text-truncate">Snake Blocks</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row no-gutters game-list-wrapper">
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="images/game_html_4.png" alt="Images">
                            <p class="game-item-title text-truncate">Garden Match</p>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="images/game_html_5.png" alt="Images">
                            <p class="game-item-title text-truncate">Jewel Blocks 2</p>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="images/game_html_6.png" alt="Images">
                            <p class="game-item-title text-truncate">Castle Defense</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row no-gutters game-list-wrapper">
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="images/game_html_7.png" alt="Images">
                            <p class="game-item-title text-truncate">Flying Puzzle</p>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="images/game_html_8.png" alt="Images">
                            <p class="game-item-title text-truncate">Slicer</p>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="game-item">
                        <a href="#">
                            <img class="img-fluid game-item-pic" src="images/game_html_9.png" alt="Images">
                            <p class="game-item-title text-truncate">Find the Pearl</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
