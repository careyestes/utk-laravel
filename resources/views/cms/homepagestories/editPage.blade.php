@extends('cms/layout')

@section('content')
  
  @include('cms/titleButtons', array('type' => 'edit', 'object' => $page, 'routeName' => 'Page', 'name'=> 'Page'))
	  
	  {!! $message = Session::get('message') !!}
	  @if(isset($page))
		  @if($page->id)
			  {!! Form::model($page, array('route' => array('updatePage', $page->id))) !!}
		  @else
			  {!! 
				  Form::model($page, array('route' => array('addNewPage'))) !!}
			@endif	 
		    <div class="formRow">
			    {!! Form::label('title', 'Title:') !!}
			    {!! Form::text('title', null, array('required')) !!}
		    </div>

			  <div class="formRow">
			    {!! Form::label('slug', 'Slug: (this is autogenerated from the title)'); !!}
			    {!! Form::text('slug', $page->slug, array('class' => 'slug', 'readonly' => true) ); !!}
			    <input class="overrideSlug" name="overrideSlugCheckbox" type="checkbox"><label class="overrideSlugLabel" for="overrideSlugCheckbox">Override slug</label>
		    </div>

		    <div class="formRow">
			    {!! Form::label('description', 'Description:') !!}
				  {!! Form::textarea('description', $page->description , ['class' => 'wysiwyg']) !!}
		    </div>
		    

		    <div class="formRow">
			    {!! Form::label('user_id', 'User Type:') !!}
			    {!! Form::select('user_id', $selectUserTypes , $page->user_id , array('required', 'class' => 'formSelect')); !!}
		    </div>

			  @include('cms/submitButtons', array('object' => $page, 'routeName' => 'Page', 'name'=> 'Page'))

		@else
			<section class="col-xs-9">
			  Could not find User. Please try again.
			</section>
		@endif
@stop