@extends('cms/layout')

@section('content')

	@include('cms/titleButtons', array('type' => 'show', 'object' => null, 'routeName' => 'AdminRole', 'name' => 'Admin Roles'))

  @if(isset($adminRoles))
	  <ul id="sortable" class="itemList">
	    @foreach($adminRoles as $adminRole)
	        <li id="{{ $adminRole->sort }}"><span class="reorderIcon"></span><a href="{{ URL::route('editAdminRole', $adminRole->id) }}">{!! $adminRole->type !!}</a></li>
	    @endforeach
	  </ul>
	  <input class="token" type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
	  <input class="route" type="hidden" name="_route" value="adminroles" />
  @endif
@stop