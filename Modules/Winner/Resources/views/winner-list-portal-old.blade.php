@extends('layouts.frontend_layout.frontend_design')
{{-- @php
    dd($final_winner_list);
@endphp --}}
@section('content')
    <div class="custom-tabs">
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link" href="{{url('competition')}}">Competition</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Winner List</a>
            </li>
        </ul>
    </div>
    <div class="content-wrapper">
        <div class="container">
            <ul class="custom-nav nav nav-pills nav-justified" id="statusTabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tabWinnerDaily" >Daily</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabWinnerWeekly" id="weekly" >Weekly</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabWinnerMonthly" id="monthly" >Monthly</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="tabWinnerDaily">
                <div class="container">
                    <div class="row no-gutters pick-date-wrapper">
                        <div class="col-5">
                            <div class="pick-date-item">
                                <input type="text" class="form-control" placeholder="Start Date">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="pick-date-item">
                                <input type="text" class="form-control" placeholder="End Date">
                            </div>
                        </div>
                        <div class="col-2">
                            <a href="#" class="btn btn-warning btn-block date-search-btn">
                                <img class="img-fluid" src="images/ico_search_black.png" alt="Search">
                            </a>
                        </div>
                    </div>
                    @foreach ($competitions as $competition)
                        @if ($competition->competition_type == 1)
                            <div class="competition-winner-box">
                                <div class="competition-info">
                                    <div class="media">
                                        <img class="mr-3 img-fluid" src="{{asset('/uploads/games/'.$competition->game['id'].'/'.$competition->game['image'])}}" alt="Pictures">
                                        <div class="media-body">
                                            <h5 class="mt-0 cominfo-game-title">{{$competition->game['name']}}</h5>
                                            <div class="cominfo-category">
                                                <span>{{ucfirst(trans($competition->game->category['name']))}}</span>
                                                @if ($competition['competition_type'] == 1)
                                                <span>
                                                    Daily
                                                </span>
                                                @endif
                                                @if ($competition['competition_type'] == 2)
                                                <span>
                                                    Weekly
                                                </span>
                                                @endif
                                                @if ($competition['competition_type'] == 3)
                                                <span>
                                                    Monthly
                                                </span>
                                                @endif
                                            </div>
                                            <div class="cominfo-date">Date: {{date('d-m-Y', strtotime($competition['competition_start_date']))}}</div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
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
                                                @if (file_exists( public_path().'/uploads/games/'.$competition->game['id'].'/'.$competition->prize_image1)){}
                                                    <img src="{{asset('/uploads/games/'.$competition->game['id'].'/'.$competition->prize_image1)}}" alt="Image" class="img-fluid">
                                                @else
                                                    <img class="rounded-circle" src="images/logo_jazz.png" alt="Images">
                                                @endif
                                            @endif
                                            @if ($winner->position == '2')
                                                @if (file_exists( public_path().'/uploads/games/'.$competition->game['id'].'/'.$competition->prize_image2)){}
                                                    <img src="{{asset('/uploads/games/'.$competition->game['id'].'/'.$competition->prize_image2)}}" alt="Image" class="img-fluid">
                                                @else
                                                    <img class="rounded-circle" src="images/logo_jazz.png" alt="Images">
                                                @endif
                                            @endif
                                            @if ($winner->position == '3')
                                                @if (file_exists( public_path().'/uploads/games/'.$competition->game['id'].'/'.$competition->prize_image3)){}
                                                    <img src="{{asset('/uploads/games/'.$competition->game['id'].'/'.$competition->prize_image3)}}" alt="Image" class="img-fluid">
                                                @else
                                                    <img class="rounded-circle" src="images/logo_jazz.png" alt="Images">
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>                            
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="tab-pane" id="tabWinnerWeekly">
                <div class="container">
                    <div class="row no-gutters pick-date-wrapper">
                        <div class="col-5">
                            <div class="pick-date-item">
                                <input type="text" class="form-control" placeholder="Start Date">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="pick-date-item">
                                <input type="text" class="form-control" placeholder="End Date">
                            </div>
                        </div>
                        <div class="col-2">
                            <a href="#" class="btn btn-warning btn-block date-search-btn">
                                <img class="img-fluid" src="images/ico_search_black.png" alt="Search">
                            </a>
                        </div>
                    </div>
                    @foreach ($competitions as $competition)
                        @if ($competition->competition_type == 2)
                            <div class="competition-winner-box">
                                <div class="competition-info">
                                    <div class="media">
                                        <img class="mr-3 img-fluid" src="{{asset('/uploads/games/'.$competition->game['id'].'/'.$competition->game['image'])}}" alt="Pictures">
                                        <div class="media-body">
                                            <h5 class="mt-0 cominfo-game-title">{{$competition->game['name']}}</h5>
                                            <div class="cominfo-category">
                                                <span>{{ucfirst(trans($competition->game->category['name']))}}</span>
                                                @if ($competition['competition_type'] == 1)
                                                <span>
                                                    Daily
                                                </span>
                                                @endif
                                                @if ($competition['competition_type'] == 2)
                                                <span>
                                                    Weekly
                                                </span>
                                                @endif
                                                @if ($competition['competition_type'] == 3)
                                                <span>
                                                    Monthly
                                                </span>
                                                @endif
                                            </div>
                                            <div class="cominfo-date">Date: {{date('d-m-Y', strtotime($competition['competition_start_date']))}}</div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
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
                                                @if (file_exists( public_path().'/uploads/games/'.$competition->game['id'].'/'.$competition->prize_image1)){}
                                                    <img src="{{asset('/uploads/games/'.$competition->game['id'].'/'.$competition->prize_image1)}}" alt="Image" class="img-fluid">
                                                @else
                                                    <img class="rounded-circle" src="images/logo_jazz.png" alt="Images">
                                                @endif
                                            @endif
                                            @if ($winner->position == '2')
                                                @if (file_exists( public_path().'/uploads/games/'.$competition->game['id'].'/'.$competition->prize_image2)){}
                                                    <img src="{{asset('/uploads/games/'.$competition->game['id'].'/'.$competition->prize_image2)}}" alt="Image" class="img-fluid">
                                                @else
                                                    <img class="rounded-circle" src="images/logo_jazz.png" alt="Images">
                                                @endif
                                            @endif
                                            @if ($winner->position == '3')
                                                @if (file_exists( public_path().'/uploads/games/'.$competition->game['id'].'/'.$competition->prize_image3)){}
                                                    <img src="{{asset('/uploads/games/'.$competition->game['id'].'/'.$competition->prize_image3)}}" alt="Image" class="img-fluid">
                                                @else
                                                    <img class="rounded-circle" src="images/logo_jazz.png" alt="Images">
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>                            
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="tab-pane" id="tabWinnerMonthly">
                <div class="container">
                    <div class="row no-gutters pick-date-wrapper">
                        <div class="col-5">
                            <div class="pick-date-item">
                                <input type="text" class="form-control" placeholder="Start Date">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="pick-date-item">
                                <input type="text" class="form-control" placeholder="End Date">
                            </div>
                        </div>
                        <div class="col-2">
                            <a href="#" class="btn btn-warning btn-block date-search-btn">
                                <img class="img-fluid" src="images/ico_search_black.png" alt="Search">
                            </a>
                        </div>
                    </div>
                    @foreach ($competitions as $competition)
                        @if ($competition->competition_type == 3)
                            <div class="competition-winner-box">
                                <div class="competition-info">
                                    <div class="media">
                                        <img class="mr-3 img-fluid" src="{{asset('/uploads/games/'.$competition->game['id'].'/'.$competition->game['image'])}}" alt="Pictures">
                                        <div class="media-body">
                                            <h5 class="mt-0 cominfo-game-title">{{$competition->game['name']}}</h5>
                                            <div class="cominfo-category">
                                                <span>{{ucfirst(trans($competition->game->category['name']))}}</span>
                                                @if ($competition['competition_type'] == 1)
                                                <span>
                                                    Daily
                                                </span>
                                                @endif
                                                @if ($competition['competition_type'] == 2)
                                                <span>
                                                    Weekly
                                                </span>
                                                @endif
                                                @if ($competition['competition_type'] == 3)
                                                <span>
                                                    Monthly
                                                </span>
                                                @endif
                                            </div>
                                            <div class="cominfo-date">Date: {{date('d-m-Y', strtotime($competition['competition_start_date']))}}</div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
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
                                                @if (file_exists( public_path().'/uploads/games/'.$competition->game['id'].'/'.$competition->prize_image1)){}
                                                    <img src="{{asset('/uploads/games/'.$competition->game['id'].'/'.$competition->prize_image1)}}" alt="Image" class="img-fluid">
                                                @else
                                                    <img class="rounded-circle" src="images/logo_jazz.png" alt="Images">
                                                @endif
                                            @endif
                                            @if ($winner->position == '2')
                                                @if (file_exists( public_path().'/uploads/games/'.$competition->game['id'].'/'.$competition->prize_image2)){}
                                                    <img src="{{asset('/uploads/games/'.$competition->game['id'].'/'.$competition->prize_image2)}}" alt="Image" class="img-fluid">
                                                @else
                                                    <img class="rounded-circle" src="images/logo_jazz.png" alt="Images">
                                                @endif
                                            @endif
                                            @if ($winner->position == '3')
                                                @if (file_exists( public_path().'/uploads/games/'.$competition->game['id'].'/'.$competition->prize_image3)){}
                                                    <img src="{{asset('/uploads/games/'.$competition->game['id'].'/'.$competition->prize_image3)}}" alt="Image" class="img-fluid">
                                                @else
                                                    <img class="rounded-circle" src="images/logo_jazz.png" alt="Images">
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>                            
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
