{{-- @extends('layouts.frontend_layout.frontend_design')

@section('content')
<div class="loading align-items-center justify-content-center">
    <img src="{{ asset('images/loading.gif')}}" alt="Loading">
</div>
<body class="body-login">
    <div class="login-wrapper">
        <div class="container">
            <div class="login-logo">
                <img class="img-fluid" src="{{asset('images/slypee-logo.png')}}" alt="Logo">
            </div>
            <div class="login-box">
                <p class="login-heading">Login with</p>
                <div class="form-group">
                    <label for="email">Enter Your Phone Number</label>
                    <input type="text" class="form-control" id="email">
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkbox">
                    <label class="form-check-label" for="checkbox">I agree to  <a href="term-and-condition.html">terms and condition</a></label>
                </div>
                <a href="login-phone-numb-otp.html" class="btn btn-success btn-block">Continue</a>
            </div>
            <div class="login-box">
                <p class="login-heading text-center">Other Method</p>
                <a href="{{ url('login/email') }}" class="btn btn-login-box-grey btn-block">Email</a>
                <hr class="or">
                <div class="row no-gutters">
                    <div class="col-4" style="padding-right: 5px;">
                        <a href="#" class="btn btn-login-social fb btn-block">
                            <img src="{{url('images/ico_facebook.png')}}" class="img-fluid" alt="Facebook">
                        </a>
                    </div>
                    <div class="col-4" style="padding-left: 5px; padding-right: 5px;">
                        <a href="#" class="btn btn-login-social gl btn-block">
                            <img src="{{url('images/ico_google.png')}}" class="img-fluid" alt="Google">
                        </a>
                    </div>
                    <div class="col-4" style="padding-left: 5px;">
                        <a href="#" class="btn btn-login-social tw btn-block">
                            <img src="{{url('images/ico_twitter.png')}}" class="img-fluid" alt="Twitter">
                        </a>
                    </div>
                </div>
            </div>
            <p class="text-center mb-0 login-bottom">Don't have an account? <a href="{{ url('registration') }}">Register</a></p>
        </div>
    </div>
    @endsection --}}