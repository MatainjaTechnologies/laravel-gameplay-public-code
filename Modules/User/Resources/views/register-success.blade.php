@extends('layouts.frontend_layout.frontend_design')

@section('content')
<div class="loading align-items-center justify-content-center">
    <img src="{{ asset('images/loading.gif')}}" alt="Loading">
</div>
<body class="body-login">
    <div class="login-wrapper">
        <div class="container">
            <div class="login-logo">
                <img class="img-fluid" src="{{ asset('images/slypee-logo.png')}}" alt="Logo">
            </div>
            <div class="login-box text-center">
                <img src="{{ asset('images/ico_check_inbox.png')}}" alt="Success" width="80" class="img-fluid mb-3">
                <h5 class="mb-3">Check Your Inbox</h5>
                <p>We have sent an email with a confirmation link to your email address. In order to complete the sign-up process, please click the confirmation link.</p>
                <small class="mb-0">If you do not receive a confirmation email, please check your spam folder. Also, please verify that you entered a valid email address in our sign-up form</small>
                <a href="{{ url('login') }}" class="btn btn-login-box-grey btn-block mt-3">Back to Login</a>
            </div>
        </div>
    </div>
    @endsection