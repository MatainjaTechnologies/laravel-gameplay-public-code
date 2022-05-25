@extends('frontend.frontend_template')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid box-wrapper">
            <div class="menu-list">
                <ul>
                    <li class="position-relative">
                        <a href="{{url('/category/topchart/game')}}">
                            <span class="ico-menu-list">
                                <img src="{{asset('/frontend_theme/images/icon_cat_champ.png')}}" width="20" alt="Icon">
                            </span>
                            {{ __('lang.top_chart')}}
                            <span class="fa fa-chevron-right position-absolute" style="right: 0; opacity: 0.25;"></span>
                        </a>
                    </li>
                    @if (count($categories) > 0)
                        @foreach ($categories as $cat)
                            <li class="position-relative">
                                <a href="{{url('/category/'.$cat->id.'/game')}}">
                                    <span class="ico-menu-list">
                                        @if ($cat->icon && file_exists( public_path().'/uploads/category/'.$cat->uuid.'/icon/'.$cat->icon ))
                                            @php
                                                $src = asset('/uploads/category/'.$cat->uuid.'/icon/'.$cat->icon);
                                            @endphp
                                        @else
                                            @php
                                                $src = 'https://via.placeholder.com/350';
                                            @endphp
                                        @endif
                                        <img src="{{$src}}" width="20" alt="Icon">
                                    </span>
                                    {{$cat->name}}
                                    <span class="fa fa-chevron-right position-absolute" style="right: 0; opacity: 0.25;"></span>
                                </a>
                            </li>
                        @endforeach                        
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
