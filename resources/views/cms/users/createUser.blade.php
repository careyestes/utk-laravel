@extends('cms/layout')

@section('content')

  @include('cms/titleButtons', array('type' => 'edit', 'object' => $user, 'routeName' => 'User', 'name'=> 'User'))
	  
		  {!! Form::model($user, array('route' => array('createUser'))) !!}
			  <div class="formRow">
			    {!! Form::label('email', 'E-Mail Address:') !!}
			    {!! Form::email('email') !!}
		    </div>

		    <div class="formRow">
			    {!! Form::label('name', 'Name:') !!}
			    {!! Form::text('name') !!}
		    </div>

		    <div class="formRow">
			    {!! Form::label('password', 'Password:') !!}
			    {!! Form::password('password') !!}
		    </div>

		    <div class="formRow">
			    {!! Form::label('confirm_password', 'Confirm Password:') !!}
			    {!! Form::password('confirm_password') !!}
		    </div>
			  <div class="formRow">
			    {!! Form::submit('Submit') !!}
		    </div>
		    {!! Form::close() !!}
		
@stop