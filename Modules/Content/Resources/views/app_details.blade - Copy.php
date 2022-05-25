@extends('layouts.frontend_layout.frontend_design')

@section('content')
   <div class="header-title">
        <div class="container d-flex align-items-center">
            <a href="#" class="header-title-back">
                <img class="img-fluid" src="{{url('images/ico_prev_white.png')}}" alt="Prev">
            </a>
            {{$details->name}}
        </div>
    </div>
    <div class="content-space-orange"></div>

    <div class="content-wrapper">
        <div class="container">
            <div class="content-space-orange"></div>
            <div class="game-detail-box">
                <div class="game-detail-box-header">
                    <div class="row no-gutters">
                        <div class="col-8">
                            <div class="media">
                                @if (file_exists( public_path().'/uploads/application/'.$details->uuid.'/image/'.$details->image))
                                     <img class="img-fluid mr-3" src="{{url('uploads/application/'.$details->uuid.'/image/'.$details->image)}}" alt="Images">
                                @else
                                    <img class="img-fluid mr-3" src="{{url('images/no_game.jpg')}}" alt="Images">
                                @endif 

                                <div class="media-body">
                                    <h5 class="mt-0 game-detail-box-title text-truncate">{{$details->name}}</h5>
                                    <span class="btn btn-sm main-grey-outline-btn">Arcade</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 text-right">
                            <h5 class="mt-0 game-detail-box-title">Rp 5000</h5>
                            <span class="game-detail-star star-full"></span>
                        </div>
                    </div>
                </div>
                <div class="game-detail-box-content">
                    <div class="game-pic-slide">
                        <div class="game-pic-item">
                            <img class="img-fluid" src="{{url('images/image_temple_01.png')}}" alt="Image Temple">
                        </div>
                        <div class="game-pic-item">
                            <img class="img-fluid" src="{{url('images/image_temple_02.png')}}" alt="Image Temple">
                        </div>
                        <div class="game-pic-item">
                            <img class="img-fluid" src="{{url('images/image_temple_01.png')}}" alt="Image Temple">
                        </div>
                        <div class="game-pic-item">
                            <img class="img-fluid" src="{{url('images/image_temple_02.png')}}" alt="Image Temple">
                        </div>
                    </div>
                    <p>{{strip_tags($details->description)}}</p>
                </div>
            </div>

            <div class="game-rating-box">
                <p class="game-rating-box-title">Give Your Rating</p>
                <div class="game-rating-box-input">
                    <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
                    <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
                    <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
                    <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
                    <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
                </div>
            </div>

            @if(count($otherApplication) >0)

                <div class="row section-heading">
                    <div class="col-7 text-left">
                        <p class="page-heading">Other App</p>
                    </div>
                    <div class="col-5 text-right">
                        <a href="{{ url('/app/game/more')}}" class="heading-link">See More</a>
                    </div>
                </div>

                <div class="row no-gutters game-list-wrapper">

                    @foreach($otherApplication as $applications )             
                        <div class="col-4">
                            <div class="game-item">
                                <a href="{{ url('/app/game/details/'.$applications['uuid']) }}">
                                    @if (file_exists( public_path().'/uploads/application/'.$applications['uuid'].'/image/'.$applications['image']))
                                         <img class="img-fluid game-item-pic" src="{{url('uploads/application/'.$applications['uuid'].'/image/'.$applications['image'])}}" alt="Images">
                                    @else
                                        <img class="img-fluid game-item-pic" src="{{url('images/no_game.jpg')}}" alt="Images">
                                    @endif
                                    <p class="game-item-title text-truncate">{{$applications['name']}}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach

                   
                </div>

            @endif    


        </div>
    </div>

    <div class="bottom-nav">
        <div class="container">
            <a href="#" id="btnPlay" class="btn main-download-btn btn-block">Download</a>
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
                                <img class="mr-3 img-fluid" src="images/ico_smartphone.png" alt="Icon">
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
                                <img class="mr-3 img-fluid" src="images/ico_smartphone.png" alt="Icon">
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
                                <img class="mr-3 img-fluid" src="images/ico_smartphone.png" alt="Icon">
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
                                <img class="mr-3 img-fluid" src="images/ico_basket.png" alt="Icon">
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
                        <img class="img-fluid mb-2" width="70" src="images/ico_alert_success.png" alt="Ico">
                        <h5>Thank You!</h5>
                        <p>Your Purchase is Success</p>
                        <a data-dismiss="modal" aria-label="Close" class="btn button-purchase-green text-white">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
