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
            Setting
        </div>
    </div>

    <div class="content-wrapper">
        <div class="container">
            <div class="profile-avatar-wrapper text-center">
                <div class="profile-avatar-box">
                    <img src="{{ asset('images/ico_profile_big.png')}}" alt="Profile">
                </div>
            </div>
            <div class="profile-setting-box">
                <div class="form-group">
                    <label for="avatar" style="margin-bottom: 5px;">Avatar</label>
                    <input type="file" class="form-control-file" id="avatar">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" value="{{ isset(Auth::user()->name) ? ucfirst(Auth::user()->name) : 'Guest' }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" value="">
                </div>
                <div class="form-group">
                    <label for="retypePassword">Retype Password</label>
                    <input type="password" class="form-control" id="retypePassword">
                </div>
                <a href="#" class="btn btn-success btn-block">Save</a>
            </div>
        </div>
    </div>
@endsection