<section class="navColumn col-sm-4">
	<section class="navItem"><a href="{{ URL::route('showDashboard') }}">Dashboard</a></section>
	<section class="navItem"><a href="{{ URL::route('showAdminRole') }}">Admin Roles</a></section>
	{{-- <section class="navItem"><a href="{{ URL::route('showEvents') }}">Events</a></section> --}}
  <section class="navItem"><a href="{{ URL::route('showHomepageStory') }}">Homepage Stories</a></section>
  <section class="navItem"><a href="{{ URL::route('showLocation') }}">Locations</a></section>
  <section class="navItem"><a href="{{ URL::route('showPage') }}">Pages</a></section>
  <section class="navItem"><a href="{{ URL::route('editSiteInfo') }}">Site Info</a></section>
  <section class="navItem"><a href="{{ URL::route('showSpotlight') }}">Spotlights</a></section>
  <section class="navItem"><a href="{{ URL::route('showUser') }}">Users</a></section>
  <section class="navItem"><a href="{{ URL::route('showUserType') }}">User Types</a></section>
  <section class="navItem"><a href="/logout">Logout</a></section>
</section>