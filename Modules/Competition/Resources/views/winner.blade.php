@extends('layouts.frontend_layout.frontend_design')

@section('content')
    <div class="custom-tabs">
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link" href="{{url('competition')}}">Competition</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{url('competition/winner')}}">Winner List</a>
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
                    <a class="nav-link" data-toggle="tab" href="#tabWinnerWeekly" >Weekly</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabWinnerMonthly" >Monthly</a>
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
                                <img class="img-fluid" src="{{ asset('images/ico_search_black.png')}}" alt="Search">
                            </a>
                        </div>
                    </div>

                    <div class="competition-winner-box">
                        <div class="competition-info">
                            <div class="media">
                                <img class="mr-3 img-fluid" src="{{ asset('images/zombiehillrace_banner_ico.png')}}" alt="Pictures">
                                <div class="media-body">
                                    <h5 class="mt-0 cominfo-game-title">Zombie Hill Race</h5>
                                    <div class="cominfo-category">
                                        <span>Adventure</span>
                                        <span>Daily</span>
                                    </div>
                                    <div class="cominfo-date">Date: 02-04-2020</div>
                                </div>
                            </div>
                        </div>
                        <div class="winner-list-item">
                            <div class="media align-items-center">
                                <div class="winner-list-item-pic mr-3">
                                    <div class="winner-list-item-badge">
                                        <img class="img-fluid" src="{{ asset('images/winner_01.png')}}" alt="Gold">
                                    </div>
                                    <img class="rounded-circle" src="{{ asset('images/img_people_01.png')}}" alt="Images">
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 winner-list-item-name text-truncate">Ervan Sadi</h5>
                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="{{ asset('images/ico_coin.svg')}}" alt="Point"></span>&nbsp;243 Point</p>
                                    <p class="winner-list-item-date">June 17, 2020</p>
                                </div>
                                <div class="winner-list-item-prize">
                                    <img src="{{ asset('images/img_iphone.png')}}" alt="Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="winner-list-item">
                            <div class="media align-items-center">
                                <div class="winner-list-item-pic mr-3">
                                    <div class="winner-list-item-badge">
                                        <img class="img-fluid" src="{{ asset('images/winner_02.png')}}" alt="Silver">
                                    </div>
                                    <img class="rounded-circle" src="{{ asset('images/img_people_02.png')}}" alt="Images">
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 winner-list-item-name text-truncate">Amilia</h5>
                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="{{ asset('images/ico_coin.svg')}}" alt="Point"></span>&nbsp;210 Point</p>
                                    <p class="winner-list-item-date">June 17, 2020</p>
                                </div>
                                <div class="winner-list-item-prize">
                                    <img src="{{ asset('images/img_gopro.png')}}" alt="Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="winner-list-item">
                            <div class="media align-items-center">
                                <div class="winner-list-item-pic mr-3">
                                    <div class="winner-list-item-badge">
                                        <img class="img-fluid" src="{{ asset('images/winner_03.png')}}" alt="Bronze">
                                    </div>
                                    <img class="rounded-circle" src="{{ asset('images/img_people_03.png')}}" alt="Images">
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 winner-list-item-name text-truncate">Albert Rivaldo</h5>
                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="{{ asset('images/ico_coin.svg')}}" alt="Point"></span>&nbsp;180 Point</p>
                                    <p class="winner-list-item-date">June 17, 2020</p>
                                </div>
                                <div class="winner-list-item-prize">
                                    <img src="{{ asset('images/img_ps.png')}}" alt="Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="competition-winner-box">
                        <div class="competition-info">
                            <div class="media">
                                <img class="mr-3 img-fluid" src="{{ asset('images/zombiehillrace_banner_ico.png')}}" alt="Pictures">
                                <div class="media-body">
                                    <h5 class="mt-0 cominfo-game-title">Car Car Crash</h5>
                                    <div class="cominfo-category">
                                        <span>Adventure</span>
                                        <span>Daily</span>
                                    </div>
                                    <div class="cominfo-date">Date: 02-04-2020</div>
                                </div>
                            </div>
                        </div>
                        <div class="winner-list-item">
                            <div class="media align-items-center">
                                <div class="winner-list-item-pic mr-3">
                                    <div class="winner-list-item-badge">
                                        <img class="img-fluid" src="{{ asset('images/winner_01.png')}}" alt="Gold">
                                    </div>
                                    <img class="rounded-circle" src="{{ asset('images/img_people_01.png')}}" alt="Images">
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 winner-list-item-name text-truncate">Ervan Sadi</h5>
                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="{{ asset('images/ico_coin.svg')}}" alt="Point"></span>&nbsp;243 Point</p>
                                    <p class="winner-list-item-date">June 17, 2020</p>
                                </div>
                                <div class="winner-list-item-prize">
                                    <img src="{{ asset('images/img_iphone.png')}}" alt="Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="winner-list-item">
                            <div class="media align-items-center">
                                <div class="winner-list-item-pic mr-3">
                                    <div class="winner-list-item-badge">
                                        <img class="img-fluid" src="{{ asset('images/winner_02.png')}}" alt="Silver">
                                    </div>
                                    <img class="rounded-circle" src="{{ asset('images/img_people_02.png')}}" alt="Images">
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 winner-list-item-name text-truncate">Amilia</h5>
                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="{{ asset('images/ico_coin.svg')}}" alt="Point"></span>&nbsp;210 Point</p>
                                    <p class="winner-list-item-date">June 17, 2020</p>
                                </div>
                                <div class="winner-list-item-prize">
                                    <img src="{{ asset('images/img_gopro.png')}}" alt="Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="winner-list-item">
                            <div class="media align-items-center">
                                <div class="winner-list-item-pic mr-3">
                                    <div class="winner-list-item-badge">
                                        <img class="img-fluid" src="{{ asset('images/winner_03.png')}}" alt="Bronze">
                                    </div>
                                    <img class="rounded-circle" src="{{ asset('images/img_people_03.png')}}" alt="Images">
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 winner-list-item-name text-truncate">Albert Rivaldo</h5>
                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="{{ asset('images/ico_coin.svg')}}" alt="Point"></span>&nbsp;180 Point</p>
                                    <p class="winner-list-item-date">June 17, 2020</p>
                                </div>
                                <div class="winner-list-item-prize">
                                    <img src="{{ asset('images/img_ps.png')}}" alt="Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

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
                                <img class="img-fluid" src="{{ asset('images/ico_search_black.png')}}" alt="Search">
                            </a>
                        </div>
                    </div>

                    <div class="competition-winner-box">
                        <div class="competition-info">
                            <div class="media">
                                <img class="mr-3 img-fluid" src="{{ asset('images/zombiehillrace_banner_ico.png')}}" alt="Pictures">
                                <div class="media-body">
                                    <h5 class="mt-0 cominfo-game-title">Monster Car</h5>
                                    <div class="cominfo-category">
                                        <span>Adventure</span>
                                        <span>Daily</span>
                                    </div>
                                    <div class="cominfo-date">Date: 02-04-2020</div>
                                </div>
                            </div>
                        </div>
                        <div class="winner-list-item">
                            <div class="media align-items-center">
                                <div class="winner-list-item-pic mr-3">
                                    <div class="winner-list-item-badge">
                                        <img class="img-fluid" src="{{ asset('images/winner_01.png')}}" alt="Gold">
                                    </div>
                                    <img class="rounded-circle" src="{{ asset('images/img_people_01.png')}}" alt="Images">
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 winner-list-item-name text-truncate">Ervan Sadi</h5>
                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="{{ asset('images/ico_coin.svg')}}" alt="Point"></span>&nbsp;243 Point</p>
                                    <p class="winner-list-item-date">June 17, 2020</p>
                                </div>
                                <div class="winner-list-item-prize">
                                    <img src="{{ asset('images/img_iphone.png')}}" alt="Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="winner-list-item">
                            <div class="media align-items-center">
                                <div class="winner-list-item-pic mr-3">
                                    <div class="winner-list-item-badge">
                                        <img class="img-fluid" src="{{ asset('images/winner_02.png')}}" alt="Silver">
                                    </div>
                                    <img class="rounded-circle" src="{{ asset('images/img_people_02.png')}}" alt="Images">
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 winner-list-item-name text-truncate">Amilia</h5>
                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="{{ asset('images/ico_coin.svg')}}" alt="Point"></span>&nbsp;210 Point</p>
                                    <p class="winner-list-item-date">June 17, 2020</p>
                                </div>
                                <div class="winner-list-item-prize">
                                    <img src="{{ asset('images/img_gopro.png')}}" alt="Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="winner-list-item">
                            <div class="media align-items-center">
                                <div class="winner-list-item-pic mr-3">
                                    <div class="winner-list-item-badge">
                                        <img class="img-fluid" src="{{ asset('images/winner_03.png')}}" alt="Bronze">
                                    </div>
                                    <img class="rounded-circle" src="{{ asset('images/img_people_03.png')}}" alt="Images">
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 winner-list-item-name text-truncate">Albert Rivaldo</h5>
                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="{{ asset('images/ico_coin.svg')}}" alt="Point"></span>&nbsp;180 Point</p>
                                    <p class="winner-list-item-date">June 17, 2020</p>
                                </div>
                                <div class="winner-list-item-prize">
                                    <img src="{{ asset('images/img_ps.png')}}" alt="Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="competition-winner-box">
                        <div class="competition-info">
                            <div class="media">
                                <img class="mr-3 img-fluid" src="{{ asset('images/zombiehillrace_banner_ico.png')}}" alt="Pictures">
                                <div class="media-body">
                                    <h5 class="mt-0 cominfo-game-title">Car Car Crash</h5>
                                    <div class="cominfo-category">
                                        <span>Adventure</span>
                                        <span>Daily</span>
                                    </div>
                                    <div class="cominfo-date">Date: 02-04-2020</div>
                                </div>
                            </div>
                        </div>
                        <div class="winner-list-item">
                            <div class="media align-items-center">
                                <div class="winner-list-item-pic mr-3">
                                    <div class="winner-list-item-badge">
                                        <img class="img-fluid" src="{{ asset('images/winner_01.png')}}" alt="Gold">
                                    </div>
                                    <img class="rounded-circle" src="{{ asset('images/img_people_01.png')}}" alt="Images">
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 winner-list-item-name text-truncate">Ervan Sadi</h5>
                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="{{ asset('images/ico_coin.svg')}}" alt="Point"></span>&nbsp;243 Point</p>
                                    <p class="winner-list-item-date">June 17, 2020</p>
                                </div>
                                <div class="winner-list-item-prize">
                                    <img src="{{ asset('images/img_iphone.png')}}" alt="Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="winner-list-item">
                            <div class="media align-items-center">
                                <div class="winner-list-item-pic mr-3">
                                    <div class="winner-list-item-badge">
                                        <img class="img-fluid" src="{{ asset('images/winner_02.png')}}" alt="Silver">
                                    </div>
                                    <img class="rounded-circle" src="{{ asset('images/img_people_02.png')}}" alt="Images">
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 winner-list-item-name text-truncate">Amilia</h5>
                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="{{ asset('images/ico_coin.svg')}}" alt="Point"></span>&nbsp;210 Point</p>
                                    <p class="winner-list-item-date">June 17, 2020</p>
                                </div>
                                <div class="winner-list-item-prize">
                                    <img src="{{ asset('images/img_gopro.png')}}" alt="Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="winner-list-item">
                            <div class="media align-items-center">
                                <div class="winner-list-item-pic mr-3">
                                    <div class="winner-list-item-badge">
                                        <img class="img-fluid" src="{{ asset('images/winner_03.png')}}" alt="Bronze">
                                    </div>
                                    <img class="rounded-circle" src="{{ asset('images/img_people_03.png')}}" alt="Images">
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 winner-list-item-name text-truncate">Albert Rivaldo</h5>
                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="{{ asset('images/ico_coin.svg')}}" alt="Point"></span>&nbsp;180 Point</p>
                                    <p class="winner-list-item-date">June 17, 2020</p>
                                </div>
                                <div class="winner-list-item-prize">
                                    <img src="{{ asset('images/img_ps.png')}}" alt="Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

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
                                <img class="img-fluid" src="{{ asset('images/ico_search_black.png')}}" alt="Search">
                            </a>
                        </div>
                    </div>

                    <div class="competition-winner-box">
                        <div class="competition-info">
                            <div class="media">
                                <img class="mr-3 img-fluid" src="{{ asset('images/zombiehillrace_banner_ico.png')}}" alt="Pictures">
                                <div class="media-body">
                                    <h5 class="mt-0 cominfo-game-title">Phantom Troops</h5>
                                    <div class="cominfo-category">
                                        <span>Adventure</span>
                                        <span>Daily</span>
                                    </div>
                                    <div class="cominfo-date">Date: 02-04-2020</div>
                                </div>
                            </div>
                        </div>
                        <div class="winner-list-item">
                            <div class="media align-items-center">
                                <div class="winner-list-item-pic mr-3">
                                    <div class="winner-list-item-badge">
                                        <img class="img-fluid" src="{{ asset('images/winner_01.png')}}" alt="Gold">
                                    </div>
                                    <img class="rounded-circle" src="{{ asset('images/img_people_01.png')}}" alt="Images">
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 winner-list-item-name text-truncate">Ervan Sadi</h5>
                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="{{ asset('images/ico_coin.svg')}}" alt="Point"></span>&nbsp;243 Point</p>
                                    <p class="winner-list-item-date">June 17, 2020</p>
                                </div>
                                <div class="winner-list-item-prize">
                                    <img src="{{ asset('images/img_iphone.png')}}" alt="Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="winner-list-item">
                            <div class="media align-items-center">
                                <div class="winner-list-item-pic mr-3">
                                    <div class="winner-list-item-badge">
                                        <img class="img-fluid" src="{{ asset('images/winner_02.png')}}" alt="Silver">
                                    </div>
                                    <img class="rounded-circle" src="{{ asset('images/img_people_02.png')}}" alt="Images">
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 winner-list-item-name text-truncate">Amilia</h5>
                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="{{ asset('images/ico_coin.svg')}}" alt="Point"></span>&nbsp;210 Point</p>
                                    <p class="winner-list-item-date">June 17, 2020</p>
                                </div>
                                <div class="winner-list-item-prize">
                                    <img src="{{ asset('images/img_gopro.png')}}" alt="Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="winner-list-item">
                            <div class="media align-items-center">
                                <div class="winner-list-item-pic mr-3">
                                    <div class="winner-list-item-badge">
                                        <img class="img-fluid" src="{{ asset('images/winner_03.png')}}" alt="Bronze">
                                    </div>
                                    <img class="rounded-circle" src="{{ asset('images/img_people_03.png')}}" alt="Images">
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 winner-list-item-name text-truncate">Albert Rivaldo</h5>
                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="{{ asset('images/ico_coin.svg')}}" alt="Point"></span>&nbsp;180 Point</p>
                                    <p class="winner-list-item-date">June 17, 2020</p>
                                </div>
                                <div class="winner-list-item-prize">
                                    <img src="{{ asset('images/img_ps.png')}}" alt="Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="competition-winner-box">
                        <div class="competition-info">
                            <div class="media">
                                <img class="mr-3 img-fluid" src="{{ asset('images/zombiehillrace_banner_ico.png')}}" alt="Pictures">
                                <div class="media-body">
                                    <h5 class="mt-0 cominfo-game-title">Car Car Crash</h5>
                                    <div class="cominfo-category">
                                        <span>Adventure</span>
                                        <span>Daily</span>
                                    </div>
                                    <div class="cominfo-date">Date: 02-04-2020</div>
                                </div>
                            </div>
                        </div>
                        <div class="winner-list-item">
                            <div class="media align-items-center">
                                <div class="winner-list-item-pic mr-3">
                                    <div class="winner-list-item-badge">
                                        <img class="img-fluid" src="{{ asset('images/winner_01.png')}}" alt="Gold">
                                    </div>
                                    <img class="rounded-circle" src="{{ asset('images/img_people_01.png')}}" alt="Images">
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 winner-list-item-name text-truncate">Ervan Sadi</h5>
                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="{{ asset('images/ico_coin.svg')}}" alt="Point"></span>&nbsp;243 Point</p>
                                    <p class="winner-list-item-date">June 17, 2020</p>
                                </div>
                                <div class="winner-list-item-prize">
                                    <img src="{{ asset('images/img_iphone.png')}}" alt="Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="winner-list-item">
                            <div class="media align-items-center">
                                <div class="winner-list-item-pic mr-3">
                                    <div class="winner-list-item-badge">
                                        <img class="img-fluid" src="{{ asset('images/winner_02.png')}}" alt="Silver">
                                    </div>
                                    <img class="rounded-circle" src="{{ asset('images/img_people_02.png')}}" alt="Images">
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 winner-list-item-name text-truncate">Amilia</h5>
                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="{{ asset('images/ico_coin.svg')}}" alt="Point"></span>&nbsp;210 Point</p>
                                    <p class="winner-list-item-date">June 17, 2020</p>
                                </div>
                                <div class="winner-list-item-prize">
                                    <img src="{{ asset('images/img_gopro.png')}}" alt="Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="winner-list-item">
                            <div class="media align-items-center">
                                <div class="winner-list-item-pic mr-3">
                                    <div class="winner-list-item-badge">
                                        <img class="img-fluid" src="{{ asset('images/winner_03.png')}}" alt="Bronze">
                                    </div>
                                    <img class="rounded-circle" src="{{ asset('images/img_people_03.png')}}" alt="Images">
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 winner-list-item-name text-truncate">Albert Rivaldo</h5>
                                    <p class="winner-list-item-point"><span class="ico-coin"><img src="{{ asset('images/ico_coin.svg')}}" alt="Point"></span>&nbsp;180 Point</p>
                                    <p class="winner-list-item-date">June 17, 2020</p>
                                </div>
                                <div class="winner-list-item-prize">
                                    <img src="{{ asset('images/img_ps.png')}}" alt="Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
