@extends('cms/layout')

@section('content')
  
  @include('cms/titleButtons', array('type' => 'edit', 'object' => $user, 'routeName' => 'User', 'name'=> 'User'))

	  {!! $message = Session::get('message') !!}
	  @if(isset($user))
		  @if($user->id)
			  {!! Form::model($user, array('route' => array('updateUser', $user->id))) !!}
		  @else
			  {!! 
				  Form::model($user, array('route' => array('addNewUser'))) !!}
			@endif	 
			  <div class="formRow">
			    {!! Form::label('email', 'E-Mail Address:') !!}
			    {!! Form::email('email', null, array('required')) !!}
		    </div>

		    <div class="formRow">
			    {!! Form::label('name', 'Name:') !!}
			    {!! Form::text('name', null, array('required')) !!}
		    </div>

		    <div class="formRow">
			    {!! Form::label('password', 'Password:') !!}
			    {!! Form::password('password', null, array('required')) !!}
		    </div>

		    <div class="formRow">
			    {!! Form::label('confirm_password', 'Confirm Password:') !!}
			    {!! Form::password('confirm_password', null, array('required')) !!}
		    </div>

			  {!! Form::label('user_id', 'User Type:') !!}
			    <div class="formRow">
			    {!! Form::select('user_id', $selectUserTypes , $user->user_id, array('required', 'class' => 'formSelect')); !!}
			    </div>

		    {!! Form::label('admin_id', 'Admin Role:') !!}
			    <div class="formRow">
			    {!! Form::select('admin_id', $selectAdminRoles , $user->admin_id, array('required', 'class' => 'formSelect')); !!}
			    </div>
			  
			  @include('cms/submitButtons', array('object' => $user, 'routeName' => 'User', 'name'=> 'User'))

		@else
			<section class="col-xs-9">
			  Could not find User. Please try again.
			</section>
		@endif
@stop