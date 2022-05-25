@extends('layouts.frontend_layout.frontend_design')

@section('content')
  <div class="header-title">
        <div class="container d-flex align-items-center">
            <a href="{{ url('/wallpaper') }}" class="header-title-back">
                <img class="img-fluid" src="{{url('images/ico_prev_white.png')}}" alt="Prev">
            </a>
            Video
        </div>
    </div>

    <div class="content-wrapper">
        <div class="container">
            @if(count($Vdocategory)>0)
                @php $count =1; @endphp
                <ul class="category-button">
                    <li>
                        @foreach($Vdocategory as $cat)  
                            <a href="javascript:void(0)" class="getDetailsById btn btn-sm main-category-btn @if($count == 1) active @endif" data-id="{{$cat['id']}}" data-type="video" data-application="" data-block="video">
                                {{$cat['name']}}
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
                    @foreach($video as $videos)
                    
                            <div class="col-4">
                                <div class="game-item">
                                    <a href="{{ url('video/details/'.$videos['uuid']) }}">
                                       @if (file_exists( public_path().'/video/'.$videos['uuid'].'/file/'.$videos['file']))
                                            {{-- <img class="img-fluid game-item-pic" src="{{url('uploads/wallpaper/'.$wallpapers['uuid'].'/image/'.$wallpapers['image'])}}" alt="Images"> --}}
                                            <video width="320" height="240" src="{{url('video/'.$videos['uuid'].'/file/'.$videos['file'])}}" >
                                                Video
                                            </video>
                                       @else
                                            <img class="img-fluid game-item-pic" src="{{url('images/content_video_02.jpg')}}" alt="Video">
                                        @endif 

                                        <p class="game-item-title text-truncate">{{ucfirst($videos['name'])}}</p>
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
