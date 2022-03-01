@extends('cms/layout')

@section('content')
  <h1>Events Calendar</h1>
  {{ $message = Session::get('message'); }}
	  <div class="secondaryButtonRow">
	    <a class="button add" href="{{ URL::route('addEvent') }}">+ Event</a>
	  </div>
	  @if($events)
		  <ul class="itemList">
		    @foreach($events as $event)
		      <li><a href="{{ URL::route('editEvent', $event->id) }}">{{ $event->title }}</a></li>
		    @endforeach
		  </ul>
		  <?php echo $events->links(); ?>
		@else
			<section class="col-3">
			  Could not find any events.
			</section>
		@endif
@stop