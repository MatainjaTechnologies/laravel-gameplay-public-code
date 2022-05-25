@extends('frontend.frontend_template')
@section('content')
    <div class="header-tabs">
        <div class="container box-wrapper pt-3 py-2">
            <div class="row gutter-sm">
                <div class="col-7">
                    <a href="{{url('/competition')}}" class="btn btn-tabs text-transform rounded-pill w-100">Competition Schedule</a>
                </div>
                <div class="col-5">
                    <a href="{{url('/winner')}}" class="btn btn-tabs text-transform rounded-pill w-100 active">Winner List</a>
                </div>
            </div>
        </div>
        <div class="container box-wrapper">
            <div style="margin-top: 1rem;">
                <form action="{{ url('winner/search') }}" method="get">
                    <div class="row no-gutters pick-date-wrapper">
                        <div class="col-5">
                            <div class="pick-date-item shadow-sm">
                                <input type="date" class="form-control" name="start_date" @if ($start_date != '') value="{{date('Y-m-d', strtotime($start_date))}}" @endif placeholder="Start Date">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="pick-date-item shadow-sm">
                                <input type="date" class="form-control" name="end_date" @if ($end_date != '')  value="{{date('Y-m-d', strtotime($end_date))}}" @endif placeholder="End Date">
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary btn-block shadow-sm">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <ul class="custom-nav nav nav-pills nav-justified" id="statusTabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tabWinnerDaily" >Daily</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabWinnerWeekly" >Weekly</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabWinnerMonthly" >Monthly</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="container-fluid box-wrapper tab-content">
            @if (count($search_result) > 0)
                <div class="tab-pane active" id="tabWinnerDaily">                
                    @foreach ($search_result as $competition)
                        @if ($competition->competition_type == 1)
                            <div class="competition-winner-box shadow-sm">
                                <div class="competition-info text-white">
                                    <div class="row no-gutters">
                                        <div class="col-7">
                                            <div class="pr-2">
                                                <img class="img-fluid" src="{{asset('/uploads/games/'.$competition->game['id'].'/cover_image/'.$competition->game['cover_image'])}}" alt="Pictures">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <p class="mb-1 font-weight-bold text-truncate">{{$competition->game['name']}}</p>
                                            <div class="competition-info-desc d-block small mb-1">
                                                {{$competition->game['description']}} 
                                            </div>
                                            <div class="d-block small mb-1">Date: {{date('d-m-Y', strtotime($competition['start_date']))}}</div>
                                            <div class="position-relative">
                                                <a href="#" class="badge badge-pill badge-light mr-1">Daily</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if (count($competition->winners) > 0)
                                    @foreach ($competition->winners as $winner)
                                        <div class="winner-list-item">
                                            <div class="media align-items-center">
                                                <div class="winner-list-item-pic mr-3">
                                                    <div class="winner-list-item-badge">
                                                        @if ($winner->position == '1')
                                                            <img class="img-fluid" src="images/winner_01.png" alt="Gold">
                                                        @endif
                                                        @if ($winner->position == '2')
                                                            <img class="img-fluid" src="images/winner_02.png" alt="Silver">
                                                        @endif
                                                        @if ($winner->position == '3')
                                                            <img class="img-fluid" src="images/winner_03.png" alt="Bronze">
                                                        @endif
                                                    </div>
                                                    <img class="rounded-circle" src="images/img_people_01.png" alt="Images">
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mt-0 winner-list-item-name text-truncate">{{$winner->name}}</h5>
                                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="images/ico_coin.svg" alt="Point"></span>&nbsp;{{$winner->game_score}} Point</p>
                                                    <p class="winner-list-item-date">{{date('M-d-Y', strtotime($winner->date_of_users_played))}}</p>
                                                </div>
                                                <div class="winner-list-item-prize">
                                                    @if ($winner->position == '1')
                                                        @if (file_exists( public_path().'/uploads/competetion/'.$competition->id.'/prize1/'.$competition->prize_image1)){}
                                                            <img src="{{asset('/uploads/competetion/'.$competition->id.'/prize1/'.$competition->prize_image1)}}" alt="Image" class="img-fluid">
                                                        @else
                                                            <img class="img-fluid" src="images/logo_jazz.png" alt="Images">
                                                        @endif
                                                    @endif
                                                    @if ($winner->position == '2')
                                                        @if (file_exists( public_path().'/uploads/competetion/'.$competition->id.'/prize2/'.$competition->prize_image2)){}
                                                            <img src="{{asset('/uploads/competetion/'.$competition->id.'/prize2/'.$competition->prize_image2)}}" alt="Image" class="img-fluid">
                                                        @else
                                                            <img class="img-fluid" src="images/logo_jazz.png" alt="Images">
                                                        @endif
                                                    @endif
                                                    @if ($winner->position == '3')
                                                        @if (file_exists( public_path().'/uploads/competetion/'.$competition->id.'/prize3/'.$competition->prize_image3)){}
                                                            <img src="{{asset('/uploads/competetion/'.$competition->id.'/prize3/'.$competition->prize_image3)}}" alt="Image" class="img-fluid">
                                                        @else
                                                            <img class="img-fluid" src="images/logo_jazz.png" alt="Images">
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach                                
                                @else
                                    <div class="winner-list-item">
                                        <div class="media align-items-center">
                                            <p>Competition Winnerlist will be declare soon..</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="tab-pane" id="tabWinnerWeekly">
                    @foreach ($search_result as $competition)
                        @if ($competition->competition_type == 2)
                            <div class="competition-winner-box shadow-sm">
                                <div class="competition-info text-white">
                                    <div class="row no-gutters">
                                        <div class="col-7">
                                            <div class="pr-2">
                                                {{-- @php
                                                    dd($competition->game['cover_image']);
                                                @endphp --}}
                                                <img class="img-fluid" src="{{asset('/uploads/games/'.$competition->game['id'].'/cover_image/'.$competition->game['cover_image'])}}" alt="Pictures">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <p class="mb-1 font-weight-bold text-truncate">{{$competition->game['name']}}</p>
                                            <div class="competition-info-desc d-block small mb-1">
                                                {{$competition->game['description']}} 
                                            </div>
                                            <div class="d-block small mb-1">Date: {{date('d-m-Y', strtotime($competition['start_date']))}}</div>
                                            <div class="position-relative">
                                                <a href="#" class="badge badge-pill badge-light mr-1">Weekly</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if (count($competition->winners) > 0)
                                    @foreach ($competition->winners as $winner)
                                        <div class="winner-list-item">
                                            <div class="media align-items-center">
                                                <div class="winner-list-item-pic mr-3">
                                                    <div class="winner-list-item-badge">
                                                        @if ($winner->position == '1')
                                                            <img class="img-fluid" src="images/winner_01.png" alt="Gold">
                                                        @endif
                                                        @if ($winner->position == '2')
                                                            <img class="img-fluid" src="images/winner_02.png" alt="Silver">
                                                        @endif
                                                        @if ($winner->position == '3')
                                                            <img class="img-fluid" src="images/winner_03.png" alt="Bronze">
                                                        @endif
                                                    </div>
                                                    <img class="rounded-circle" src="images/img_people_01.png" alt="Images">
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mt-0 winner-list-item-name text-truncate">{{$winner->name}}</h5>
                                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="images/ico_coin.svg" alt="Point"></span>&nbsp;{{$winner->game_score}} Point</p>
                                                    <p class="winner-list-item-date">{{date('M-d-Y', strtotime($winner->date_of_users_played))}}</p>
                                                </div>
                                                <div class="winner-list-item-prize">
                                                    @if ($winner->position == '1')
                                                        @if (file_exists( public_path().'/uploads/competetion/'.$competition->id.'/prize1/'.$competition->prize_image1)){}
                                                            <img src="{{asset('/uploads/competetion/'.$competition->id.'/prize1/'.$competition->prize_image1)}}" alt="Image" class="img-fluid">
                                                        @else
                                                            <img class="img-fluid" src="images/logo_jazz.png" alt="Images">
                                                        @endif
                                                    @endif
                                                    @if ($winner->position == '2')
                                                        @if (file_exists( public_path().'/uploads/competetion/'.$competition->id.'/prize2/'.$competition->prize_image2)){}
                                                            <img src="{{asset('/uploads/competetion/'.$competition->id.'/prize2/'.$competition->prize_image2)}}" alt="Image" class="img-fluid">
                                                        @else
                                                            <img class="img-fluid" src="images/logo_jazz.png" alt="Images">
                                                        @endif
                                                    @endif
                                                    @if ($winner->position == '3')
                                                        @if (file_exists( public_path().'/uploads/competetion/'.$competition->id.'/prize3/'.$competition->prize_image3)){}
                                                            <img src="{{asset('/uploads/competetion/'.$competition->id.'/prize3/'.$competition->prize_image3)}}" alt="Image" class="img-fluid">
                                                        @else
                                                            <img class="img-fluid" src="images/logo_jazz.png" alt="Images">
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach                                
                                @else
                                    <div class="winner-list-item">
                                        <div class="media align-items-center">
                                            <p>Competition Winnerlist will be declare soon..</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="tab-pane" id="tabWinnerMonthly">
                    @foreach ($search_result as $competition)
                        @if ($competition->competition_type == 3)
                            <div class="competition-winner-box shadow-sm">
                                <div class="competition-info text-white">
                                    <div class="row no-gutters">
                                        <div class="col-7">
                                            <div class="pr-2">
                                                <img class="img-fluid" src="{{asset('/uploads/games/'.$competition->game['id'].'/cover_image/'.$competition->game['cover_image'])}}" alt="Pictures">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <p class="mb-1 font-weight-bold text-truncate">{{$competition->game['name']}}</p>
                                            <div class="competition-info-desc d-block small mb-1">
                                                {{$competition->game['description']}} 
                                            </div>
                                            <div class="d-block small mb-1">Date: {{date('d-m-Y', strtotime($competition['start_date']))}}</div>
                                            <div class="position-relative">
                                                <a href="#" class="badge badge-pill badge-light mr-1">Monthly</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if (count($competition->winners) > 0)
                                    @foreach ($competition->winners as $winner)
                                        <div class="winner-list-item">
                                            <div class="media align-items-center">
                                                <div class="winner-list-item-pic mr-3">
                                                    <div class="winner-list-item-badge">
                                                        @if ($winner->position == '1')
                                                            <img class="img-fluid" src="images/winner_01.png" alt="Gold">
                                                        @endif
                                                        @if ($winner->position == '2')
                                                            <img class="img-fluid" src="images/winner_02.png" alt="Silver">
                                                        @endif
                                                        @if ($winner->position == '3')
                                                            <img class="img-fluid" src="images/winner_03.png" alt="Bronze">
                                                        @endif
                                                    </div>
                                                    <img class="rounded-circle" src="images/img_people_01.png" alt="Images">
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mt-0 winner-list-item-name text-truncate">{{$winner->name}}</h5>
                                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="images/ico_coin.svg" alt="Point"></span>&nbsp;{{$winner->game_score}} Point</p>
                                                    <p class="winner-list-item-date">{{date('M-d-Y', strtotime($winner->date_of_users_played))}}</p>
                                                </div>
                                                <div class="winner-list-item-prize">
                                                    @if ($winner->position == '1')
                                                        @if (file_exists( public_path().'/uploads/competetion/'.$competition->id.'/prize1/'.$competition->prize_image1)){}
                                                            <img src="{{asset('/uploads/competetion/'.$competition->id.'/prize1/'.$competition->prize_image1)}}" alt="Image" class="img-fluid">
                                                        @else
                                                            <img class="img-fluid" src="images/logo_jazz.png" alt="Images">
                                                        @endif
                                                    @endif
                                                    @if ($winner->position == '2')
                                                        @if (file_exists( public_path().'/uploads/competetion/'.$competition->id.'/prize2/'.$competition->prize_image2)){}
                                                            <img src="{{asset('/uploads/competetion/'.$competition->id.'/prize2/'.$competition->prize_image2)}}" alt="Image" class="img-fluid">
                                                        @else
                                                            <img class="img-fluid" src="images/logo_jazz.png" alt="Images">
                                                        @endif
                                                    @endif
                                                    @if ($winner->position == '3')
                                                        @if (file_exists( public_path().'/uploads/competetion/'.$competition->id.'/prize3/'.$competition->prize_image3)){}
                                                            <img src="{{asset('/uploads/competetion/'.$competition->id.'/prize3/'.$competition->prize_image3)}}" alt="Image" class="img-fluid">
                                                        @else
                                                            <img class="img-fluid" src="images/logo_jazz.png" alt="Images">
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach                                
                                @else
                                    <div class="winner-list-item">
                                        <div class="media align-items-center">
                                            <p>Competition Winnerlist will be declare soon..</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <h3 style="text-align: center;">No Results found</h3>                
            @endif
        </div>
    </div>
@endsection