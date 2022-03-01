@extends('cms/layout')

@section('content')

    @include('cms/titleButtons', array('type' => 'show', 'object' => null, 'routeName' => 'Location', 'name'=> 'Locations'))

	  @if(isset($locations))
		  <ul class="itemList">
		    @foreach($locations as $location)
		      <li><a href="{{ URL::route('editLocation', $location->id) }}">{!! $location->name !!}</a></li>
		    @endforeach
		  </ul>
		@else
			<section class="col-3">
			  Could not find any locations.
			</section>
		@endif
@stop