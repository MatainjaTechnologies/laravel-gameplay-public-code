@extends('layouts.frontend_layout.frontend_design')

@section('content')
   <div class="header-title">
        <div class="container d-flex align-items-center">
            <a href="{{ url('/app/game/more') }}" class="header-title-back">
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
                            <h5 class="mt-0 game-detail-box-title">
                                @isset($details->price)
                                    @if ($details->price != '')
                                        Rp: {{$details->price}}
                                    @else
                                        Free
                                    @endif
                                @else
                                    Free
                                @endisset
                            </h5>
                            <span class="game-detail-star star-full"></span>
                        </div>
                    </div>
                </div>
                
                <div class="game-detail-box-content">
                    <div class="game-pic-slide">
                        @if (count($details->medias) > 0)
                            @foreach ($details->medias as $media)
                                @if (file_exists( public_path().'/uploads/media/application/'.$details->id.'/'.$media))
                                    <div class="game-pic-item">
                                        <img class="img-fluid" src="{{url('uploads/media/application/'.$details->id.'/'.$media)}}" alt="Image Temple">
                                    </div>
                                @else
                                    <div class="game-pic-item">
                                        <img class="img-fluid" src="{{url('images/image_temple_02.png')}}" alt="Image Temple">
                                    </div>                                
                                @endif                   
                            @endforeach                            
                        @else
                            <div class="game-pic-item">
                                <img class="img-fluid" src="{{url('images/image_temple_02.png')}}" alt="Image Temple">
                            </div> 
                        @endif
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
                        <p class="page-heading">Other Game</p>
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
            {{-- id="btnPlay" --}}
            <!-- <a href="{{url('app/download/'.$details->uuid)}}"  class="btn main-download-btn btn-block">Downloadll</a> -->
        </div>
    </div>
    
@endsection
