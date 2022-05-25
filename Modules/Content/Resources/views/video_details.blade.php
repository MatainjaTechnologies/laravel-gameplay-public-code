@extends('layouts.frontend_layout.frontend_design')

@section('content')
   <div class="header-title">
        <div class="container d-flex align-items-center">
            <a href="{{ url('/video/more') }}" class="header-title-back">
                <img class="img-fluid" src="{{url('/images/ico_prev_white.png')}}" alt="Prev">
            </a>
            {{$video_details->name}}
        </div>
    </div>
    <div class="content-space-orange"></div>

    <div class="content-wrapper">
        <div class="container">

            <div class="content-media-box" style="margin-bottom: 20px;">
                <div class="content-media-box-info">
                    <a data-fancybox="gallery" href="images/pic_butterfly.png">
                        @if (file_exists( public_path().'/video/'.$video_details->uuid.'/file/'.$video_details->file))
                            <video autoplay="autoplay" src="{{url('video/'.$video_details->uuid.'/file/'.$video_details->file)}}" >
                                Video
                            </video>
                       @else
                            <img class="img-fluid" src="{{url('images/no_game.jpg')}}" alt="Images">
                        @endif 
                    </a>
                    <div class="row">
                        <div class="col-8">
                            <p class="text-left text-truncate">{{$video_details->name}}</p>
                        </div>
                        <div class="col-4">
                            <p class="text-right">Rp.5.000</p>
                        </div>
                    </div>
                </div>
                <div class="content-media-box-cat">
                    <div class="row">
                        <div class="col-6">
                            <label>Category:</label>
                            <a href="#" class="btn btn-block main-black-outline-btn">Nature</a>
                        </div>
                        <div class="col-6">
                            <label>Size:</label>
                            <div class="btn btn-block main-black-outline-btn">28.71 MB</div>
                        </div>
                    </div>
                </div>
            </div>
            
            @if(count($otherVideo) >0)

                <div class="row section-heading">
                    <div class="col-7 text-left">
                        <p class="page-heading">Other Wallpaper</p>
                    </div>
                    <div class="col-5 text-right">
                        <a href="{{ url('/wallpaper/more')}}" class="heading-link">See More</a>
                    </div>
                </div>

                <div class="row no-gutters game-list-wrapper">
                          
                    @foreach($otherVideo as $vdo )             
                    <div class="col-4">
                        <div class="game-item">
                            <a href="{{ url('video/details/'.$vdo['uuid']) }}">
                                @if (file_exists( public_path().'/video/'.$vdo['uuid'].'/file/'.$vdo['file']))
                                    <video autoplay="autoplay"  src="{{url('video/'.$vdo['uuid'].'/file/'.$vdo['file'])}}" >
                                        Video
                                    </video>
                                @else
                                <img class="img-fluid game-item-pic" src="{{url('images/content_video_02.jpg')}}" alt="Images">
                                @endif
                                <p class="game-item-title text-truncate">{{$vdo['name']}}556646</p>
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
            {{-- id="btnPlay" --}}
            <a href="{{url('/video/download/'.$video_details->uuid)}}"  class="btn main-download-btn btn-block">Download</a>
        </div>
    </div>

    {{-- id="modalPurchaseOption" --}}
    <div  class="modal" tabindex="-1" role="dialog">
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
