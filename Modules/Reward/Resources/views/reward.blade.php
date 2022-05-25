@extends('user.user_template')

@section('content')
    <div class="page-wrapper">
        <div class="simple-card mb-4" style="margin-top: 33px;">
            <div class="profile-box intersect shadow" style="margin-bottom: -33px;">
                @if ($UserData)
                    <div class="d-flex align-items-center">
                        <p class="fw-bold mb-0">My Coin</p>
                        <div class="point-box ms-auto flex-grow-0">
                            <img src="{{asset('theme/images/coin.png')}}" class="img-fluid" alt="Coin">
                            <span class="align-middle">{{$UserData->coin}}</span>
                        </div>
                    </div>                
                @else
                    <div class="d-flex align-items-center">
                        <p class="fw-bold mb-0">Guest</p>
                        <div class="point-box ms-auto flex-grow-0">
                            <img src="{{asset('theme/images/coin.png')}}" class="img-fluid" alt="Coin">
                            <span class="align-middle">0</span>
                        </div>
                    </div>                    
                @endif
            </div>
            <div class="row mt-3 gx-2">
                <div class="col-6">
                    <a href="javascript:void(0)" class="btn button-red w-100 button-tab-reward rounded-pill active">Reward</a>
                </div>
                <div class="col-6">
                    <a href="{{url('/reward/history')}}" class="btn button-red w-100 button-tab-reward rounded-pill">My Reward</a>
                </div>
            </div>
        </div>
        <ul class="reward-category-list nav mb-4">
            @if (count($all_types) > 0)
                @foreach ($all_types as $key => $type)
                    <li class="nav-item">
                        @if ($key == 0)
                            @php
                                $active = 'active';
                            @endphp
                        @else
                            @php
                                $active = '';
                            @endphp
                        @endif
                        <a data-bs-toggle="tab" href="#tabRewardCat1" class="reward-category-box {{ $active }} changeTypeBtn" data-type_id="{{$type->id}}">
                            <span class="reward-category-icon"><i class="fas fa-mobile"></i></span>
                            <p class="reward-category-title mb-0">{{$type->name}}</p>
                        </a>
                    </li>
                @endforeach
            @else
                <li class="nav-item">
                    No Type to display
                </li>                
            @endif
        </ul>
        <div class="reddiv">
            <div class="simple-card bkg-primary mb-4">
                @if (count($all_types) > 0)
                    @php
                        $t = $all_types[0]->name;
                    @endphp
                @else
                    @php
                        $t = '';
                    @endphp               
                @endif
                <div class="simple-card-title">{{$t}}</div>
                <!-- remove if no title start -->
                <div class="separator my-3"></div>
                <!-- remove if no title end -->
                @if (count($all_reward) > 0)
                    @foreach ($all_reward as $rwd)
                        <div class="reward d-flex align-items-start">
                            <div class="reward-pic flex-shrink-0 me-3">
                                @if ($rwd->reward_image && file_exists( public_path().'/images/reward/'.$rwd->id.'/'.$rwd->reward_image))
                                <img src="{{asset('images/reward/'.$rwd->id.'/'.$rwd->reward_image)}}" alt="Voucher">
                                @else
                                <img src="{{asset('theme/images/voucher.png')}}" alt="Voucher">
                                @endif                  
                            </div>
                            <div class="reward-content">
                                <p class="mb-2 reward-title">{{$rwd->title}}</p>
                                <a href="{{ url('/reward/'.$rwd->id.'/details') }}" class="btn button-green rounded-pill btn-sm w-100" style="max-width: 150px;">
                                    <div class="row gx-0">
                                        <div class="col-6 text-start">
                                            <img src="{{asset('theme/images/coin.png')}}" class="align-middle" width="20" alt="Coin">
                                            {{$rwd->coin}}
                                        </div>
                                        <div class="col-6 text-end">
                                            Redeem
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>                          
                    @endforeach
                @else
                    <div class="reward d-flex align-items-start">
                        <p>No reward in this type</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
