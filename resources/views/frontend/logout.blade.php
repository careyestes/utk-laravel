@extends('frontend/layout')

@section('content')
  <p>You have logged out of your session. <a href="{{ URL::to('/login') }}">Log in?</a></p>
@stop