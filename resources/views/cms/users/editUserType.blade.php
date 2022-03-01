@extends('cms/layout')

@section('content')
  
  @include('cms/titleButtons', array('type' => 'edit', 'object' => $userType, 'routeName' => 'UserType', 'name'=> 'User Type'))

	  {!! $message = Session::get('message') !!}

		  @if($userType and $userType->id)
			  {!! Form::model($userType, array('route' => array('updateUserType', $userType->id))) !!}
		  @else
			  {!! Form::model($userType, array('route' => array('addNewUserType'))) !!}
			@endif	 
			  <div class="formRow">
			    {!! Form::label('type', 'Type:') !!}
			    {!! Form::text('type', null, array('required')) !!}
		    </div>
		   
		   @include('cms/submitButtons', array('object' => $userType, 'routeName' => 'UserType', 'name'=> 'User Type')) 
@stop