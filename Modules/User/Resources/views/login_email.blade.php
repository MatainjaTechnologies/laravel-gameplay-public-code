@extends('layouts.frontend_layout.frontend_design')

@section('content')

<body class="body-login">
    <div class="login-wrapper">
        <div class="container">
           
            <div class="login-logo">
                <img class="img-fluid" src="{{ asset('images/slypee-logo.png')}}" alt="Logo">
            </div>
        <form method="POST" action="{{ url('login') }}">
            @csrf
            <div class="login-box">
                <p class="login-heading">Login with Email</p>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{Request::old('name')}}">
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{Request::old('password')}}">
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                </div>
                <button type="submit"  class="btn btn-success btn-block">Login</button>
                <p class="login-box-bottom-link text-left">
                    <a href="forgot-password.html">Forgot Password?</a>
                </p>
            </div>
        </form>
        </div>
    </div>
    @endsection