@extends('layouts.frontend_layout.frontend_design')

@section('content')
   <div class="custom-tabs">
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('content') }}">Game & App</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ url('wallpaper') }}">Wallpaper & Video</a>
            </li>
        </ul>
    </div>

    <div class="content-wrapper">
        <div class="container">
            <div class="row section-heading">
                <div class="col-7 text-left">
                    <p class="page-heading">Game</p>
                </div>
                <div class="col-5 text-right">
                    <a href="android-game.html" class="heading-link">See More</a>
                </div>
            </div>
                @if(count($category)>0)
                @php $count =1; @endphp
                <ul class="category-button">
                    <li>
                        @foreach($category as $cat)  
                            <a href="javascript:void(0)" class="catDetails btn btn-sm main-category-btn @if($count == 1) active @endif" data-id="{{$cat['id']}}">
                                {{$cat['name']}}
                            </a>
                        @php $count++; @endphp    
                        @endforeach    
                    </li>
                </ul>
                @endif

            <span class="cateBlock"> 
                @if(count($games)>0)
                    @php $i=1 @endphp
                    @foreach($games as $game)
                       
                            @if($i  ==  1)
                            <div class="row no-gutters game-list-wrapper">
                             @endif

                            <div class="col-4">
                                <div class="game-item">
                                    <a href="#">
                                       @if (file_exists( public_path().'/application/'.$game['uuid'].'/image/'.$game['image']))
                                             <img class="img-fluid game-item-pic" src="{{url('application/'.$game['uuid'].'/image/'.$game['image'])}}" alt="Images">
                                       @else
                                            <img class="img-fluid game-item-pic" src="{{url('images/no_game.jpg')}}" alt="Images">
                                        @endif 

                                        <p class="game-item-title text-truncate">{{ucfirst($game['name'])}}</p>
                                        <div class="game-item-star star-third"></div>
                                    </a>
                                </div>
                            </div>
                            @if($i%3  ==  0)
                                </div>
                                <div class="row no-gutters game-list-wrapper">
                            @endif
                            @php $i++ @endphp

                    @endforeach
                @endif
            </span>
            
        </div>
        <div class="section-divider"></div>
        <div class="container">
            <div class="row section-heading">
                <div class="col-7 text-left">
                    <p class="page-heading">App</p>
                </div>
                <div class="col-5 text-right">
                    <a href="app-list.html" class="heading-link">See More</a>
                </div>
            </div>
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
