@extends('frontend.frontend_template')
@section('content')
    <div class="header-tabs">
        <div class="container box-wrapper pt-3 py-2">
            <div class="row gutter-sm">
                <div class="col-7">
                    <a href="{{url('/competition')}}" class="btn btn-tabs text-transform rounded-pill w-100 active">{{ __('lang.competition_schedule')}}</a>
                </div>
                <div class="col-5">
                    <a href="{{url('/winner')}}" class="btn btn-tabs text-transform rounded-pill w-100">{{ __('lang.winner_list')}}</a>
                </div>
            </div>
        </div>
        <div class="container box-wrapper">
            <ul class="custom-nav nav nav-pills nav-justified" id="statusTabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tabCurrent" >{{ __('lang.current')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabComingSoon" >{{ __('lang.coming_soon')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabFinish" >{{ __('lang.finish')}}</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="container-fluid box-wrapper tab-content">
            <div class="tab-pane active" id="tabCurrent">
                @if (count($current_competitions) > 0)
                    @foreach ($current_competitions as $comp)
                        @if ($comp->competition_type == 1)
                            <div class="competition-winner-box shadow-sm">
                                <div class="competition-info bg-light pb-3">
                                    <div class="row no-gutters">
                                        <div class="col-7">
                                            <div class="pr-2">
                                                {{-- <img class="img-fluid" src="{{asset('frontend_theme/images/img-game-03.png')}}" alt="Pictures"> --}}
                                                <img class="img-fluid" src="{{asset('/uploads/games/'.$comp->game_id.'/'.$comp->game_image)}}" alt="Pictures">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <p class="mb-1 font-weight-bold text-truncate">{{$comp->game_name}}</p>
                                            <div class="competition-info-desc d-block small mb-1">
                                                {{$comp->category_name->category_name}}
                                            </div>
                                            <div class="d-block small mb-1">Start: {{$comp->start_date}}</div>
                                            <div class="position-relative">
                                                <a href="#" class="badge badge-pill badge-secondary mr-1">{{ __('lang.daily')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-light text-center divider-bg">
                                    <a href="{{url('/competition/'.$comp->id.'/game/'.$comp->game_uuid)}}" class="btn button-green-sh text-uppercase rounded-pill px-4">{{ __('lang.join_the_competition')}}</a>
                                </div>
                                <div class="bg-grey py-3" style="padding: 10px; border-radius: 0 0 10px 10px;">
                                    <div class="row no-gutters">
                                        <div class="col-4">
                                            <div class="competition-reward shadow">
                                                <div class="competition-reward-pic p-1">
                                                    <img src="{{asset('/uploads/competetion/'.$comp->id.'/prize1/'.$comp->prize_image1)}}" class="img-fluid">
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
                                                            {{-- <p class="m-0 small text-uppercase text-truncate">PS5</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="competition-reward shadow">
                                                <div class="competition-reward-pic p-1">
                                                    <img src="{{asset('/uploads/competetion/'.$comp->id.'/prize2/'.$comp->prize_image2)}}" class="img-fluid">
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
                                                            {{-- <p class="m-0 small text-uppercase text-truncate">iPhone 12</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="competition-reward shadow">
                                                <div class="competition-reward-pic p-1">
                                                    <img src="{{asset('/uploads/competetion/'.$comp->id.'/prize3/'.$comp->prize_image3)}}" class="img-fluid">
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
                                                            {{-- <p class="m-0 small text-uppercase text-truncate">GoPro</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($comp->competition_type == 2)
                            <div class="competition-winner-box shadow-sm">
                                <div class="competition-info bg-light pb-3">
                                    <div class="row no-gutters">
                                        <div class="col-7">
                                            <div class="pr-2">
                                                {{-- <img class="img-fluid" src="{{asset('frontend_theme/images/img-game-03.png')}}" alt="Pictures"> --}}
                                                <img class="img-fluid" src="{{asset('/uploads/games/'.$comp->game_id.'/'.$comp->game_image)}}" alt="Pictures">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <p class="mb-1 font-weight-bold text-truncate">{{$comp->game_name}}</p>
                                            <div class="competition-info-desc d-block small mb-1">
                                                {{$comp->category_name->category_name}}
                                            </div>
                                            <div class="d-block small mb-1">Date: {{$comp->start_date}} TO {{$comp->end_date}}</div>
                                            <div class="position-relative">
                                                <a href="#" class="badge badge-pill badge-secondary mr-1">{{ __('lang.weekly')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-light text-center divider-bg">
                                    <a href="{{url('/competition/'.$comp->id.'/game/'.$comp->game_uuid)}}" class="btn button-green-sh text-uppercase rounded-pill px-4">{{ __('lang.join_the_competition')}}</a>
                                </div>
                                <div class="bg-grey py-3" style="padding: 10px; border-radius: 0 0 10px 10px;">
                                    <div class="row no-gutters">
                                        <div class="col-4">
                                            <div class="competition-reward shadow">
                                                <div class="competition-reward-pic p-1">
                                                    <img src="{{asset('/uploads/competetion/'.$comp->id.'/prize1/'.$comp->prize_image1)}}" class="img-fluid">
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
                                                            {{-- <p class="m-0 small text-uppercase text-truncate">PS5</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="competition-reward shadow">
                                                <div class="competition-reward-pic p-1">
                                                    <img src="{{asset('/uploads/competetion/'.$comp->id.'/prize2/'.$comp->prize_image2)}}" class="img-fluid">
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
                                                            {{-- <p class="m-0 small text-uppercase text-truncate">iPhone 12</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="competition-reward shadow">
                                                <div class="competition-reward-pic p-1">
                                                    <img src="{{asset('/uploads/competetion/'.$comp->id.'/prize3/'.$comp->prize_image3)}}" class="img-fluid">
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
                                                            {{-- <p class="m-0 small text-uppercase text-truncate">GoPro</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($comp->competition_type == 3)
                            <div class="competition-winner-box shadow-sm">
                                <div class="competition-info bg-light pb-3">
                                    <div class="row no-gutters">
                                        <div class="col-7">
                                            <div class="pr-2">
                                                {{-- <img class="img-fluid" src="{{asset('frontend_theme/images/img-game-03.png')}}" alt="Pictures"> --}}
                                                <img class="img-fluid" src="{{asset('/uploads/games/'.$comp->game_id.'/'.$comp->game_image)}}" alt="Pictures">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <p class="mb-1 font-weight-bold text-truncate">{{$comp->game_name}}</p>
                                            <div class="competition-info-desc d-block small mb-1">
                                                {{$comp->category_name->category_name}}
                                            </div>
                                            <div class="d-block small mb-1">Date: {{$comp->start_date}} TO {{$comp->end_date}}</div>
                                            <div class="position-relative">
                                                <a href="#" class="badge badge-pill badge-secondary mr-1">{{ __('lang.monthly')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-light text-center divider-bg">
                                    <a href="{{url('/competition/'.$comp->id.'/game/'.$comp->game_uuid)}}" class="btn button-green-sh text-uppercase rounded-pill px-4">{{ __('lang.join_the_competition')}}</a>
                                </div>
                                <div class="bg-grey py-3" style="padding: 10px; border-radius: 0 0 10px 10px;">
                                    <div class="row no-gutters">
                                        <div class="col-4">
                                            <div class="competition-reward shadow">
                                                <div class="competition-reward-pic p-1">
                                                    <img src="{{asset('/uploads/competetion/'.$comp->id.'/prize1/'.$comp->prize_image1)}}" class="img-fluid">
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
                                                            {{-- <p class="m-0 small text-uppercase text-truncate">PS5</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="competition-reward shadow">
                                                <div class="competition-reward-pic p-1">
                                                    <img src="{{asset('/uploads/competetion/'.$comp->id.'/prize2/'.$comp->prize_image2)}}" class="img-fluid">
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
                                                            {{-- <p class="m-0 small text-uppercase text-truncate">iPhone 12</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="competition-reward shadow">
                                                <div class="competition-reward-pic p-1">
                                                    <img src="{{asset('/uploads/competetion/'.$comp->id.'/prize3/'.$comp->prize_image3)}}" class="img-fluid">
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
                                                            {{-- <p class="m-0 small text-uppercase text-truncate">GoPro</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="" style="display:flex; justify-content: center">
                        <h3>{{ __('lang.no_competition_to_show')}}</h3>
                    </div>
                @endif
            </div>
            <div class="tab-pane" id="tabComingSoon">
                @if (count($soon_competitions) > 0)
                    @foreach ($soon_competitions as $soon_comp)
                        @if ($soon_comp->competition_type == 1)
                            <div class="competition-winner-box shadow-sm">
                                <div class="competition-info bg-light pb-3">
                                    <div class="row no-gutters">
                                        <div class="col-7">
                                            <div class="pr-2">
                                                {{-- <img class="img-fluid" src="{{asset('frontend_theme/images/img-game-03.png')}}" alt="Pictures"> --}}
                                                <img class="img-fluid" src="{{asset('/uploads/games/'.$soon_comp->game_id.'/'.$soon_comp->game_image)}}" alt="Pictures">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <p class="mb-1 font-weight-bold text-truncate">{{$soon_comp->game_name}}</p>
                                            <div class="competition-info-desc d-block small mb-1">
                                                {{$soon_comp->category_name->category_name}}
                                            </div>
                                            <div class="d-block small mb-1">Date: {{$soon_comp->start_date}}</div>
                                            <div class="position-relative">
                                                <a href="#" class="badge badge-pill badge-secondary mr-1">{{ __('lang.daily')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-light text-center divider-bg">
                                    <a href="javacript:void(0);" class="btn text-uppercase rounded-pill px-4 disable_btn">Coming Soon</a>
                                </div>
                                <div class="bg-grey py-3" style="padding: 10px; border-radius: 0 0 10px 10px;">
                                    <div class="row no-gutters">
                                        <div class="col-4">
                                            <div class="competition-reward shadow">
                                                <div class="competition-reward-pic p-1">
                                                    <img src="{{asset('/uploads/competetion/'.$soon_comp->id.'/prize1/'.$soon_comp->prize_image1)}}" class="img-fluid">
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
                                                            {{-- <p class="m-0 small text-uppercase text-truncate">PS5</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="competition-reward shadow">
                                                <div class="competition-reward-pic p-1">
                                                    <img src="{{asset('/uploads/competetion/'.$soon_comp->id.'/prize2/'.$soon_comp->prize_image2)}}" class="img-fluid">
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
                                                            {{-- <p class="m-0 small text-uppercase text-truncate">iPhone 12</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="competition-reward shadow">
                                                <div class="competition-reward-pic p-1">
                                                    <img src="{{asset('/uploads/competetion/'.$soon_comp->id.'/prize3/'.$soon_comp->prize_image3)}}" class="img-fluid">
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
                                                            {{-- <p class="m-0 small text-uppercase text-truncate">GoPro</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($soon_comp->competition_type == 2)
                            <div class="competition-winner-box shadow-sm">
                                <div class="competition-info bg-light pb-3">
                                    <div class="row no-gutters">
                                        <div class="col-7">
                                            <div class="pr-2">
                                                {{-- <img class="img-fluid" src="{{asset('frontend_theme/images/img-game-03.png')}}" alt="Pictures"> --}}
                                                <img class="img-fluid" src="{{asset('/uploads/games/'.$soon_comp->game_id.'/'.$soon_comp->game_image)}}" alt="Pictures">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <p class="mb-1 font-weight-bold text-truncate">{{$soon_comp->game_name}}</p>
                                            <div class="competition-info-desc d-block small mb-1">
                                                {{$soon_comp->category_name->category_name}}
                                            </div>
                                            <div class="d-block small mb-1">Date: {{$soon_comp->start_date}}</div>
                                            <div class="position-relative">
                                                <a href="#" class="badge badge-pill badge-secondary mr-1">{{ __('lang.weekly')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-light text-center divider-bg">
                                    <a href="javacript:void(0);" class="btn text-uppercase rounded-pill px-4 disable_btn">Coming Soon</a>
                                </div>
                                <div class="bg-grey py-3" style="padding: 10px; border-radius: 0 0 10px 10px;">
                                    <div class="row no-gutters">
                                        <div class="col-4">
                                            <div class="competition-reward shadow">
                                                <div class="competition-reward-pic p-1">
                                                    <img src="{{asset('/uploads/competetion/'.$soon_comp->id.'/prize1/'.$soon_comp->prize_image1)}}" class="img-fluid">
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
                                                            {{-- <p class="m-0 small text-uppercase text-truncate">PS5</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="competition-reward shadow">
                                                <div class="competition-reward-pic p-1">
                                                    <img src="{{asset('/uploads/competetion/'.$soon_comp->id.'/prize2/'.$soon_comp->prize_image2)}}" class="img-fluid">
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
                                                            {{-- <p class="m-0 small text-uppercase text-truncate">iPhone 12</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="competition-reward shadow">
                                                <div class="competition-reward-pic p-1">
                                                    <img src="{{asset('/uploads/competetion/'.$soon_comp->id.'/prize3/'.$soon_comp->prize_image3)}}" class="img-fluid">
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
                                                            {{-- <p class="m-0 small text-uppercase text-truncate">GoPro</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($soon_comp->competition_type == 3)
                            <div class="competition-winner-box shadow-sm">
                                <div class="competition-info bg-light pb-3">
                                    <div class="row no-gutters">
                                        <div class="col-7">
                                            <div class="pr-2">
                                                {{-- <img class="img-fluid" src="{{asset('frontend_theme/images/img-game-03.png')}}" alt="Pictures"> --}}
                                                <img class="img-fluid" src="{{asset('/uploads/games/'.$soon_comp->game_id.'/'.$soon_comp->game_image)}}" alt="Pictures">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <p class="mb-1 font-weight-bold text-truncate">{{$soon_comp->game_name}}</p>
                                            <div class="competition-info-desc d-block small mb-1">
                                                {{$soon_comp->category_name->category_name}}
                                            </div>
                                            <div class="d-block small mb-1">Date: {{$soon_comp->start_date}}</div>
                                            <div class="position-relative">
                                                <a href="#" class="badge badge-pill badge-secondary mr-1">{{ __('lang.monthly')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-light text-center divider-bg">
                                    <a href="javacript:void(0);" class="btn text-uppercase rounded-pill px-4 disable_btn">Coming Soon</a>
                                </div>
                                <div class="bg-grey py-3" style="padding: 10px; border-radius: 0 0 10px 10px;">
                                    <div class="row no-gutters">
                                        <div class="col-4">
                                            <div class="competition-reward shadow">
                                                <div class="competition-reward-pic p-1">
                                                    <img src="{{asset('/uploads/competetion/'.$soon_comp->id.'/prize1/'.$soon_comp->prize_image1)}}" class="img-fluid">
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
                                                            {{-- <p class="m-0 small text-uppercase text-truncate">PS5</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="competition-reward shadow">
                                                <div class="competition-reward-pic p-1">
                                                    <img src="{{asset('/uploads/competetion/'.$soon_comp->id.'/prize2/'.$soon_comp->prize_image2)}}" class="img-fluid">
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
                                                            {{-- <p class="m-0 small text-uppercase text-truncate">iPhone 12</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="competition-reward shadow">
                                                <div class="competition-reward-pic p-1">
                                                    <img src="{{asset('/uploads/competetion/'.$soon_comp->id.'/prize3/'.$soon_comp->prize_image3)}}" class="img-fluid">
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
                                                            {{-- <p class="m-0 small text-uppercase text-truncate">GoPro</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="" style="display:flex; justify-content: center">
                        <h3>{{ __('lang.no_competition_to_show')}}</h3>
                    </div>
                @endif
            </div>
            <div class="tab-pane" id="tabFinish">
                @if (count($finish_competitions) > 0)
                    <div class="comp_row">
                        @foreach ($finish_competitions as $finish_comp)
                            @if ($finish_comp->competition_type == 1)
                                <div class="competition-winner-box shadow-sm">
                                    <div class="competition-info bg-light pb-3">
                                        <div class="row no-gutters">
                                            <div class="col-7">
                                                <div class="pr-2">
                                                    {{-- <img class="img-fluid" src="{{asset('frontend_theme/images/img-game-03.png')}}" alt="Pictures"> --}}
                                                    <img class="img-fluid" src="{{asset('/uploads/games/'.$finish_comp->game_id.'/'.$finish_comp->game_image)}}" alt="Pictures">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <p class="mb-1 font-weight-bold text-truncate">{{$finish_comp->game_name}}</p>
                                                <div class="competition-info-desc d-block small mb-1">
                                                    {{$finish_comp->category_name->category_name}}
                                                </div>
                                                <div class="d-block small mb-1">Date: {{$finish_comp->start_date}}</div>
                                                <div class="position-relative">
                                                    <a href="#" class="badge badge-pill badge-secondary mr-1">{{ __('lang.daily')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-light text-center divider-bg">
                                        <a href="javacript:void(0);" class="btn text-uppercase rounded-pill px-4 disable_btn">{{ __('lang.finished')}}</a>
                                    </div>
                                    <div class="bg-grey py-3" style="padding: 10px; border-radius: 0 0 10px 10px;">
                                        <div class="row no-gutters">
                                            <div class="col-4">
                                                <div class="competition-reward shadow">
                                                    <div class="competition-reward-pic p-1">
                                                        <img src="{{asset('/uploads/competetion/'.$finish_comp->id.'/prize1/'.$finish_comp->prize_image1)}}" class="img-fluid">
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
                                                                {{-- <p class="m-0 small text-uppercase text-truncate">PS5</p> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="competition-reward shadow">
                                                    <div class="competition-reward-pic p-1">
                                                        <img src="{{asset('/uploads/competetion/'.$finish_comp->id.'/prize2/'.$finish_comp->prize_image2)}}" class="img-fluid">
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
                                                                {{-- <p class="m-0 small text-uppercase text-truncate">iPhone 12</p> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="competition-reward shadow">
                                                    <div class="competition-reward-pic p-1">
                                                        <img src="{{asset('/uploads/competetion/'.$finish_comp->id.'/prize3/'.$finish_comp->prize_image3)}}" class="img-fluid">
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
                                                                {{-- <p class="m-0 small text-uppercase text-truncate">GoPro</p> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($finish_comp->competition_type == 2)
                                <div class="competition-winner-box shadow-sm">
                                    <div class="competition-info bg-light pb-3">
                                        <div class="row no-gutters">
                                            <div class="col-7">
                                                <div class="pr-2">
                                                    {{-- <img class="img-fluid" src="{{asset('frontend_theme/images/img-game-03.png')}}" alt="Pictures"> --}}
                                                    <img class="img-fluid" src="{{asset('/uploads/games/'.$finish_comp->game_id.'/'.$finish_comp->game_image)}}" alt="Pictures">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <p class="mb-1 font-weight-bold text-truncate">{{$finish_comp->game_name}}</p>
                                                <div class="competition-info-desc d-block small mb-1">
                                                    {{$finish_comp->category_name->category_name}}
                                                </div>
                                                <div class="d-block small mb-1">Date: {{$finish_comp->start_date}}</div>
                                                <div class="position-relative">
                                                    <a href="#" class="badge badge-pill badge-secondary mr-1">{{ __('lang.weekly')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-light text-center divider-bg">
                                        <a href="javacript:void(0);" class="btn text-uppercase rounded-pill px-4 disable_btn">{{ __('lang.finished')}}</a>
                                    </div>
                                    <div class="bg-grey py-3" style="padding: 10px; border-radius: 0 0 10px 10px;">
                                        <div class="row no-gutters">
                                            <div class="col-4">
                                                <div class="competition-reward shadow">
                                                    <div class="competition-reward-pic p-1">
                                                        <img src="{{asset('/uploads/competetion/'.$finish_comp->id.'/prize1/'.$finish_comp->prize_image1)}}" class="img-fluid">
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
                                                                {{-- <p class="m-0 small text-uppercase text-truncate">PS5</p> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="competition-reward shadow">
                                                    <div class="competition-reward-pic p-1">
                                                        <img src="{{asset('/uploads/competetion/'.$finish_comp->id.'/prize2/'.$finish_comp->prize_image2)}}" class="img-fluid">
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
                                                                {{-- <p class="m-0 small text-uppercase text-truncate">iPhone 12</p> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="competition-reward shadow">
                                                    <div class="competition-reward-pic p-1">
                                                        <img src="{{asset('/uploads/competetion/'.$finish_comp->id.'/prize3/'.$finish_comp->prize_image3)}}" class="img-fluid">
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
                                                                {{-- <p class="m-0 small text-uppercase text-truncate">GoPro</p> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($finish_comp->competition_type == 3)
                                <div class="competition-winner-box shadow-sm">
                                    <div class="competition-info bg-light pb-3">
                                        <div class="row no-gutters">
                                            <div class="col-7">
                                                <div class="pr-2">
                                                    {{-- <img class="img-fluid" src="{{asset('frontend_theme/images/img-game-03.png')}}" alt="Pictures"> --}}
                                                    <img class="img-fluid" src="{{asset('/uploads/games/'.$finish_comp->game_id.'/'.$finish_comp->game_image)}}" alt="Pictures">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <p class="mb-1 font-weight-bold text-truncate">{{$finish_comp->game_name}}</p>
                                                <div class="competition-info-desc d-block small mb-1">
                                                    {{$finish_comp->category_name->category_name}}
                                                </div>
                                                <div class="d-block small mb-1">Date: {{$finish_comp->start_date}}</div>
                                                <div class="position-relative">
                                                    <a href="#" class="badge badge-pill badge-secondary mr-1">{{ __('lang.monthly')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-light text-center divider-bg">
                                        <a href="javacript:void(0);" class="btn text-uppercase rounded-pill px-4 disable_btn">{{ __('lang.finished')}}</a>
                                    </div>
                                    <div class="bg-grey py-3" style="padding: 10px; border-radius: 0 0 10px 10px;">
                                        <div class="row no-gutters">
                                            <div class="col-4">
                                                <div class="competition-reward shadow">
                                                    <div class="competition-reward-pic p-1">
                                                        <img src="{{asset('/uploads/competetion/'.$finish_comp->id.'/prize1/'.$finish_comp->prize_image1)}}" class="img-fluid">
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
                                                                {{-- <p class="m-0 small text-uppercase text-truncate">PS5</p> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="competition-reward shadow">
                                                    <div class="competition-reward-pic p-1">
                                                        <img src="{{asset('/uploads/competetion/'.$finish_comp->id.'/prize2/'.$finish_comp->prize_image2)}}" class="img-fluid">
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
                                                                {{-- <p class="m-0 small text-uppercase text-truncate">iPhone 12</p> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="competition-reward shadow">
                                                    <div class="competition-reward-pic p-1">
                                                        <img src="{{asset('/uploads/competetion/'.$finish_comp->id.'/prize3/'.$finish_comp->prize_image3)}}" class="img-fluid">
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
                                                                {{-- <p class="m-0 small text-uppercase text-truncate">GoPro</p> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @if ($finish_competitions->hasMorePages())
                    <div class="load_more_div">
                        <a href="javascript:void(0);" class="btn btn-outline-primary see_more_finish_comp" data-btn_info="1">Load More</a>
                        <input type="hidden" name="limit" id="limit" value="1">
                    </div>
                    @endif
                @else
                    <div class="" style="display:flex; justify-content: center">
                        <h3>{{ __('lang.no_competition_to_show')}}</h3>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
