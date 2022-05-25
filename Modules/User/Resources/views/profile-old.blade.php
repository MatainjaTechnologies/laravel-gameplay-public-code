@extends('layouts.frontend_layout.frontend_design')

@section('content')
    <div class="header-profile">
        <div class="container">
            <div class="media">
                <img class="mr-3 img-fluid heading-profile-pic" src="{{ asset('images/ico_profile_big.png')}}" alt="Images">
                <div class="media-body">
                    <h5 class="mt-0 heading-profile-title">{{ isset(Auth::user()->name) ? ucfirst(Auth::user()->name) : 'Guest' }}</h5>
                    <p class="heading-profile-phone">08129484990</p>
                    @if(isset(Auth::user()->id))
                    <a href="#" class="btn btn-outline-light profile-subscribe-btn">Subscribe / Daily</a>
                    @else
                    <a href="{{url('login')}}" class="btn btn-outline-light profile-subscribe-btn">Login</a>
                    <a href="{{url('registration')}}" class="btn btn-outline-light profile-subscribe-btn">Registration</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="profile-info-shortcut">
            <div class="row no-gutters">
                <div class="col-6">
                    <a href="{{url('/how-to-play')}}" class="btn profile-info-btn btn-block">How To Play</a>
                </div>
                @if(isset(Auth::user()->id))
                <div class="col-6">
                    <a href="{{url('/activity')}}" class="btn profile-info-btn yellow btn-block">Game History</a>
                </div>
                @endif
            </div>
        </div>

        <div class="custom-menu-list">
            <ul>
                @if(isset(Auth::user()->id))
                <li>
                    <a href="{{url('/profile/settings')}}">
                        <span class="ico-menu-list setting"></span>
                        Setting
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{url('/help-center')}}">
                        <span class="ico-menu-list question"></span>
                        Help Center
                    </a>
                </li>
                <li>
                    <a href="{{url('/rules')}}">
                        <span class="ico-menu-list exc"></span>
                        Rules and Policies
                    </a>
                </li>
                @if(isset(Auth::user()->id))
                <li>
                    <a href="{{ route('logout') }}">
                        <span class="ico-menu-list exit"></span>
                        Logout
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
@endsection
