@extends('frontend.frontend_template_profile')
@section('content')
    <div class="header-profile">
        <div class="container-fluid box-wrapper">
            <div class="row no-gutters">
                <div class="col-8">
                    <div class="media">
                        <a href="profile-edit.html" class="d-block position-relative">
                            <img class="img-fluid heading-profile-pic" src="{{asset('/frontend_theme/images/ico_profile_big.png')}}" alt="Images">
                            <span class="btn-edit-profile"><i class="fas fa-pencil-alt"></i></span>
                        </a>
                        <div class="media-body w-75 pl-3">
                            <h5 class="heading-profile-title text-truncate">{{$user_data['name']}}</h5>
                            <p class="m-0">{{$user_data['msisdn']}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="text-right">
                        <span class="d-inline-block small border border-light text-white rounded-pill py-1 px-2 ml-auto">{{($user_data['subscription']) ? 'Subscriber' : 'Not a Subscriber' }} </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-wrapper pt-0">
        <div class="container-fluid box-wrapper">
            <div style="transform: translateY(-50%); top: 50%;">
                <a href="#" class="btn button-green text-uppercase w-100 shadow-sm">{{($user_data['subscription']) ? 'Unsubscribe' : 'Subscribe' }}</a>
            </div>
            <div class="profile-info-box mb-3">
                <div class="row no-gutters">
                    <div class="col-6">
                        <div class="profile-info-box-item has-divider">
                            <div class="media">
                                <object width="30" data="{{asset('/frontend_theme/images/ico_coin.svg')}}" type="image/svg+xml">
                                    <img width="30" src="{{asset('/frontend_theme/images/ico_coin.png')}}" />
                                </object>
                            </div>
                            <div class="ml-2 media-body" style="line-height: 0.875rem;">
                                <small class="text-secondary">Point</small>
                                <p class="mb-0 font-weight-bold">343545</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="profile-info-box-item">
                            <div class="media">
                                <object width="35" data="{{asset('/frontend_theme/images/ico_trophy.svg')}}" type="image/svg+xml">
                                    <img width="35" src="{{asset('/frontend_theme/images/ico_trophy.png')}}" />
                                </object>
                            </div>
                            <div class="ml-2 media-body" style="line-height: 0.875rem;">
                                <small class="text-secondary">Win Competition</small>
                                <p class="mb-0 font-weight-bold">30</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="menu-list">
                <ul>
                    <li>
                        <a href="claim-reward.html">
                            <span class="ico-menu-list">
                                <object width="20" data="{{asset('/frontend_theme/images/icon-menu-11.svg')}}" type="image/svg+xml">
                                    <img src="{{asset('/frontend_theme/images/icon-menu-11.png')}}" alt="Coin">
                                </object>
                            </span>
                            Claim Reward
                        </a>
                    </li>
                    <li>
                        <a href="game-history.html">
                            <span class="ico-menu-list">
                                <object width="20" data="{{asset('/frontend_theme/images/icon-menu-5.svg')}}" type="image/svg+xml">
                                    <img src="{{asset('/frontend_theme/images/icon-menu-5.png')}}" alt="Coin">
                                </object>
                            </span>
                            Game History
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="ico-menu-list">
                                <object width="20" data="{{asset('/frontend_theme/images/icon-menu-6.svg')}}" type="image/svg+xml">
                                    <img src="{{asset('/frontend_theme/images/icon-menu-6.png')}}" alt="Coin">
                                </object>
                            </span>
                            Settings
                        </a>
                    </li>
                    <li>
                        <a href="general.html">
                            <span class="ico-menu-list">
                                <object width="20" data="{{asset('/frontend_theme/images/icon-menu-7.svg')}}" type="image/svg+xml">
                                    <img src="{{asset(' images/icon-menu-7.png')}}" alt="Coin">
                                </object>
                            </span>
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a href="general.html">
                            <span class="ico-menu-list">
                                <object width="20" data="{{asset('/frontend_theme/images/icon-menu-8.svg')}}" type="image/svg+xml">
                                    <img src="{{asset('/frontend_theme/images/icon-menu-8.png')}}" alt="Coin">
                                </object>
                            </span>
                            Rules and Policies
                        </a>
                    </li>
                    <li>
                        <a href="contact.html">
                            <span class="ico-menu-list">
                                <object width="20" data="{{asset('/frontend_theme/images/icon-menu-9.svg')}}" type="image/svg+xml">
                                    <img src="{{asset('/frontend_theme/images/icon-menu-9.png')}}" alt="Coin">
                                </object>
                            </span>
                            Contact Us
                        </a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#modalLogout" style="cursor: pointer;">
                            <span class="ico-menu-list">
                                <object width="20" data="{{asset('/frontend_theme/images/icon-menu-10.svg')}}" type="image/svg+xml">
                                    <img src="{{asset('/frontend_theme/images/icon-menu-10.png')}}" alt="Coin">
                                </object>
                            </span>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        
    </div>

    <div class="modal fade modal-standard" tabindex="-1" role="dialog" id="modalLogout">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Logout?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                    <div class="w-50">
                        <a href="{{url('/logout')}}" class="btn button-green btn-block shadow-sm text-uppercase btn-sm">Yes</a>
                    </div>
                    <div class="w-50">
                        <button type="button" class="btn button-grey-young btn-block shadow-sm text-uppercase btn-sm" data-dismiss="modal" aria-label="Close">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection