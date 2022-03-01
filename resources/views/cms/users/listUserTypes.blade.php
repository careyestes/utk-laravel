@extends('cms/layout')

@section('content')

	@include('cms/titleButtons', array('type' => 'show', 'object' => $userTypes, 'routeName' => 'UserType', 'name'=> 'User Types'))

	{!! $message = Session::get('message') !!}

  @if(isset($userTypes))
	  <ul id="sortable" class="itemList">
	    @foreach($userTypes as $userType)
	        <li id="{{ $userType->sort }}"><span class="reorderIcon"></span><a href="{{ URL::route('editUserType', $userType->id) }}">{{ $userType->type }}</a></li>
	    @endforeach
	  </ul>
	  <input class="token" type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
	  <input class="route" type="hidden" name="_route" value="usertypes" />
  @endif
@stop