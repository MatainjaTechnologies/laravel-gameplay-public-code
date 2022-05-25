@extends('layouts.frontend_layout.frontend_design')

@section('content')
  <div class="header-title">
        <div class="container d-flex align-items-center">
            <a href="{{ url()->previous() }}" class="header-title-back">
                <img class="img-fluid" src="{{url('images/ico_prev_white.png')}}" alt="Prev">
            </a>
            Back
        </div>
    </div>
    <div class="content-wrapper">
        <div class="container">
            <span class="appgamecateBlock"> 
                @if(count($post)>0)
                    <div class="row no-gutters game-list-wrapper">
                        @php $i=1 @endphp
                        @foreach($post as $app)
                            <div class="col-4">
                                <div class="game-item">
                                    @if ($app->post_type == 'wallpaper')
                                        <a href="{{ url('wallpaper/details/'.$app->uuid) }}">
                                            @if (file_exists( public_path().'/uploads/'.$app->post_type.'/'.$app->uuid.'/image/'.$app->image))
                                                    <img class="img-fluid game-item-pic" src="{{url('uploads/'.$app->post_type.'/'.$app->uuid.'/image/'.$app->image)}}" alt="Images">
                                            @else
                                                    <img class="img-fluid game-item-pic" src="{{url('images/no_game.jpg')}}" alt="Images">
                                                @endif 

                                            <p class="game-item-title text-truncate">{{ucfirst($app->name)}}</p>
                                        </a>
                                    @endif
                                    @if ($app->post_type == 'application')
                                        @if ($app->application_type == 'software')
                                            <a href="{{ url('app/game/details/'.$app->uuid) }}">
                                                @if (file_exists( public_path().'/uploads/'.$app->post_type.'/'.$app->uuid.'/image/'.$app->image))
                                                        <img class="img-fluid game-item-pic" src="{{url('uploads/'.$app->post_type.'/'.$app->uuid.'/image/'.$app->image)}}" alt="Images">
                                                @else
                                                        <img class="img-fluid game-item-pic" src="{{url('images/no_game.jpg')}}" alt="Images">
                                                    @endif 

                                                <p class="game-item-title text-truncate">{{ucfirst($app->name)}}</p>
                                            </a>
                                        @endif
                                        @if ($app->application_type == 'game')
                                            <a href="{{ url('app/details/'.$app->uuid) }}">
                                                @if (file_exists( public_path().'/uploads/'.$app->post_type.'/'.$app->uuid.'/image/'.$app->image))
                                                        <img class="img-fluid game-item-pic" src="{{url('uploads/'.$app->post_type.'/'.$app->uuid.'/image/'.$app->image)}}" alt="Images">
                                                @else
                                                        <img class="img-fluid game-item-pic" src="{{url('images/no_game.jpg')}}" alt="Images">
                                                    @endif 

                                                <p class="game-item-title text-truncate">{{ucfirst($app->name)}}</p>
                                            </a>                                        
                                        @endif
                                    @endif
                                    @if ($app->post_type == 'video')
                                        <a href="{{ url('video/details/'.$app->uuid) }}">
                                            @if (file_exists( public_path().'/'.$app->post_type.'/'.$app->uuid.'/file/'.$app->file))
                                                    <video autoplay="autoplay" width="320" height="240" src="{{url('/'.$app->post_type.'/'.$app->uuid.'/file/'.$app->file)}}" >
                                                        Video
                                                    </video>
                                            @else
                                                    <img class="img-fluid game-item-pic" src="{{url('images/no_game.jpg')}}" alt="Images">
                                                @endif 

                                            <p class="game-item-title text-truncate">{{ucfirst($app->name)}}</p>
                                        </a>
                                    @endif
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
