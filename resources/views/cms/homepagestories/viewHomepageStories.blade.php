@extends('cms/layout')

@section('content')

	  @include('cms/titleButtons', array('type' => 'show', 'object' => null, 'routeName' => 'HomepageStory', 'name'=> 'Homepage Stories'))
	
	  @if(isset($homepageStories))
		  <ul class="itemList">
		    @foreach($homepageStories as $homepageStory)
		      <li><a href="{{ URL::route('editHomepageStory', $homepageStory->id) }}">{!! $homepageStory->title !!}</a></li>
		    @endforeach
		  </ul>
		@else
			<section class="col-3">
			  Could not find any Homepage Stories.
			</section>
		@endif
@stop