@extends('cms/layout')

@section('content')

	@include('cms/titleButtons', array('type' => 'show', 'object' => null, 'routeName' => 'User', 'name'=> 'Users'))

  @if(isset($users))
	  <ul class="itemList">
	    @foreach($users as $user)
	        <li><a href="{{ URL::route('editUser', $user->id) }}">{{ $user->name }}</a></li>
	    @endforeach
	  </ul>
  @endif
@stop