@extends('layouts.frontend_layout.frontend_design')

@section('content')
  <div class="header-title">
        <div class="container d-flex align-items-center">
            <a href="{{ url('/') }}" class="header-title-back">
                <img class="img-fluid" src="{{url('images/ico_prev_white.png')}}" alt="Prev">
            </a>
            App
        </div>
    </div>

    <div class="content-wrapper">
        <div class="container">
            @if(count($appscategory)>0)
                @php $count =1; @endphp
                <ul class="category-button">
                    <li>
                        @foreach($appscategory as $cat)  
                            <a href="javascript:void(0)" class="getDetailsById btn btn-sm main-category-btn @if($count == 1) active @endif" data-id="{{$cat['id']}}" data-type="application" data-application="software" data-block="appgame">
                                {{$cat['name']}}
                            </a>
                        @php $count++; @endphp    
                        @endforeach    
                    </li>
                </ul>
                @endif
            <div class="row section-heading">
                <div class="col-7 text-left">
                    <p class="page-heading">Top App</p>
                </div>
            </div>

                <span class="appgamecateBlock"> 
                @if(count($apps)>0)
                    <div class="row no-gutters game-list-wrapper">
                    @php $i=1 @endphp
                    @foreach($apps as $app)
                            <div class="col-4">
                                <div class="game-item">
                                    <a href="{{ url('app/details/'.$app['uuid']) }}">
                                       @if (file_exists( public_path().'/uploads/application/'.$app['uuid'].'/image/'.$app['image']))
                                             <img class="img-fluid game-item-pic" src="{{url('uploads/application/'.$app['uuid'].'/image/'.$app['image'])}}" alt="Images">
                                       @else
                                            <img class="img-fluid game-item-pic" src="{{url('images/no_game.jpg')}}" alt="Images">
                                        @endif 

                                        <p class="game-item-title text-truncate">{{ucfirst($app['name'])}}</p>
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
