@extends('frontend.frontend_template')
@section('content')
    <div class="header-title">
        <div class="container-fluid box-wrapper d-flex align-items-center">
            <a href="{{url('/category')}}" class="header-title-back text-white">
                <i class="fa fa-chevron-left"></i>
            </a>
            {{$name}}
        </div>
    </div>
    <div class="content-wrapper">
        <div class="container-fluid box-wrapper">
            <div class="row game_row">
                @if ($games->count())
                    @foreach ($games as $game)
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
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="" style="display:flex; justify-content: center">
                            <h3>{{ __('lang.no_game_to_show')}}</h3>
                        </div>
                    </div>
                @endif
            </div>
            {{-- @if ($total > count($games))
            @endif --}}
            {{-- {!! $games->links('frontend.paginator') !!} --}}
            @if ($games->hasMorePages())
                <div class="load_more_div">
                    <a href="javascript:void(0);" class="btn btn-outline-primary see_more_category_game" data-btn_info="{{$id}}">{{ __('lang.load_more')}}</a>
                    <input type="hidden" name="limit" id="limit" value="1">
                </div>
            @endif
        </div>
    </div>
@endsection