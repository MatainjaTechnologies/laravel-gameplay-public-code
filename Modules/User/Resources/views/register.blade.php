@extends('layouts.frontend_layout.frontend_design')

@section('content')
    <body class="body-login">
    <div class="login-wrapper">
        <div class="container">
            <div class="login-logo">
                <img class="img-fluid" src="{{asset('images/slypee-logo.png')}}" alt="Logo">
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('user/store/submit') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="login-box">
                <p class="login-heading">Sign Up with Email</p>
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{Request::old('name')}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" valuse="{{Request::old('email')}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{Request::old('password')}}">
                </div>
                <div class="form-group">
                    <label for="retypePassword">Retype Password</label>
                    <input type="password" class="form-control" id="retypePassword" name="retypepassword">
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkbox" name="checkbox">
                    <label class="form-check-label" for="checkbox">I agree to  <a href="{{ url('registration/terms-and-condition') }}">terms and condition</a></label>
                </div>
                <button type="submit" class="btn btn-success btn-block">Sign Up</button>
            </div>
            </form>
        </div>
    </div>
</body>


@endsection