@extends('user.user_template')

@section('content')
    <div class="page-wrapper">
        <div class="simple-card mb-4" style="margin-top: 33px;">
            <div class="profile-box intersect shadow" style="margin-bottom: -33px;">
                <div class="d-flex align-items-center">
                    <p class="fw-bold mb-0">My Coin</p>
                    <div class="point-box ms-auto flex-grow-0">
                        <img src="{{asset('theme/images/coin.png')}}" class="img-fluid" alt="Coin">
                        <span class="align-middle">{{$UserData->coin}}</span>
                    </div>
                </div>
            </div>
            <div class="row mt-3 gx-2">
                <div class="col-6">
                    <a href="{{url('/reward')}}" class="btn button-red w-100 button-tab-reward rounded-pill">Reward</a>
                </div>
                <div class="col-6">
                    <a href="javascript:void(0)" class="btn button-red w-100 button-tab-reward rounded-pill active">My Reward</a>
                </div>
            </div>
        </div>
        <div class="simple-card bkg-primary mb-4">
            <div class="simple-card-title">My Reward</div>
            <!-- remove if no title start -->
            <div class="separator my-3"></div>
            <!-- remove if no title end -->
            <div class="reward d-flex align-items-start">
                <div class="reward-pic flex-shrink-0 me-3">
                    <img src="{{asset('theme/images/voucher.png')}}" alt="Voucher">
                </div>
                <div class="reward-content">
                    <small class="d-block reward-claimed-date">19/02/2021</small>
                    <p class="mb-2 reward-title">Airtime Voucher 50.000</p>
                    <a href="reward-detail.html" class="btn button-green rounded-pill btn-sm w-100 disabled" aria-disabled="true" disabled style="max-width: 150px;">
                        Redeemed
                    </a>
                </div>
            </div>
            <div class="reward d-flex align-items-start">
                <div class="reward-pic flex-shrink-0 me-3">
                    <img src="{{asset('theme/images/voucher.png')}}" alt="Voucher">
                </div>
                <div class="reward-content">
                    <small class="d-block reward-claimed-date">19/02/2021</small>
                    <p class="mb-2 reward-title">Airtime Voucher 50.000</p>
                    <a href="reward-detail.html" class="btn button-green rounded-pill btn-sm w-100 disabled" aria-disabled="true" disabled style="max-width: 150px;">
                        Redeemed
                    </a>
                </div>
            </div>
            <div class="reward d-flex align-items-start">
                <div class="reward-pic flex-shrink-0 me-3">
                    <img src="{{asset('theme/images/voucher.png')}}" alt="Voucher">
                </div>
                <div class="reward-content">
                    <small class="d-block reward-claimed-date">19/02/2021</small>
                    <p class="mb-2 reward-title">Airtime Voucher 50.000</p>
                    <a href="reward-detail.html" class="btn button-green rounded-pill btn-sm w-100 disabled" aria-disabled="true" disabled style="max-width: 150px;">
                        Redeemed
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection