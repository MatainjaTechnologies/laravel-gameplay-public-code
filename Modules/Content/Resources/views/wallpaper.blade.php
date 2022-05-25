@extends('layouts.frontend_layout.frontend_design')

@section('content')
   <div class="custom-tabs">
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('app') }}">Game & App</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('wallpaper') }}">Wallpaper & Video</a>
            </li>
        </ul>
    </div>

    <div class="content-wrapper">
        <div class="container">
            <div class="row section-heading">
                <div class="col-7 text-left">
                    <p class="page-heading">Wallpaper</p>
                </div>
                <div class="col-5 text-right">
                    <a href="{{ url('/wallpaper/more')}}" class="heading-link">See More</a>
                </div>
            </div>
            @if(count($Wallcategory)>0)
                @php $count =1; @endphp
                <ul class="category-button">
                    <li>
                        @foreach($Wallcategory as $cat)  
                            <a href="javascript:void(0)" class="getDetailsById btn btn-sm main-category-btn @if($count == 1) active @endif" data-id="{{$cat['id']}}" data-type="wallpaper" data-application="" data-block="wallpaper">
                                {{$cat['name']}}
                            </a>
                        @php $count++; @endphp    
                        @endforeach    
                    </li>
                </ul>
            @endif
            <span class="wallpapercateBlock"> 
                @if(count($wallpaper)>0)
                    <div class="row no-gutters game-list-wrapper">
                    @php $i=1 @endphp
                    @foreach($wallpaper as $wallpapers)
                    
                            <div class="col-4">
                                <div class="game-item">
                                    <a href="{{ url('wallpaper/details/'.$wallpapers['uuid']) }}">
                                       @if (file_exists( public_path().'/uploads/wallpaper/'.$wallpapers['uuid'].'/image/'.$wallpapers['image']))
                                             <img class="img-fluid game-item-pic" src="{{url('uploads/wallpaper/'.$wallpapers['uuid'].'/image/'.$wallpapers['image'])}}" alt="Images">
                                       @else
                                            <img class="img-fluid game-item-pic" src="{{url('images/no_game.jpg')}}" alt="Images">
                                        @endif 

                                        <p class="game-item-title text-truncate">{{ucfirst($wallpapers['name'])}}</p>
                                    </a>
                                </div>
                            </div>                            
                            @php $i++ @endphp
                    @endforeach
                    </div>
                @endif
            </span>
        </div>
        <div class="section-divider"></div>
        <div class="container">
            <div class="row section-heading">
                <div class="col-7 text-left">
                    <p class="page-heading">Video</p>
                </div>
                <div class="col-5 text-right">
                    <a href="{{ url('/video/more')}}" class="heading-link">See More</a>
                </div>
            </div>
            @if(count($videocategory)>0)
                @php $count =1; @endphp
                <ul class="category-button">
                    <li>
                        @foreach($videocategory as $vdo)  
                            <a href="javascript:void(0)" class="getDetailsById btn btn-sm main-category-btn @if($count == 1) active @endif" data-id="{{$vdo['id']}}" data-type="video" data-application="" data-block="video">
                                {{$vdo['name']}}
                            </a>
                        @php $count++; @endphp    
                        @endforeach    
                    </li>
                </ul>
            @endif
            <span class="videocateBlock"> 
                @if(count($video)>0)
                    <div class="row no-gutters game-list-wrapper">
                    @php $i=1 @endphp
                    @foreach($video as $vdos)
                            <div class="col-4">
                                <div class="game-item">
                                    <a href="{{ url('video/details/'.$vdos['uuid']) }}">
                                       @if (file_exists( public_path().'/video/'.$vdos['uuid'].'/file/'.$vdos['file']))
                                            {{-- <img class="img-fluid game-item-pic" src="{{url('uploads/video/'.$vdos['uuid'].'/image/'.$vdos['image'])}}" alt="Images"> --}}
                                            <video width="320" height="240" src="{{url('video/'.$vdos['uuid'].'/file/'.$vdos['file'])}}" >
                                                Video
                                            </video>
                                       @else
                                            <img class="img-fluid game-item-pic" src="{{url('images/content_video_02.jpg')}}" alt="Images">
                                        @endif 

                                        <p class="game-item-title text-truncate">{{ucfirst($vdos['name'])}}</p>
                                    </a>
                                </div>
                            </div>                            
                            @php $i++ @endphp
                    @endforeach
                    </div>
                @endif
            </span>
        </div>
    </div>
@endsection
