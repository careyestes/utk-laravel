@extends('cms/layout')

@section('content')

	  @include('cms/titleButtons', array('type' => 'show', 'object' => null, 'routeName' => 'Page', 'name'=> 'Pages'))
	
	  @if(isset($pages))
		  <ul class="itemList">
		    @foreach($pages as $page)
		      <li><a href="{{ URL::route('editPage', $page->id) }}">{!! $page->title !!}</a></li>
		    @endforeach
		  </ul>
		@else
			<section class="col-3">
			  Could not find any pages.
			</section>
		@endif
@stop