<div class="formRow buttonRow">
  @if($object->id) 
    <a href="{!! URL::route( 'delete'.$routeName, $object->id) !!}" class="deleteText" type="button">Delete {!! $name !!}</a>
    {!! Form::submit('Update', array('class' => 'submit button add')) !!} 
  @else 
	  {!! Form::submit('Add', array('class' => 'button add')) !!} 
	@endif
</div>