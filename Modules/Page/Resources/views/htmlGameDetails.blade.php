@extends('layouts.frontend_layout.frontend_design')
@section('content')
        <div class="loading align-items-center justify-content-center">
            <img src="images/loading.gif" alt="Loading">
        </div>
        <div class="header-title">
            <div class="container d-flex align-items-center">
                <a href="{{ url()->previous() }}" class="header-title-back">
                    <img class="img-fluid" src="{{url('images/ico_prev_white.png')}}" alt="Prev">
                </a>
                {{$details->name}}
            </div>
        </div>
        <div class="content-wrapper">
        <div class="container">

            <div class="slide-competititon-box" style="margin-bottom: 20px;">
                <div class="media" style="margin-top: 0;">
                    @if (file_exists( public_path().'/uploads/games/'.$details->id.'/'.$details->image))
                            <img class="mr-3 img-fluid" src="{{url('uploads/games/'.$details->id.'/'.$details->image)}}" alt="Images">
                    @else
                        <img class="mr-3 img-fluid" src="{{url('images/no_game.jpg')}}" alt="Images">
                    @endif
                    <div class="media-body">
                        <h5 class="mt-0 combox-game-title">{{$details->name}}</h5>
                        <div class="combox-category">
                            <span>Adventure</span>
                            <span>Daily</span>
                        </div>
                    </div>
                </div>
                <div class="combox-description">
                    <p>{{strip_tags($details->description)}}</p>
                </div>
            </div>

            <div class="row section-heading">
                <div class="col-7 text-left">
                    <p class="page-heading">Other Game</p>
                </div>
                <div class="col-5 text-right">
                    <a href="{{url('/html-game')}}" class="heading-link">See More</a>
                </div>
            </div>

            <div class="row no-gutters game-list-wrapper">
                @if(count($otherGame)>0)
                @foreach($otherGame as $games)
                    <div class="col-4">
                        <div class="game-item">
                            <a href="{{ url('game/details/'.$games['uuid']) }}">
                                @if (file_exists( public_path().'/uploads/games/'.$games['id'].'/'.$games['image']))
                                <img class="mr-3 img-fluid" src="{{url('uploads/games/'.$games['id'].'/'.$games['image'])}}" alt="Images">
                                @else
                                    <img class="mr-3 img-fluid" src="{{url('images/no_game.jpg')}}" alt="Images">
                                @endif
                                <!-- <img class="img-fluid game-item-pic" src="images/game_html_7.png" alt="Images"> -->
                                <p class="game-item-title text-truncate">{{$games['name']}}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
                @endif
               
            </div>
        </div>
    </div>
    <div class="bottom-nav">
        <div class="container">
           <a href="{{url('games/'.$details->uuid.'/index.html')}}" class="btn main-download-btn btn-block">Play</a>
            <!-- <a href="#" id="btnPlay" class="btn main-download-btn btn-block">Play</a> -->
        </div>
    </div>

    <div id="modalPurchaseOption" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="position-relative mb-4">
                        <p>Purchase with:</p>
                        <div class="button-close" data-dismiss="modal" aria-label="Close"></div>
                    </div>
                    <a href="#" id="btnExampleModalAlert" style="margin-bottom: 10px; display: block;">
                        <div class="button-purchase-green">
                            <div class="media">
                                <img class="mr-3 img-fluid" src="{{url('images/ico_smartphone.png')}}" alt="Icon">
                                <div class="media-body">
                                    <p class="mt-0">Daily Subscribe</p>
                                    <p class="item-price">/&nbsp;Rp.2.200</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" style="margin-bottom: 10px; display: block;">
                        <div class="button-purchase-green">
                            <div class="media">
                                <img class="mr-3 img-fluid" src="{{url('images/ico_smartphone.png')}}" alt="Icon">
                                <div class="media-body">
                                    <p class="mt-0">Weekly Subscribe</p>
                                    <p class="item-price">/&nbsp;Rp.8.000</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" style="margin-bottom: 10px; display: block;">
                        <div class="button-purchase-green">
                            <div class="media">
                                <img class="mr-3 img-fluid" src="{{url('images/ico_smartphone.png')}}" alt="Icon">
                                <div class="media-body">
                                    <p class="mt-0">Monthly Subscribe</p>
                                    <p class="item-price">/&nbsp;Rp.32.000</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <hr class="or">
                    <a href="#" style="margin-bottom: 10px; display: block;">
                        <div class="button-purchase-red">
                            <div class="media">
                                <img class="mr-3 img-fluid" src="{{url('images/ico_basket.png')}}" alt="Icon">
                                <div class="media-body">
                                    <p class="mt-0">One Time Purchase</p>
                                    <p class="item-price">/&nbsp;Rp.2.200</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="ExampleModalAlert" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <img class="img-fluid mb-2" width="70" src="{{url('images/ico_alert_success.png')}}" alt="Ico">
                        <h5>Thank You!</h5>
                        <p>Your Purchase is Success</p>
                        <a data-dismiss="modal" aria-label="Close" class="btn button-purchase-green text-white">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
