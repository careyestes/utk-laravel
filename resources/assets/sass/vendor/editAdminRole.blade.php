@extends('cms/layout')

@section('content')
  @include('cms/titleButtons', array('type' => 'edit', 'object' => $adminRole, 'routeName' => 'AdminRole', 'name'=> 'Admin Role'))

	  {!! $message = Session::get('message') !!}

		  @if($adminRole and $adminRole->id)
			  {!! Form::model($adminRole, array('route' => array('updateAdminRole', $adminRole->id))) !!}
		  @else
			  {!! Form::model($adminRole, array('route' => array('addNewAdminRole'))) !!}
			@endif	 
			  <div class="formRow">
			    {!! Form::label('type', 'Type:') !!}
			    {!! Form::text('type', null, array('required')) !!}
		    </div>
		  
		  @include('cms/submitButtons', array('object' => $adminRole, 'routeName' => 'AdminRole', 'name'=> 'Admin Role'))
@stop