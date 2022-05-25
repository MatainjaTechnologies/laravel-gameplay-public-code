@extends('layouts.frontend_layout.frontend_design')

@section('content')
    <div class="loading align-items-center justify-content-center">
        <img src="images/loading.gif" alt="Loading">
    </div>
    <div class="header-title">
        <div class="container d-flex align-items-center">
            <a href="{{ url()->previous() }}" class="header-title-back">
                <img class="img-fluid" src="{{ asset('images/ico_prev_white.png')}}" alt="Prev">
            </a>
            Notification
        </div>
    </div>

    <div class="content-wrapper">
        <div class="container">
            {{-- <div class="notif-box">
                <div class="row no-gutters">
                    <div class="col-9">
                        <div class="media">
                            <div class="notif-box-ico green"></div>
                            <div class="media-body">
                                <h5 class="mt-0">Your Daily Subscribe Is Success</h5>
                                <p class="mb-0">Valid Until <span class="date">12/11/2020</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <p class="text-right">12/11/2020</p>
                    </div>
                </div>
            </div> --}}
            @foreach ($notifications as $notification)
                <div class="notif-box">
                    <div class="row no-gutters">
                        <div class="col-9">
                            <div class="media">
                                <div class="notif-box-ico red"></div>
                                <div class="media-body">
                                    <h5 class="mt-0">{{$notification->description}}</h5>
                                    <p class="mb-0">{{ucfirst(trans($notification->title))}}: <span class="date">{{ucfirst(trans($notification->type))}}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <p class="text-right">12/11/2020</p>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div class="notif-box">
                <div class="row no-gutters">
                    <div class="col-9">
                        <div class="media">
                            <div class="notif-box-ico red"></div>
                            <div class="media-body">
                                <h5 class="mt-0">Your Purchase Is Success</h5>
                                <p class="mb-0">Item <span class="date">Wallpaper</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <p class="text-right">12/11/2020</p>
                    </div>
                </div>
            </div>
            <div class="notif-box">
                <div class="row no-gutters">
                    <div class="col-9">
                        <div class="media">
                            <div class="notif-box-ico red"></div>
                            <div class="media-body">
                                <h5 class="mt-0">Your Purchase Is Success</h5>
                                <p class="mb-0">Item <span class="date">Video</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <p class="text-right">12/11/2020</p>
                    </div>
                </div>
            </div>
            <div class="notif-box">
                <div class="row no-gutters">
                    <div class="col-9">
                        <div class="media">
                            <div class="notif-box-ico yellow"></div>
                            <div class="media-body">
                                <h5 class="mt-0">Congrats, You’re Winning The Game Competition</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <p class="text-right">12/11/2020</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
