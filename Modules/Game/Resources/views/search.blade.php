@extends('frontend.frontend_template')
@section('content')
    <div class="header-title">
        <div class="container-fluid box-wrapper d-flex align-items-center">
            <a href="{{url('/')}}" class="header-title-back text-white">
                <i class="fa fa-chevron-left"></i>&nbsp;{{__('lang.back_to_home')}}
            </a>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="title">
            @if (count($games) > 0)
            <h5>{{__('lang.search_result')}}</h5>                
            @endif
        </div>

        <div class="content-wrapper">
            <div class="container-fluid box-wrapper">
                <div class="row game_row">
                    @forelse ($games as $game)
                        <div class="col-6">
                            <div class="game-list">
                                <a href="{{url('/game/'.$game->uuid)}}">
                                    <img src="{{asset('/uploads/games/'.$game->id.'/cover_image/'.$game->cover_image)}}" alt="Game">
                                </a>
                                <div class="row no-gutters mt-2">
                                    <div class="col-8">
                                        <h6 class="mb-0 text-truncate">{{$game->name}}</h6>
                                        <small class="text-secondary">{{$game->category['name']}}</small>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="{{url('/game/'.$game->uuid)}}" class="btn btn-sm button-green-sh sh-sm rounded-pill px-2 text-uppercase">{{ __('lang.play')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>                            
                    @empty
                        <div class="col-12">
                            {{-- <div class="no-data" >
                                <h3>{{ __('lang.no_game_to_show')}}</h3>
                            </div> --}}
                            <div class="nodata">
                                <div class="nodata-box">
                                    <div class="nodata-icon" style="background-image: url({{asset('frontend_theme/images/icon-no-game.png')}});"></div>
                                    <h3 class="nodata-title">
                                        {{ __('lang.game')}} <br>
                                        {{ __('lang.not_found')}}
                                    </h3>
                                </div>
                            </div>
                        </div>                            
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection