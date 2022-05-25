@extends('frontend.frontend_template')
@section('content')
    <div class="header-title">
        <div class="container-fluid box-wrapper d-flex align-items-center">
            <a href="{{url()->previous()}}" class="header-title-back text-white">
                <!-- <img class="img-fluid" src="images/ico_prev_white.png" alt="Prev"> -->
                <i class="fa fa-chevron-left"></i>
            </a>
            {{$game_details->name}}
        </div>
    </div>
    <div class="content-wrapper pb-0">

        <div class="container-fluid box-wrapper">
            <div class="slide-competition">
                <div class="slide-competition-thumbnail slider-standard">

                    @if(count($game_details->image) > 0)
                    @foreach ($game_details->image as $img)
                    <img class="img-fluid m-auto" src="{{asset('/uploads/games/'.$game_details->id.'/'.$img)}}" alt="Slider">                        
                    @endforeach
                     @endif 
                    {{-- <img class="img-fluid m-auto" src="{{asset('frontend_theme/images/img-slider-sample.png')}}" alt="Slider"> --}}
                </div>
                <div class="slide-competition-title my-3">
                    <div class="row no-gutters align-items-start">
                        <div class="col-6 text-left">
                            <p class="mb-1 font-weight-bold">{{$game_details->name}}</p>
                            <div class="competition-category">
                                <span>{{$game_details->category['name']}}</span>
                                @if (isset($comp_details))
                                <span>
                                    @if ($comp_details->competition_type == '1')
                                        {{ __('lang.daily')}}
                                    @endif
                                    @if ($comp_details->competition_type == '2')
                                        {{ __('lang.weekly')}}
                                    @endif
                                    @if ($comp_details->competition_type == '3')
                                        {{ __('lang.monthly')}}
                                    @endif
                                </span>                                    
                                @endif
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            @if (isset($comp_details))
                            <div class="rounded-pill bg-light border d-inline-block small p-2">Date : {{date('d-M-Y', strtotime($comp_details->start_date))}} - {{date('d-M-Y', strtotime($comp_details->end_date))}}</div>
                            @endif
                        </div>
                    </div>
                    <!-- <div class="pt-2 mt-2 border-top">
                        <p class="mb-0">Help the little guy go around the circle and avoid the block</p>
                    </div> -->
                </div>
                <div class="container-fluid pb-4">
                    <a href="{{url('games/'.$game_details->uuid.'/index.html?userid=1')}}" class="btn button-green-sh text-uppercase rounded-pill w-100">{{__('lang.play')}}</a>
                </div>
            </div>

            <div class="my-3">
                <button data-toggle="modal" data-target="#modalGameRules" class="btn button-grey text-uppercase w-100 shadow-sm">{{__('lang.game_rules')}}</button>
            </div>
            @if (isset($winners))
            <div class="leaderboard mb-3">
                <div class="leaderboard-title border-radius" style="padding-top: 13px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">
                    <div class="row section-heading align-items-center mb-0">
                        <div class="col-7 text-left">
                            <p class="page-heading">Leaderboard</p>
                        </div>
                        <div class="col-5 text-right">
                            <a href="{{url('/winner')}}" class="btn btn-outline-dark btn-sm rounded-pill text-tiny">See More</a>
                        </div>
                    </div>
                </div> 
                <ul class="leaderboard-content">
                    <!-- Start If No Data -->
                    <!-- <div class="p-2 text-center">
                        <p class="m-0">No Data</p>
                    </div> -->
                    <!-- End If No Data -->
                    @forelse ($winners as $winner)
                        <li class="leaderboard-winner">
                            <div class="row no-gutters d-flex align-items-center">
                                <div class="col-8">
                                    <div class="media align-items-center">
                                        <div class="leaderboard-winner-pic mr-3">
                                            <span class="leaderboard-winner-number">{{$winner->position}}</span>
                                            <img class="rounded-circle img-fluid" src="{{asset('frontend_theme/images/img_people_01.png')}}" alt="Images">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-0 leaderboard-winner-name text-truncate"> {{$winner->user['name']}}</h5>
                                            {{-- <span class="small text-secondary">Subscribed</span> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="btn leaderboard-winner-point">
                                        Score: {{$winner->game_score}}
                                    </span>
                                </div>
                            </div>
                        </li>
                    @empty
                        <div class="p-2 text-center">
                            <p class="m-0">No Data</p>
                        </div>
                    @endforelse  
                    {{-- <li class="leaderboard-winner">
                        <div class="row no-gutters d-flex align-items-center">
                            <div class="col-8">
                                <div class="media align-items-center">
                                    <div class="leaderboard-winner-pic mr-3">
                                        <span class="leaderboard-winner-number">2</span>
                                        <img class="rounded-circle img-fluid" src="{{asset('frontend_theme/images/img_people_02.png')}}" alt="Images">
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mt-0 leaderboard-winner-name text-truncate">Anies Rasyid Baswedan</h5>
                                        <span class="small text-secondary">Subscribed</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-right">
                                <span class="btn leaderboard-winner-point">
                                    Score: 245
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="leaderboard-winner">
                        <div class="row no-gutters d-flex align-items-center">
                            <div class="col-8">
                                <div class="media align-items-center">
                                    <div class="leaderboard-winner-pic mr-3">
                                        <span class="leaderboard-winner-number">3</span>
                                        <img class="rounded-circle img-fluid" src="{{asset('frontend_theme/images/img_people_03.png')}}" alt="Images">
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mt-0 leaderboard-winner-name text-truncate">Ganjar Pranowo</h5>
                                        <span class="small text-secondary">Subscribed</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-right">
                                <span class="btn leaderboard-winner-point">
                                    Score: 245
                                </span>
                            </div>
                        </div>
                    </li> --}}
                </ul>
            </div>
            @endif
            <div class="simple-card text-center my-3">
                <p class="m-0">Any Issue? <a class="text-primary" href="#">Click here</a></p>
            </div>
        </div>

        <div class="bg-light pt-3">
            <div class="container-fluid box-wrapper">
                <div class="row section-heading align-items-center">
                    <div class="col-7 text-left">
                        <p class="page-heading">{{ucfirst($game_details->category['name'])}}</p>
                    </div>
                    <div class="col-5 text-right">
                        <a href="{{url('/category/'.$game_details->category_id.'/game')}}" class="btn btn-outline-dark btn-sm rounded-pill">See More</a>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 5rem;">
                    @forelse ($other_games as $game)
                        <div class="col-6">
                            <div class="game-list">
                                <a href="{{url('/game/'.$game->uuid)}}">
                                    <img src="{{asset('/uploads/games/'.$game->id.'/cover_image/'.$game->cover_image)}}" alt="Game">
                                </a>
                                <div class="row no-gutters mt-2">
                                    <div class="col-8">
                                        <h6 class="mb-0 text-truncate">{{$game->name}}</h6>
                                        <small class="text-secondary">{{$game->category['name']}}</small>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="{{url('/game/'.$game->uuid)}}" class="btn btn-sm button-green-sh sh-sm rounded-pill px-2 text-uppercase">{{ __('lang.play')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="game-list" style="display:flex; justify-content: center">
                                <h3>{{ __('lang.no_game_to_show')}}</h3>
                            </div>
                        </div>                        
                    @endforelse
                {{-- <div class="row">
                    <div class="col-6">
                        <div class="game-list">
                            <img src="{{asset('frontend_theme/images/img-game-03.png')}}" alt="Game">
                            <div class="row no-gutters mt-2">
                                <div class="col-8">
                                    <h6 class="mb-0 text-truncate">Moto Fury</h6>
                                    <small class="text-secondary">Racing</small>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="#" class="btn btn-sm button-green-sh sh-sm rounded-pill px-2 text-uppercase">Play</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="game-list">
                            <img src="{{asset('frontend_theme/images/img-game-04.png')}}" alt="Game">
                            <div class="row no-gutters mt-2">
                                <div class="col-8">
                                    <h6 class="mb-0 text-truncate">Zombie Massacre</h6>
                                    <small class="text-secondary">Action</small>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="#" class="btn btn-sm button-green-sh sh-sm rounded-pill px-2 text-uppercase">Play</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="game-list">
                            <img src="{{asset('frontend_theme/images/img-game-05.png')}}" alt="Game">
                            <div class="row no-gutters mt-2">
                                <div class="col-8">
                                    <h6 class="mb-0 text-truncate">Gravity Ball</h6>
                                    <small class="text-secondary">Arcade</small>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="#" class="btn btn-sm button-green-sh sh-sm rounded-pill px-2 text-uppercase">Play</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="game-list">
                            <img src="{{asset('frontend_theme/images/img-game-06.png')}}" alt="Game">
                            <div class="row no-gutters mt-2">
                                <div class="col-8">
                                    <h6 class="mb-0 text-truncate">Fruit Boom</h6>
                                    <small class="text-secondary">Arcade</small>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="#" class="btn btn-sm button-green-sh sh-sm rounded-pill px-2 text-uppercase">Play</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

    </div>

   <div class="modal fade modal-standard" tabindex="-1" role="dialog" id="modalGameRules">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('lang.game_rules')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{$game_details->rule}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn button-green btn-block shadow-sm text-uppercase btn-sm" data-dismiss="modal" aria-label="Close">Ok</button>
                </div>
            </div>
        </div>
    </div>

     {{-- <div class="modal fade modal-standard" tabindex="-1" role="dialog" id="modalInvite">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Invite</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Send an invite to more than 50 people and get reward (8 coins) from us</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn button-green btn-block shadow-sm text-uppercase btn-sm" data-dismiss="modal" aria-label="Close">Ok</button>
                </div>
            </div>
        </div>
    </div> --}}
@endsection