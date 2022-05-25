@extends('user.without_header')

@section('content')
    <div class="header-title">
        <div class="container-fluid box-wrapper">
            <a href="{{url()->previous()}}" class="d-inline-block header-title-back">
                <img src="{{asset('theme/images/icon-back.svg')}}" alt="" width="15">
                {{-- <object width="15" data="{{asset('theme/images/icon-back.svg')}}" type="image/svg+xml">
                </object> --}}
            </a>
            {{$reward_dtl->title}}
        </div>
    </div>
    <div class="container-fluid box-wrapper">
        <div class="page-wrapper">
            <div class="simple-card bkg-primary mb-4">
                <div class="reward d-flex align-items-center">
                    <div class="reward-pic flex-shrink-0 me-3">
                        @if ($reward_dtl->reward_image && file_exists( public_path().'/images/reward/'.$reward_dtl->id.'/'.$reward_dtl->reward_image))
                        <img src="{{asset('images/reward/'.$reward_dtl->id.'/'.$reward_dtl->reward_image)}}" alt="Voucher">
                        @else
                        <img src="{{asset('theme/images/voucher.png')}}" alt="Voucher">
                        @endif   
                    </div>
                    <div class="reward-content">
                        <p class="mb-2 reward-title">{{$reward_dtl->title}}</p>
                    </div>
                </div>
            </div>
            <div class="card mb-4 small border-radius shadow-sm">
                <div class="card-body">
                    <h5 class="mb-3">Term and Condition</h5>
                    <p>{{$reward_dtl->description}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-nav">
        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalRedeem" class="py-3 text-uppercase btn btn-sm button-green w-100 rounded-0">Redeem</a>
    </div>
    <div class="modal fade modal-standard" tabindex="-1" role="dialog" id="modalRedeem">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Redeem?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to redeem AirTime Voucher 100.000?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary shadow-sm text-uppercase" data-bs-dismiss="modal" aria-label="Close">No</button>
                    <a href="reward-history.html" class="btn button-green shadow-sm text-uppercase">Yes</a>
                </div>
            </div>
        </div>
    </div>
@endsection
