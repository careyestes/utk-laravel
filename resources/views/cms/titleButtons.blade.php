<section class="titleButtons">
	@if($type == 'edit')
		<small class="showAll breadcrumb"><a href="{{ URL::route('show'.$routeName) }}">« View all {!! $name !!}s</a></small>
	@endif
	@if($type == 'show')
		<h1 class="formTitle">{!! $name !!}</h1>
	@elseif($type == 'edit')
		<h1 class="formTitle">@if($object->id)Edit @else Create @endif{!! $name !!}</h1>
	@endif
	<a class="addObject" href="{{ URL::route('create'.$routeName) }}">+ {!! $name !!}</a>
</section>