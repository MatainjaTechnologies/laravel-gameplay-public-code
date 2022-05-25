<div class="bottom-nav">
    <div class="row no-gutters box-wrapper mr-auto ml-auto container-fluid">
        <div class="col {{$home_active}}">
            <div class="nav-box">
                <a href="{{url('/')}}">
                    <div class="nav-box-ico home"></div>
                    <div class="nav-title">{{ __('lang.home')}}</div>
                </a>
            </div>
        </div>
        <div class="col {{$comp_active}}">
            <div class="nav-box">
                <a href="{{url('/competition')}}">
                    <div class="nav-box-ico winner"></div>
                    <div class="nav-title">{{ __('lang.competition')}}</div>
                </a>
            </div>
        </div>
        <div class="col {{$category_active}}">
            <div class="nav-box">
                <a href="{{url('/category')}}">
                    <div class="nav-box-ico reward"></div>
                    <div class="nav-title">{{ __('lang.category')}}</div>
                </a>
            </div>
        </div>
        <div class="col {{$pro_active}}">
            <div class="nav-box">
                @if (request()->session()->get('user_data'))
                <a href="{{url('/profile')}}">                    
                @else
                <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModalCenter">                    
                @endif
                    <div class="nav-box-ico me"></div>
                    <div class="nav-title">{{ __('lang.me')}}</div>
                </a>
            </div>
        </div>
    </div>
</div>