@extends('frontend/layout')

@section('content')
  @if($featuredHomepageStory)
	  <header class="homepage">
	  	
			<section class="homepageStories">
				@if($featuredHomepageStoryImage)
					<img src="{{ route('getentry', $featuredHomepageStoryImage->filename) }}" alt="{!! $featuredHomepageStory->title !!}"  />
				@endif
				
				<h2>{!! $featuredHomepageStory->title !!}</h2>
				
			</section>

			<nav class="topNav">
					<img class="logo" src="{{ URL::asset('assets/images/main.logo.centered.png') }}" title="University of Tennessee" alt="University of Tennessee Logo">
					<ul>
						<li><a href="#">Menu</a></li>
						<li><a href="/alpha">A – Z</a></li>
						<li><a href="/map">Map</a></li>
					</ul>
			</nav>
			
	  </header>
	@endif
	<section class="homeContent">
		@include('frontend/mainNavigation')
		
		<section class="subtitle">
			@if(isset($homepageTitle))<h2>{!! $homepageTitle->site_info_value !!}</h2>@endif
			@if(isset($homepageSubtext))<h3>{!! $homepageSubtext->site_info_value !!}</h3>@endif
		</section>

		@if(isset($userTypes))
			<section class="selectType">
				<select>
					@foreach($userTypes as $user)
						<option value="{!! $user->id !!}" >{!! $user->type !!}</option>
					@endforeach
				</select>
			</section>
		@endif
		
	</section>

@stop