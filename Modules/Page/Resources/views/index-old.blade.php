@extends('layouts.frontend_layout.frontend_design')
@section('content')
    <div class="search-bar-space-top"></div>
    <div class="container position-relative">
        <div class="search-bar">
            <form action="{{url('/search')}}" id="search-form" method="GET">
                <input type="text" class="form-control main-search" name="q" id="search-box" name="serach_keyword"  placeholder="Search App and Game">
            </form>
        </div>
    </div>
    <div class="search-bar-space-bottom"></div>
    <div class="content-wrapper">
        <div class="container">
            {{-- <div class="d-none search-result " >
                <span class="appgamecateBlock">
                </span>
            </div> --}}
            <div class="slide-competititon">

                @if(count($banners)>0)
                    @foreach($banners as $banner)
                        <div class="slide-competititon-box">
                            <a href="{{url('game/details/'.$banner['uuid'])}}">
                                <div class="combox-cover">
                                    @if (file_exists( public_path().'/uploads/banner/'.$banner['image']))
                                        <img class="img-fluid" src="{{url('uploads/banner/'.$banner['image'])}}" alt="Banner" style="height: 150px">
                                    @else
                                        <img class="img-fluid" src="{{url('images/no_game.jpg')}}" alt="Banner">
                                    @endif
                                </div>
                                <div class="media">
                                    @if (file_exists( public_path().'/uploads/games/'.$banner['game_id'].'/'.$banner['gameimage']))
                                        <img class="mr-3 img-fluid" src="{{url('/uploads/games/'.$banner['game_id'].'/'.$banner['gameimage'])}}" alt="Banner" style="height: 90px">
                                    @else
                                        <img class="mr-3 img-fluid" src="{{url('images/no_game.jpg')}}" alt="Banner">
                                    @endif

                                    <div class="media-body">
                                        <h5 class="mt-0 combox-game-title">{{$banner['name']}}</h5>
                                        <div class="combox-category">
                                            <span>{{$banner['cat_name']}}</span>
                                        </div>
                                    
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

            </div>

            @if(!empty($wallcategory))
                <section id="gameCategory">
                    <div class="row section-heading">
                        <div class="col-7 text-left">
                            <p class="page-heading">Game</p>
                        </div>
                        <div class="col-5 text-right">
                            <a href="{{url('/app/game/more')}}" class="heading-link">See More</a>
                        </div>
                    </div>
                        @php $count =1; @endphp
                        <ul class="category-button">
                            <li>
                                @foreach($wallcategory as $category)  
                                    <a href="javascript:void(0)" class="getDetailsById btn btn-sm main-category-btn @if($count == 1) active @endif" data-id="{{$category['id']}}" data-type="application" data-application="game" data-block="appgame">
                                       
                                        {{$category['name']}}
                                    </a>
                                @php $count++; @endphp    
                                @endforeach    
                            </li>
                        </ul>
                  
                        <span class="appgamecateBlock"> 
                            @if(count($application)>0)
                                @php $i=1 @endphp
                                @foreach($application as $game)
                                   
                                    @if($i  ==  1)
                                    <div class="row no-gutters game-list-wrapper">
                                    @endif

                                    <div class="col-4">
                                        <div class="game-item">
                                            <a href="{{url('app/game/details/'.$game['uuid'])}}">
                                                @if (file_exists( public_path().'/uploads/application/'.$game['uuid'].'/image/'.$game['image']))
                                                    <img class="img-fluid game-item-pic" src="{{url('uploads/application/'.$game['uuid'].'/image/'.$game['image'])}}" alt="Images">
                                                @else
                                                    <img class="img-fluid game-item-pic" src="{{url('images/no_game.jpg')}}" alt="Images">
                                                @endif 

                                                <p class="game-item-title text-truncate">{{ucfirst($game['name'])}}</p>
                                                <div class="game-item-star star-third"></div>
                                            </a>
                                        </div>
                                    </div>
                                    @if($i%3  ==  0)
                                    </div>
                                    <div class="row no-gutters game-list-wrapper">
                                    @endif
                                    @php $i++ @endphp

                                @endforeach
                            @endif
                        </span>
                </section>
            @endif

        </div>
        <div class="section-divider"></div>
        <div class="container">
            <section id="bannerAds">
                <div class="banner-ads">
                    <a href="{{url('/html-game')}}">
                        <img class="img-fluid" src="{{url('images/banner_html5.png')}}" alt="HTML5 Banner">
                    </a>
                </div>
            </section>

            @if(count($getAppDataAnyTwo)>0)
                <section id="appCategory">
                    <div class="row section-heading">
                        <div class="col-7 text-left">
                            <p class="page-heading">App</p>
                        </div>
                        <div class="col-5 text-right">
                            <a href="{{url('/app/more')}}" class="heading-link">See More</a>
                        </div>
                    </div>
                    <div class="app-box-wrapper">

                        @foreach($getAppDataAnyTwo as $apps)
                            <div class="app-item">
                                <div class="media align-items-center">
                                    <a href="{{url('app/details/'.$apps['uuid'])}}">
                                        @if (file_exists( public_path().'/uploads/application/'.$apps['uuid'].'/image/'.$apps['image']))
                                             <img class="mr-3" src="{{url('uploads/application/'.$apps['uuid'].'/image/'.$apps['image'])}}" alt="Images">
                                        @else
                                            <img class="mr-3" src="{{url('images/no_game.jpg')}}" alt="Images">
                                        @endif 
                                    </a>

                                    
                                    <div class="media-body">
                                        <h5 class="mt-0 app-item-title">{{$apps['name']}}</h5>
                                        <div class="app-item-star star-full"></div>
                                        <p class="app-item-pricing">Free</p>
                                    </div>
                                    <a href="{{url('app/download/'.$apps['uuid'])}}" class="btn main-success-btn">Download</a>
                                </div>
                            </div>
                        @endforeach    
                        
                    </div>
                </section>
            @endif 

            @if(count($getContent)>0)   
            <section id="content">
                <div class="row section-heading">
                    <div class="col-7 text-left">
                        <p class="page-heading">Content</p>
                    </div>
                    <div class="col-5 text-right">
                        <a href="{{url('/wallpaper')}}" class="heading-link">See More</a>
                    </div>
                </div>
                <div class="content-slider">
                    @foreach($getContent as $content)
                        <div class="content-item">

                            @if ($content['post_type'] == 'wallpaper')
                                <a href="{{ url('wallpaper/details/'.$content['uuid']) }}">
                                    <div class="content-thumbnail">
                                        @if (file_exists( public_path().'/uploads/wallpaper/'.$content['uuid'].'/image/'.$content['image']))
                                            <img class="img-fluid" src="{{url('uploads/wallpaper/'.$content['uuid'].'/image/'.$content['image'])}}" alt="Images">
                                        @else
                                            <img class="img-fluid" src="{{url('images/no_game.jpg')}}" alt="Images">
                                        @endif

                                    </div>
                                </a>
                                <h5 class="content-item-title text-nowrap text-truncate">
                                    <a href="{{ url('wallpaper/details/'.$content['uuid']) }}">{{$content['name']}}</a>
                                </h5>
                                <div class="content-item-category text-nowrap text-truncate">Wallpaper</div>
                                
                            @endif

                            @if ($content['post_type'] == 'video')
                                <a href="{{ url('video/details/'.$content['uuid']) }}">
                                    <div class="content-thumbnail">
                                        @if (file_exists( public_path().'/video/'.$content['uuid'].'/file/'.$content['file']))
                                            {{-- <img class="img-fluid" src="{{url('uploads/wallpaper/'.$content['uuid'].'/image/'.$content['image'])}}" alt="Images"> --}}
                                            <video class="indx-vdo"  src="{{url('video/'.$content['uuid'].'/file/'.$content['file'])}}" >
                                                Video
                                            </video>
                                        @else
                                            <img class="img-fluid game-item-pic" src="{{url('images/content_video_02.jpg')}}" alt="Images">
                                        @endif

                                    </div>
                                </a>
                                <h5 class="content-item-title text-nowrap text-truncate">
                                    <a href="{{ url('video/details/'.$content['uuid']) }}">{{$content['name']}}</a>
                                </h5>
                                <div class="content-item-category text-nowrap text-truncate">Video</div>
                                
                            @endif
                        </div>
                    @endforeach
                    
                </div>
            </section>
            @endif
        </div>
    </div>
@endsection
