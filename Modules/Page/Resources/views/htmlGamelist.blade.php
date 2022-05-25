@extends('layouts.frontend_layout.frontend_design')
@section('content')
       <div class="content-wrapper">
        @if(!empty($NewCategoryArray))
            <div class="container">
                @php $count =1; @endphp
                    <ul class="category-button">
                        <li>
                            @foreach($NewCategoryArray as $category)  
                                <a href="javascript:void(0)" class="catDetails btn btn-sm main-category-btn @if($count == 1) active @endif" data-id="{{$category['id']}}">
                                    @if($count == 1)
                                        <img src="images/ico_champ.png" width="18" alt="Champ">
                                    @endif
                                    {{$category['name']}}
                                </a>
                            @php $count++; @endphp    
                            @endforeach    
                        </li>
                    </ul>
                <div class="row section-heading">
                    <div class="col-7 text-left">
                        <p class="page-heading">Top Chart</p>
                    </div>
                </div>

                <span class="cateBlock"> 
                @if(count($games)>0)
                    @php $i=1 @endphp
                    @foreach($games as $game)
                       
                            @if($i  ==  1)
                            <div class="row no-gutters game-list-wrapper">
                             @endif

                            <div class="col-4">
                                <div class="game-item">
                                    <a href="{{ url('game/details/'.$game['uuid']) }}">
                                       @if (file_exists( public_path().'/uploads/games/'.$game['id'].'/'.$game['image']))
                                             <img class="img-fluid game-item-pic" src="{{url('uploads/games/'.$game['id'].'/'.$game['image'])}}" alt="Images">
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
            </div>
        @endif    
    </div>
@endsection
