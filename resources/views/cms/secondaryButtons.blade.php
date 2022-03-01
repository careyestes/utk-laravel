@if($type == "add")
	<div class="secondaryButtonRow">
	  <a class="button add" href="{{ URL::route($route) }}">+ {{ $content }}</a>
	</div>
@elseif($type == "delete") 
	<div class="secondaryButtonRow">
		<a class="button delete" href="{{ URL::route('deleteEvent') }}">Delete {{ $content }}</a>
	</div>
@endif