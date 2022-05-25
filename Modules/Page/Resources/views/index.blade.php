@extends('frontend.frontend_template')
@section('content')
    {{-- <div class="search-bar-space-top"></div> --}}
    {{-- <div class="container-fluid box-wrapper position-relative">
        <div class="search-bar">
            <input type="text" class="form-control main-search" placeholder="Search Game">
        </div>
    </div> --}}
    {{-- <div class="search-bar-space-bottom"></div> --}}
    <div class="content-wrapper">
        <div class="container-fluid box-wrapper">
            <div class="slider-standard">
                @if (count($getTopChartCometition) > 0)
                    @foreach ($getTopChartCometition as $comps)
                        @if ($comps->competition_type == '1')
                            @php
                                $c = 'Daily'
                            @endphp                            
                        @endif
                        @if ($comps->competition_type == '2')
                            @php
                                $c = 'Weekly'
                            @endphp                            
                        @endif
                        @if ($comps->competition_type == '3')
                            @php
                                $c = 'Monthly'
                            @endphp                            
                        @endif
                        <div class="slide-competition">
                            <div class="competition-label">
                                <i class="fas fa-fire"></i>
                                <span>{{$c}} Competition</span>
                            </div>
                            <div class="slide-competition-thumbnail">
                                <img class="img-fluid m-auto" src="{{asset('/uploads/competetion/'.$comps->id.'/banner/'.$comps->banner_image)}}" alt="Slider">
                            </div>
                            <!-- <div class="slide-competition-thumbnail" style="background-image:url(images/img-slider-sample.png)"></div> -->
                            <div style="margin-top: -35px; margin-bottom: 1rem;">
                                <div class="slide-competition-title">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-6 text-left">
                                            <p class="mb-1">{{$comps->game['name']}}</p>
                                            <div class="competition-category">
                                                <span>{{$comps->game->category['name']}}</span>
                                                <span>{{$c}}</span>
                                            </div>
                                        </div>
                                        <div class="col-6 text-right">
                                            <div class="rounded-pill bg-light border d-inline-block small p-2">Date : {{date('d-M-Y', strtotime($comps->start_date))}} - {{date('d-M-Y', strtotime($comps->end_date))}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid mb-4">
                                <div class="mb-3 text-center">
                                    <a href="{{url('/competition/'.$comps->id.'/game/'.$comps->game['uuid'])}}" class="btn button-green-sh text-uppercase rounded-pill w-100" tabindex="0">{{ __('lang.join_the_competition')}}</a>
                                </div>
                                {{-- <div class="row no-gutters">
                                    <div class="col-4">
                                        <div class="competition-reward shadow">
                                            <div class="competition-reward-pic">
                                                <img src="{{asset('frontend_theme/images/reward-1.png')}}" alt="Image" class="img-fluid">
                                            </div>
                                            <div class="row no-gutters position-relative p-1">
                                                <div class="col-3">
                                                    <div class="badge-reward">
                                                        <img class="img-fluid" src="{{asset('frontend_theme/images/winner_01.png')}}" alt="Gold">
                                                    </div>
                                                </div>
                                                <div class="col-9">
                                                    <div class="ml-2">
                                                        <small class="text-muted text-uppercase" style="font-size: 10px; line-height: normal;">#1 Winner</small>
                                                        <p class="m-0 small text-uppercase text-truncate">PS5</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="competition-reward shadow">
                                            <div class="competition-reward-pic">
                                                <img src="{{asset('frontend_theme/images/reward-2.png')}}" alt="Image" class="img-fluid">
                                            </div>
                                            <div class="row no-gutters position-relative p-1">
                                                <div class="col-3">
                                                    <div class="badge-reward">
                                                        <img class="img-fluid" src="{{asset('frontend_theme/images/winner_02.png')}}" alt="Silver">
                                                    </div>
                                                </div>
                                                <div class="col-9">
                                                    <div class="ml-2">
                                                        <small class="text-muted text-uppercase" style="font-size: 10px; line-height: normal;">#2 Winner</small>
                                                        <p class="m-0 small text-uppercase text-truncate">iPhone 12</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="competition-reward shadow">
                                            <div class="competition-reward-pic">
                                                <img src="{{asset('frontend_theme/images/reward-3.png')}}" alt="Image" class="img-fluid">
                                            </div>
                                            <div class="row no-gutters position-relative p-1">
                                                <div class="col-3">
                                                    <div class="badge-reward">
                                                        <img class="img-fluid" src="{{asset('frontend_theme/images/winner_03.png')}}" alt="Bronze">
                                                    </div>
                                                </div>
                                                <div class="col-9">
                                                    <div class="ml-2">
                                                        <small class="text-muted text-uppercase" style="font-size: 10px; line-height: normal;">#3 Winner</small>
                                                        <p class="m-0 small text-uppercase text-truncate">GoPro</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            
                        </div>
                    @endforeach
                @else
                    <div class="slide-competition">
                        <div class="slide-competition-thumbnail">
                            {{-- <img class="img-fluid m-auto" src="{{asset('frontend_theme/images/img-slider-sample.png')}}" alt="Slider"> --}}
                        </div>
                        <div style="margin-top: -35px; margin-bottom: 1rem;">
                            <p>No competition right now, will be added soon</p>
                        </div>
                        <div class="container-fluid mb-4">
                            <div class="mb-3 text-center">
                                <a href="#" class="btn button-green-sh text-uppercase rounded-pill w-100" tabindex="0">{{ __('lang.will_be_added_soon')}}</a>
                            </div>
                            {{-- <div class="row no-gutters">
                                <div class="col-4">
                                    <div class="competition-reward shadow">
                                        <div class="competition-reward-pic">
                                            <img src="{{asset('frontend_theme/images/reward-1.png" alt="Image')}}" class="img-fluid">
                                        </div>
                                        <div class="row no-gutters position-relative p-1">
                                            <div class="col-3">
                                                <div class="badge-reward">
                                                    <img class="img-fluid" src="{{asset('frontend_theme/images/winner_01.png')}}" alt="Gold">
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="ml-2">
                                                    <small class="text-muted text-uppercase" style="font-size: 10px; line-height: normal;">#1 Winner</small>
                                                    <p class="m-0 small text-uppercase text-truncate">PS5</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="competition-reward shadow">
                                        <div class="competition-reward-pic">
                                            <img src="{{asset('frontend_theme/images/reward-2.png')}}" alt="Image" class="img-fluid">
                                        </div>
                                        <div class="row no-gutters position-relative p-1">
                                            <div class="col-3">
                                                <div class="badge-reward">
                                                    <img class="img-fluid" src="{{asset('frontend_theme/images/winner_02.png')}}" alt="Silver">
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="ml-2">
                                                    <small class="text-muted text-uppercase" style="font-size: 10px; line-height: normal;">#2 Winner</small>
                                                    <p class="m-0 small text-uppercase text-truncate">iPhone 12</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="competition-reward shadow">
                                        <div class="competition-reward-pic">
                                            <img src="{{asset('frontend_theme/images/reward-3.png')}}" alt="Image" class="img-fluid">
                                        </div>
                                        <div class="row no-gutters position-relative p-1">
                                            <div class="col-3">
                                                <div class="badge-reward">
                                                    <img class="img-fluid" src="{{asset('frontend_theme/images/winner_03.png')}}" alt="Bronze">
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="ml-2">
                                                    <small class="text-muted text-uppercase" style="font-size: 10px; line-height: normal;">#3 Winner</small>
                                                    <p class="m-0 small text-uppercase text-truncate">GoPro</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        
                    </div>                    
                @endif
            </div>
        </div>

        <div class="bg-light pt-3 mb-3">
            <div class="container-fluid box-wrapper">
                <div class="table-responsive">
                    <ul class="game-category-list">
                        <li>
                            <a href="javascript:void(0);" class="btn btn-sm btn-with-img btn_top_chart cat_btn active " data-btn_info="top_chart">
                                <div class="btn-with-img-box" style="background-image: url({{asset('/frontend_theme/images/icon_cat_champ.png')}});"></div>
                                {{ __('lang.top_chart')}}
                            </a>
                            @if (count($categories) > 0)
                                @foreach ($categories as $key => $cat)
                                    <a href="javascript:void(0);" class="btn btn-sm btn-with-img btn_{{$cat->id}}  cat_btn " data-btn_info="{{$cat->id}}">                                        
                                        @if ($cat->icon)
                                        <div class="btn-with-img-box" style="background-image: url({{asset('/uploads/category/'.$cat->uuid.'/icon/'.$cat->icon)}});"></div>                                            
                                        @else
                                        <div class="btn-with-img-box" style="background-image: url({{asset('/frontend_theme/images/icon_cat_champ.png')}});"></div>    
                                        @endif
                                        {{$cat->name}}
                                    </a>                            
                                @endforeach
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="games_main">
                    <div class="row section-heading align-items-center">
                        <div class="col-7 text-left head_title">
                            <p class="page-heading">{{ __('lang.top_chart')}}</p>
                        </div>
                        <div class="col-5 text-right">
                            <a class="btn btn-outline-dark btn-sm rounded-pill " href="{{url('/category/topchart/game')}}">See More</a>
                            {{-- @if ($top_chart_games->hasPages())
                                <button class="btn btn-outline-dark btn-sm rounded-pill see_more"data-btn_info="top_chart">See More</button>
                                <input type="hidden" name="limit" id="limit" value="1">
                            @endif --}}
                        </div>
                    </div>
                    <div class="row game_row">
                        @if ($top_chart_games->count())
                            @foreach ($top_chart_games as $game)
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
                            @endforeach
                        @else
                            {{-- @if (count($category_games) > 0)
                                @foreach ($category_games as $cat_game)
                                    <div class="col-6">
                                        <div class="game-list">
                                            <img src="{{asset('/uploads/games/'.$cat_game->id.'/'.$cat_game->image[0])}}" alt="Game">
                                            <div class="row no-gutters mt-2">
                                                <div class="col-8">
                                                    <h6 class="mb-0 text-truncate">{{$cat_game->name}}</h6>
                                                    <small class="text-secondary">{{$cat_game->category['name']}}</small>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <a href="javascript:void(0);" class="btn btn-sm button-green-sh sh-sm rounded-pill px-2 text-uppercase">Play</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                            
                                @endforeach
                            @endif --}}
                            <div class="col-6">
                                <div class="game-list">
                                    <div class="col-12">
                                        <p>No Game to show</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection