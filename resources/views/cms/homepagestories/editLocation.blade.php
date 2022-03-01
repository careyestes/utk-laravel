@extends('cms/layout')

@section('content')
  
  @include('cms/titleButtons', array('type' => 'edit', 'object' => $location, 'routeName' => 'Location', 'name'=> 'Location'))

	  {!! $message = Session::get('message') !!}
	  @if(isset($location))
		  @if($location->id)
			  {!! Form::model($location, array('route' => array('updateLocation', $location->id))) !!}
		  @else
			  {!! 
				  Form::model($location, array('route' => array('addNewLocation'))) !!}
			@endif	 
		    <div class="formRow">
			    {!! Form::label('name', 'Name:') !!}
			    {!! Form::text('name', null, array('required')) !!}
		    </div>

			  <div class="formRow">
			    {!! Form::label('address', 'Address:') !!}
			    {!! Form::text('address', null, array('required')) !!}
		    </div>
		    
		    <div class="formRow">
			    {!! Form::label('city', 'City:') !!}
			    {!! Form::text('city', null, array('required')) !!}
		    </div>

		    <div class="formRow">
			    {!! Form::label('state', 'State:') !!}
			    {!! Form::text('state', null, array('required')) !!}
		    </div>

		    <div class="formRow">
			    {!! Form::label('country', 'Country:') !!}
			    {!! Form::text('country', null, array('required')) !!}
		    </div>

		    <div class="formRow">
			    {!! Form::label('zip', 'Zip:') !!}
			    {!! Form::text('zip', null, array('required')) !!}
		    </div>

		    <div class="formRow">
			    {!! Form::label('lat', 'Latitude:') !!}
			    {!! Form::text('lat', null, array('required')) !!}
		    </div>

		    <div class="formRow">
			    {!! Form::label('lon', 'Longitude:') !!}
			    {!! Form::text('lon', null, array('required')) !!}
		    </div>

		    {!! Form::label('user_id', 'User Type:') !!}
		    <div class="formRow">
		    {!! Form::select('user_id', $selectUserTypes , $location->user_id , array('required', 'class' => 'formSelect')); !!}
		    </div>

		    <div class="formRow">
			    {!! Form::label('url', 'url:') !!}
			    {!! Form::text('url') !!}
		    </div>

		    <div class="formRow">
			    {!! Form::label('phone_1', 'Phone 1:') !!}
			    {!! Form::text('phone_1') !!}
		    </div>

		    <div class="formRow">
			    {!! Form::label('phone_2', 'Phone 2:') !!}
			    {!! Form::text('phone_2') !!}
		    </div>

		    <div class="formRow">
			    {!! Form::label('email', 'Email:') !!}
			    {!! Form::email('email') !!}
		    </div>

		    <div class="formRow">
			    {!! Form::label('description', 'Description:') !!}
			    {!! Form::text('description') !!}
		    </div>


			  @include('cms/submitButtons', array('object' => $location, 'routeName' => 'Location', 'name'=> 'Location'))

		@else
			<section class="col-xs-9">
			  Could not find User. Please try again.
			</section>
		@endif
@stop