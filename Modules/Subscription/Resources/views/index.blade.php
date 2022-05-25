@extends('frontend.frontend_template_subs')
@section('content')
<div class="login-wrapper">
    <div class="container-fluid box-wrapper">
        <div class="login-logo">
            <img class="img-fluid" src="{{asset('frontend_theme/images/logo-gemezz-white.png')}}" alt="Logo">
        </div>

        
       
        <div class="login-box">
            <div><center><p><b>Please Select Your Package</b></p></center></div>
            <a href="{{$data->daily_subs_url}}" class="btn button-green btn-block" id="destroy_session">Daily</a><br>
            <a href="{{$data->weekly_subs_url}}" class="btn button-green btn-block" id="destroy_session">Weekly</a><br>
            <a href="{{$data->yearly_subs_url}}" class="btn button-green btn-block" id="destroy_session">Full Package</a><br>
            <a href="{{url('/subscription/subscribe/login?refcode='.$name)}}" class="btn button-green btn-block" id="destroy_session">Test login</a><br>
        </div>

    </div>
</div>
@endsection
