@extends('layouts.frontend_layout.frontend_design')

@section('content')
    <div class="custom-tabs">
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link active" href="{{url('competition')}}">Competition</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/winner')}}">Winner List</a>
            </li>
        </ul>
    </div>
    <div class="content-wrapper">
        <div class="container">
            <ul class="custom-nav nav nav-pills nav-fill" id="statusTabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tabCurrent" >Current</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabComingSoon" >Coming Soon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabFinish" >Finish</a>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane active" id="tabCurrent">
                <section id="dailyCompetitionCurrent" class="container">
                    <div class="row section-heading">
                        <div class="col-7 text-left">
                            <p class="page-heading">Daily Competition</p>
                        </div>
                        <div class="col-5 text-right">
                            <a href="#" class="heading-link">See More</a>
                        </div>
                    </div>
                    <div class="slide-competititon">
                        @foreach ($competition_list as $comp)
                            @if ($comp->competition_type == 1)
                                <div class="slide-competititon-box">
                                    <div class="combox-cover">
                                        @if (file_exists( public_path().'/uploads/prizes/'.$comp->id.'/'.$comp->banner_image)){}
                                            <img src="{{asset('/uploads/prizes/'.$comp->id.'/'.$comp->banner_image)}}" alt="Image" class="img-fluid">
                                        @else
                                            <img src="{{asset('/images/zombiehillrace_banner.png')}}" class="img-fluid" alt="Banner">
                                        @endif
                                    </div>
                                    <div class="media">
                                        <img class="mr-3 img-fluid" src="{{asset('/uploads/games/'.$comp->game_id.'/'.$comp->game_image)}}" alt="Pictures">
                                        <div class="media-body">
                                            <h5 class="mt-0 combox-game-title">{{$comp->game_name}}</h5>
                                            <div class="combox-category">
                                                <span>{{$comp->category_name->category_name}}</span>
                                                <span>Daily</span>
                                            </div>
                                            <div class="combox-date">Date: {{$comp->start_date}}</div>
                                        </div>
                                    </div>
                                    <div class="combox-prize">
                                        <div class="row no-gutters">
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_01.png" alt="Gold">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image1)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_02.png" alt="Silver">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image2)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_03.png" alt="Bronze">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image3)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3 position-relative">
                                                <a href="{{asset('/games/'.$comp->game_uuid.'/index.html')}}" class="combox-btn">Play<br>Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>
                {{-- <section id="hotCompetitionCurrent" class="container">
                    <div class="row section-heading">
                        <div class="col-7 text-left">
                            <p class="page-heading">Hot Competition</p>
                        </div>
                        <div class="col-5 text-right">
                            <a href="#" class="heading-link">See More</a>
                        </div>
                    </div>
                    <div class="slide-competititon">
                        <div class="slide-competititon-box">
                            <div class="combox-status">
                                <img src="images/ico_fire.png" alt="Hot">
                                <span>Hot Competition</span>
                            </div>
                            <div class="combox-cover">
                                <img src="images/zombiehillrace_banner.png" class="img-fluid" alt="Banner">
                            </div>
                            <div class="media">
                                <img class="mr-3 img-fluid" src="images/zombiehillrace_banner_ico.png" alt="Pictures">
                                <div class="media-body">
                                    <h5 class="mt-0 combox-game-title">Zombie Hill Race1</h5>
                                    <div class="combox-category">
                                        <span>Adventure</span>
                                        <span>Daily</span>
                                    </div>
                                    <div class="combox-date">Date: 02-04-2020</div>
                                </div>
                            </div>
                            <div class="combox-prize">
                                <div class="row no-gutters">
                                    <div class="col-3">
                                        <div class="combox-prize-wrapper">
                                            <div class="badge-prize">
                                                <img class="img-fluid" src="images/winner_01.png" alt="Gold">
                                            </div>
                                            <img src="images/img_iphone.png" alt="Image" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="combox-prize-wrapper">
                                            <div class="badge-prize">
                                                <img class="img-fluid" src="images/winner_02.png" alt="Silver">
                                            </div>
                                            <img src="images/img_gopro.png" alt="Image" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="combox-prize-wrapper">
                                            <div class="badge-prize">
                                                <img class="img-fluid" src="images/winner_03.png" alt="Bronze">
                                            </div>
                                            <img src="images//img_ps.png" alt="Image" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-3 position-relative">
                                        <a href="#" class="combox-btn">Play<br>Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-competititon-box">
                            <div class="combox-status">
                                <img src="images/ico_fire.png" alt="Hot">
                                <span>Hot Competition</span>
                            </div>
                            <div class="combox-cover">
                                <img src="images/zombiehillrace_banner.png" class="img-fluid" alt="Banner">
                            </div>
                            <div class="media">
                                <img class="mr-3 img-fluid" src="images/zombiehillrace_banner_ico.png" alt="Pictures">
                                <div class="media-body">
                                    <h5 class="mt-0 combox-game-title">Zombie Hill Race2</h5>
                                    <div class="combox-category">
                                        <span>Adventure</span>
                                        <span>Daily</span>
                                    </div>
                                    <div class="combox-date">Date: 02-04-2020</div>
                                </div>
                            </div>
                            <div class="combox-prize">
                                <div class="row no-gutters">
                                    <div class="col-3">
                                        <div class="combox-prize-wrapper">
                                            <div class="badge-prize">
                                                <img class="img-fluid" src="images/winner_01.png" alt="Gold">
                                            </div>
                                            <img src="images/img_iphone.png" alt="Image" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="combox-prize-wrapper">
                                            <div class="badge-prize">
                                                <img class="img-fluid" src="images/winner_02.png" alt="Silver">
                                            </div>
                                            <img src="images/img_gopro.png" alt="Image" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="combox-prize-wrapper">
                                            <div class="badge-prize">
                                                <img class="img-fluid" src="images/winner_03.png" alt="Bronze">
                                            </div>
                                            <img src="images//img_ps.png" alt="Image" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-3 position-relative">
                                        <a href="#" class="combox-btn">Play<br>Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> 
                <div class="section-divider"></div>--}}
                
                <div class="section-divider"></div>
                <section id="weeklyCompetitionCurrent" class="container">
                    <div class="row section-heading">
                        <div class="col-7 text-left">
                            <p class="page-heading">Weekly Competition</p>
                        </div>
                        <div class="col-5 text-right">
                            <a href="#" class="heading-link">See More</a>
                        </div>
                    </div>
                    <div class="slide-competititon">
                        @foreach ($competition_list as $comp)
                            @if ($comp->competition_type == 2)
                                <div class="slide-competititon-box">
                                    <div class="combox-cover">
                                        @if (file_exists( public_path().'/uploads/prizes/'.$comp->id.'/'.$comp->banner_image)){}
                                            <img src="{{asset('/uploads/prizes/'.$comp->id.'/'.$comp->banner_image)}}" alt="Image" class="img-fluid">
                                        @else
                                            <img src="{{asset('/images/zombiehillrace_banner.png')}}" class="img-fluid" alt="Banner">
                                        @endif
                                    </div>
                                    <div class="media">
                                        <img class="mr-3 img-fluid" src="{{asset('/uploads/games/'.$comp->game_id.'/'.$comp->game_image)}}" alt="Pictures">
                                        <div class="media-body">
                                            <h5 class="mt-0 combox-game-title">{{$comp->game_name}}</h5>
                                            <div class="combox-category">
                                                <span>{{$comp->category_name->category_name}}</span>
                                                <span>Weekly</span>
                                            </div>
                                            <div class="combox-date">Date: {{$comp->start_date}}</div>
                                        </div>
                                    </div>
                                    <div class="combox-prize">
                                        <div class="row no-gutters">
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_01.png" alt="Gold">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image1)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_02.png" alt="Silver">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image2)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_03.png" alt="Bronze">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image3)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3 position-relative">
                                                <a href="{{$comp->game_url}}" class="combox-btn">Play<br>Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>
                {{--<div class="section-divider"></div>
                 <section id="monthlyCompetitionCurrent" class="container">
                    <div class="row section-heading">
                        <div class="col-7 text-left">
                            <p class="page-heading">Monthly Competition</p>
                        </div>
                        <div class="col-5 text-right">
                            <a href="#" class="heading-link">See More</a>
                        </div>
                    </div>
                    <div class="slide-competititon">
                        @foreach ($competition_list as $comp)
                            @if ($comp->competition_type == 3)
                                <div class="slide-competititon-box">
                                    <div class="combox-cover">
                                        <img src="{{asset('/images/zombiehillrace_banner.png')}}" class="img-fluid" alt="Banner">
                                    </div>
                                    <div class="media">
                                        <img class="mr-3 img-fluid" src="{{asset('/uploads/games/'.$comp->game_id.'/'.$comp->game_image)}}" alt="Pictures">
                                        <div class="media-body">
                                            <h5 class="mt-0 combox-game-title">{{$comp->game_name}}</h5>
                                            <div class="combox-category">
                                                <span>{{$comp->game_desc}}</span>
                                                <span>Monthly</span>
                                            </div>
                                            <div class="combox-date">Date: {{$comp->start_date}}</div>
                                        </div>
                                    </div>
                                    <div class="combox-prize">
                                        <div class="row no-gutters">
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_01.png" alt="Gold">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image1)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_02.png" alt="Silver">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image2)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_03.png" alt="Bronze">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image3)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3 position-relative">
                                                <a href="{{$comp->game_url}}" class="combox-btn">Play<br>Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section> --}}
            </div>
            <div class="tab-pane" id="tabComingSoon">
                <section id="dailyCompetitionComing" class="container">
                    <div class="row section-heading">
                        <div class="col-7 text-left">
                            <p class="page-heading">Daily Competition</p>
                        </div>
                        <div class="col-5 text-right">
                            <a href="#" class="heading-link">See More</a>
                        </div>
                    </div>
                    <div class="slide-competititon">
                        @foreach ($competition_list as $comp)
                            @if ($comp->competition_type == 1)
                                <div class="slide-competititon-box">
                                    <div class="combox-cover">
                                        @if (file_exists( public_path().'/uploads/prizes/'.$comp->id.'/'.$comp->banner_image)){}
                                            <img src="{{asset('/uploads/prizes/'.$comp->id.'/'.$comp->banner_image)}}" alt="Image" class="img-fluid">
                                        @else
                                            <img src="{{asset('/images/zombiehillrace_banner.png')}}" class="img-fluid" alt="Banner">
                                        @endif
                                    </div>
                                    <div class="media">
                                        <img class="mr-3 img-fluid" src="{{asset('/uploads/games/'.$comp->game_id.'/'.$comp->game_image)}}" alt="Pictures">
                                        <div class="media-body">
                                            <h5 class="mt-0 combox-game-title">{{$comp->game_name}}</h5>
                                            <div class="combox-category">
                                                <span>{{$comp->category_name->category_name}}</span>
                                                <span>Daily</span>
                                            </div>
                                            <div class="combox-date">Date: {{$comp->start_date}}</div>
                                        </div>
                                    </div>
                                    <div class="combox-prize">
                                        <div class="row no-gutters">
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_01.png" alt="Gold">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image1)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_02.png" alt="Silver">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image2)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_03.png" alt="Bronze">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image3)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3 position-relative">
                                                {{-- <a href="{{$comp->game_url}}" class="combox-btn">Play<br>Now</a> --}}
                                                <a href="#" class="combox-btn disabled">Coming<br>Soon</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>
                <div class="section-divider"></div>
                <section id="weeklyCompetitionComing" class="container">
                    <div class="row section-heading">
                        <div class="col-7 text-left">
                            <p class="page-heading">Weekly Competition</p>
                        </div>
                        <div class="col-5 text-right">
                            <a href="#" class="heading-link">See More</a>
                        </div>
                    </div>
                    <div class="slide-competititon">
                        @foreach ($competition_list as $comp)
                            @if ($comp->competition_type == 2)
                                <div class="slide-competititon-box">
                                    <div class="combox-cover">
                                        @if (file_exists( public_path().'/uploads/prizes/'.$comp->id.'/'.$comp->banner_image)){}
                                            <img src="{{asset('/uploads/prizes/'.$comp->id.'/'.$comp->banner_image)}}" alt="Image" class="img-fluid">
                                        @else
                                            <img src="{{asset('/images/zombiehillrace_banner.png')}}" class="img-fluid" alt="Banner">
                                        @endif
                                    </div>
                                    <div class="media">
                                        <img class="mr-3 img-fluid" src="{{asset('/uploads/games/'.$comp->game_id.'/'.$comp->game_image)}}" alt="Pictures">
                                        <div class="media-body">
                                            <h5 class="mt-0 combox-game-title">{{$comp->game_name}}</h5>
                                            <div class="combox-category">
                                                <span>{{$comp->category_name->category_name}}</span>
                                                <span>Weekly</span>
                                            </div>
                                            <div class="combox-date">Date: {{$comp->start_date}}</div>
                                        </div>
                                    </div>
                                    <div class="combox-prize">
                                        <div class="row no-gutters">
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_01.png" alt="Gold">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image1)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_02.png" alt="Silver">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image2)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_03.png" alt="Bronze">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image3)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3 position-relative">
                                                {{-- <a href="{{$comp->game_url}}" class="combox-btn">Play<br>Now</a> --}}
                                                <a href="#" class="combox-btn disabled">Coming<br>Soon</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>
            </div>
            <div class="tab-pane" id="tabFinish">
                {{-- <section id="hotCompetitionFinish" class="container">
                    <div class="row section-heading">
                        <div class="col-7 text-left">
                            <p class="page-heading">Hot Competition</p>
                        </div>
                        <div class="col-5 text-right">
                            <a href="#" class="heading-link">See More</a>
                        </div>
                    </div>
                    <div class="slide-competititon">
                        <div class="slide-competititon-box">
                            <div class="combox-status">
                                <img src="images/ico_fire.png" alt="Hot">
                                <span>Hot Competition</span>
                            </div>
                            <div class="combox-cover">
                                <img src="images/zombiehillrace_banner.png" class="img-fluid" alt="Banner">
                            </div>
                            <div class="media">
                                <img class="mr-3 img-fluid" src="images/zombiehillrace_banner_ico.png" alt="Pictures">
                                <div class="media-body">
                                    <h5 class="mt-0 combox-game-title">Zombie Hill Race</h5>
                                    <div class="combox-category">
                                        <span>Adventure</span>
                                        <span>Daily</span>
                                    </div>
                                    <div class="combox-date">Date: 02-04-2020</div>
                                </div>
                            </div>
                            <div class="combox-prize">
                                <div class="row no-gutters">
                                    <div class="col-3">
                                        <div class="combox-prize-wrapper">
                                            <div class="badge-prize">
                                                <img class="img-fluid" src="images/winner_01.png" alt="Gold">
                                            </div>
                                            <img src="images/img_iphone.png" alt="Image" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="combox-prize-wrapper">
                                            <div class="badge-prize">
                                                <img class="img-fluid" src="images/winner_02.png" alt="Silver">
                                            </div>
                                            <img src="images/img_gopro.png" alt="Image" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="combox-prize-wrapper">
                                            <div class="badge-prize">
                                                <img class="img-fluid" src="images/winner_03.png" alt="Bronze">
                                            </div>
                                            <img src="images//img_ps.png" alt="Image" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-3 position-relative">
                                        <a href="#" class="combox-btn disabled" aria-disabled="true">Finish</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-competititon-box">
                            <div class="combox-status">
                                <img src="images/ico_fire.png" alt="Hot">
                                <span>Hot Competition</span>
                            </div>
                            <div class="combox-cover">
                                <img src="images/zombiehillrace_banner.png" class="img-fluid" alt="Banner">
                            </div>
                            <div class="media">
                                <img class="mr-3 img-fluid" src="images/zombiehillrace_banner_ico.png" alt="Pictures">
                                <div class="media-body">
                                    <h5 class="mt-0 combox-game-title">Zombie Hill Race</h5>
                                    <div class="combox-category">
                                        <span>Adventure</span>
                                        <span>Daily</span>
                                    </div>
                                    <div class="combox-date">Date: 02-04-2020</div>
                                </div>
                            </div>
                            <div class="combox-prize">
                                <div class="row no-gutters">
                                    <div class="col-3">
                                        <div class="combox-prize-wrapper">
                                            <div class="badge-prize">
                                                <img class="img-fluid" src="images/winner_01.png" alt="Gold">
                                            </div>
                                            <img src="images/img_iphone.png" alt="Image" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="combox-prize-wrapper">
                                            <div class="badge-prize">
                                                <img class="img-fluid" src="images/winner_02.png" alt="Silver">
                                            </div>
                                            <img src="images/img_gopro.png" alt="Image" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="combox-prize-wrapper">
                                            <div class="badge-prize">
                                                <img class="img-fluid" src="images/winner_03.png" alt="Bronze">
                                            </div>
                                            <img src="images//img_ps.png" alt="Image" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-3 position-relative">
                                        <a href="#" class="combox-btn disabled" aria-disabled="true">Finish</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> --}}
                {{-- <div class="section-divider"></div> --}}
                <section id="dailyCompetitionFinish" class="container">
                    <div class="row section-heading">
                        <div class="col-7 text-left">
                            <p class="page-heading">Daily Competition</p>
                        </div>
                        <div class="col-5 text-right">
                            <a href="#" class="heading-link">See More</a>
                        </div>
                    </div>
                    <div class="slide-competititon">
                        @foreach ($competition_list as $comp)
                            @if ($comp->competition_type == 1)
                                <div class="slide-competititon-box">
                                    <div class="combox-cover">
                                        @if (file_exists( public_path().'/uploads/prizes/'.$comp->id.'/'.$comp->banner_image)){}
                                            <img src="{{asset('/uploads/prizes/'.$comp->id.'/'.$comp->banner_image)}}" alt="Image" class="img-fluid">
                                        @else
                                            <img src="{{asset('/images/zombiehillrace_banner.png')}}" class="img-fluid" alt="Banner">
                                        @endif
                                    </div>
                                    <div class="media">
                                        <img class="mr-3 img-fluid" src="{{asset('/uploads/games/'.$comp->game_id.'/'.$comp->game_image)}}" alt="Pictures">
                                        <div class="media-body">
                                            <h5 class="mt-0 combox-game-title">{{$comp->game_name}}</h5>
                                            <div class="combox-category">
                                                <span>{{$comp->category_name->category_name}}</span>
                                                <span>Daily</span>
                                            </div>
                                            <div class="combox-date">Date: {{$comp->start_date}}</div>
                                        </div>
                                    </div>
                                    <div class="combox-prize">
                                        <div class="row no-gutters">
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_01.png" alt="Gold">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image1)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_02.png" alt="Silver">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image2)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_03.png" alt="Bronze">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image3)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3 position-relative">
                                                {{-- <a href="{{$comp->game_url}}" class="combox-btn">Play<br>Now</a> --}}
                                                <a href="#" class="combox-btn disabled">Finished</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>
                <div class="section-divider"></div>
                <section id="weeklyCompetitionFinish" class="container">
                    <div class="row section-heading">
                        <div class="col-7 text-left">
                            <p class="page-heading">Weekly Competition</p>
                        </div>
                        <div class="col-5 text-right">
                            <a href="#" class="heading-link">See More</a>
                        </div>
                    </div>
                    <div class="slide-competititon">
                        @foreach ($competition_list as $comp)
                            @if ($comp->competition_type == 2)
                                <div class="slide-competititon-box">
                                    <div class="combox-cover">
                                        @if (file_exists( public_path().'/uploads/prizes/'.$comp->id.'/'.$comp->banner_image))
                                            <img src="{{asset('/uploads/prizes/'.$comp->id.'/'.$comp->banner_image)}}" alt="Image" class="img-fluid">
                                        @else
                                            <img src="{{asset('/images/zombiehillrace_banner.png')}}" class="img-fluid" alt="Banner">
                                        @endif
                                    </div>
                                    <div class="media">
                                        <img class="mr-3 img-fluid" src="{{asset('/uploads/games/'.$comp->game_id.'/'.$comp->game_image)}}" alt="Pictures">
                                        <div class="media-body">
                                            <h5 class="mt-0 combox-game-title">{{$comp->game_name}}</h5>
                                            <div class="combox-category">
                                                <span>{{$comp->category_name->category_name}}</span>
                                                <span>Weekly</span>
                                            </div>
                                            <div class="combox-date">Date: {{$comp->start_date}}</div>
                                        </div>
                                    </div>
                                    <div class="combox-prize">
                                        <div class="row no-gutters">
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_01.png" alt="Gold">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image1)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_02.png" alt="Silver">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image2)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="combox-prize-wrapper">
                                                    <div class="badge-prize">
                                                        <img class="img-fluid" src="images/winner_03.png" alt="Bronze">
                                                    </div>
                                                    <img src="{{asset('/uploads/images/prize_images/'.$comp->id.'/'.$comp->prize_image3)}}" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-3 position-relative">
                                                {{-- <a href="{{$comp->game_url}}" class="combox-btn">Play<br>Now</a> --}}
                                                <a href="#" class="combox-btn disabled">Finished</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
