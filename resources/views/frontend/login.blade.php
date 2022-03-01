@extends('frontend/layout')

@section('content')
  <h1>CMS Login</h1>
  {!! $message = Session::get('message') !!}
  
  {!! Form::open(array('url' => 'login')) !!}
	  {!! Form::label('email', 'Email Address') !!}
	  {!! Form::text('email') !!}

	  {!! Form::label('password', 'Password') !!}
	  {!! Form::password('password') !!}

	  {!! Form::submit('Log In') !!}

  {!! Form::close() !!}
@stop