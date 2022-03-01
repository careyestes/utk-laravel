<header>
	<hgroup>
	  <h3 class="killer-logo"><a href="{{ URL::to('/') }}" class="icon-logo-main">The University of Tennessee</a></h3>
	</hgroup>
	<h1>CMS</h1>
	@if(Auth::user()) 
		<section class="user-section">Welcome {!! Auth::user()->name !!}</section>
	@endif
</header>