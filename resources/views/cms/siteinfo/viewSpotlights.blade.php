@extends('cms/layout')

@section('content')

	  @include('cms/titleButtons', array('type' => 'show', 'object' => null, 'routeName' => 'Spotlight', 'name'=> 'Spotlight'))
	
	  @if(isset($spotlights))
		  <ul class="itemList">
		    @foreach($spotlights as $spotlight)
		      <li><a href="{{ URL::route('editSpotlight', $spotlight->id) }}">{!! $spotlight->title !!}</a></li>
		    @endforeach
		  </ul>
		@else
			<section class="col-3">
			  Could not find any Spotlights.
			</section>
		@endif
@stop