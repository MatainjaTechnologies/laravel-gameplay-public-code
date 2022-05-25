@extends('user::layouts.master')

@section('content')
Hi <strong>{{ $name }}</strong>,
 <p>Welcome to Slypee</p>
 <p>Click on the link below for verification </p>
 <p><a href="http://127.0.0.1:8000/user/verify/{{$secretkey}}/{{$secretkey_email}}">http://127.0.0.1:8000/user/verify/{{$secretkey}}</p>

 <p>Thank you</p>
 <p>Slypee Team </p>
@endsection
