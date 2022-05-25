@extends('user::layouts.master')

@section('content')
Hi <strong>{{ $name }}</strong>,
 
 <p>{{ $body }}</p>
@endsection
