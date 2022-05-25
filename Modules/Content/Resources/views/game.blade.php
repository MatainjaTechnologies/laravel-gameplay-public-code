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
                    <a href="{{ url('/app/game/more')}}" class="heading-link">See More</a>
                </div>
            </div>
                @if(count($wallcategory)>0)
                @php $count =1; @endphp
                <ul class="category-button">
                    <li>
                        @foreach($wallcategory as $cat)  
                            <a href="javascript:void(0)" class="getDetailsById btn btn-sm main-category-btn @if($count == 1) active @endif" data-id="{{$cat['id']}}" data-type="application" data-application="game" data-block="appgame">
                                {{$cat['name']}}
                            </a>
                        @php $count++; @endphp    
                        @endforeach    
                    </li>
                </ul>
                @endif

                <span class="appgamecateBlock"> 
                @if(count($application)>0)
                    <div class="row no-gutters game-list-wrapper">
                    @php $i=1 @endphp
                    @foreach($application as $applications)
                    
                            <div class="col-4">
                                <div class="game-item">
                                    <a href="{{ url('app/game/details/'.$applications['uuid']) }}">
                                       @if (file_exists( public_path().'/uploads/application/'.$applications['uuid'].'/image/'.$applications['image']))
                                             <img class="img-fluid game-item-pic" src="{{url('uploads/application/'.$applications['uuid'].'/image/'.$applications['image'])}}" alt="Images">
                                       @else
                                            <img class="img-fluid game-item-pic" src="{{url('images/no_game.jpg')}}" alt="Images">
                                        @endif 

                                        <p class="game-item-title text-truncate">{{ucfirst($applications['name'])}}</p>
                                        <div class="game-item-star star-third"></div>
                                    </a>
                                </div>
                            </div>                            
                            @php $i++ @endphp
                    @endforeach
                    </div>
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
                    <a href="{{ url('/app/more')}}" class="heading-link">See More</a>
                </div>
            </div>
            @if(count($appscategory)>0)
                @php $count =1; @endphp
                <ul class="category-button">
                    <li>
                        @foreach($appscategory as $cat)  
                            <a href="javascript:void(0)" class="getDetailsById btn btn-sm main-category-btn @if($count == 1) active @endif" data-id="{{$cat['id']}}" data-type="application" data-application="software" data-block="apps">
                                {{$cat['name']}}
                            </a>
                        @php $count++; @endphp    
                        @endforeach    
                    </li>
                </ul>
                @endif

                <span class="appscateBlock"> 
                @if(count($app)>0)
                    <div class="row no-gutters game-list-wrapper">
                    @php $i=1 @endphp
                    @foreach($app as $applications)
                    
                            <div class="col-4">
                                <div class="game-item">
                                    <a href="{{ url('app/details/'.$applications['uuid']) }}">
                                       @if (file_exists( public_path().'/uploads/application/'.$applications['uuid'].'/image/'.$applications['image']))
                                             <img class="img-fluid game-item-pic" src="{{url('uploads/application/'.$applications['uuid'].'/image/'.$applications['image'])}}" alt="Images">
                                       @else
                                            <img class="img-fluid game-item-pic" src="{{url('images/no_game.jpg')}}" alt="Images">
                                        @endif 

                                        <p class="game-item-title text-truncate">{{ucfirst($applications['name'])}}</p>
                                        <div class="game-item-star star-third"></div>
                                    </a>
                                </div>
                            </div>                            
                            @php $i++ @endphp
                    @endforeach
                    </div>
                @endif
            </span>

        </div>
    </div>
@endsection
