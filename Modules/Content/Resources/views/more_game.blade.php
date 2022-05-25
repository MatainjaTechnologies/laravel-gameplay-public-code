@extends('layouts.frontend_layout.frontend_design')

@section('content')
  <div class="header-title">
        <div class="container d-flex align-items-center">
            <a href="{{ url('/') }}" class="header-title-back">
                <img class="img-fluid" src="{{url('images/ico_prev_white.png')}}" alt="Prev">
            </a>
            Game
        </div>
    </div>

    <div class="content-wrapper">
        <div class="container">
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
            <div class="row section-heading">
                <div class="col-7 text-left">
                    <p class="page-heading">Top Chart</p>
                </div>
            </div>

                <span class="appgamecateBlock"> 
                @if(count($application)>0)
                    <div class="row no-gutters game-list-wrapper">
                    @php $i=1 @endphp
                    @foreach($application as $wallpapers)
                    
                            <div class="col-4">
                                <div class="game-item">
                                    <a href="{{ url('app/game/details/'.$wallpapers['uuid']) }}">
                                       @if (file_exists( public_path().'/uploads/application/'.$wallpapers['uuid'].'/image/'.$wallpapers['image']))
                                             <img class="img-fluid game-item-pic" src="{{url('uploads/application/'.$wallpapers['uuid'].'/image/'.$wallpapers['image'])}}" alt="Images">
                                       @else
                                            <img class="img-fluid game-item-pic" src="{{url('images/no_game.jpg')}}" alt="Images">
                                        @endif 

                                        <p class="game-item-title text-truncate">{{ucfirst($wallpapers['name'])}}</p>
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
