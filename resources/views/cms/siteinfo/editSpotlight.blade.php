@extends('cms/layout')

@section('content')
  
  @include('cms/titleButtons', array('type' => 'edit', 'object' => $spotlight, 'routeName' => 'Spotlight', 'name'=> 'Spotlight'))
	  
	  {!! $message = Session::get('message') !!}
		@if(isset($spotlight))
		  @if($spotlight->id)
			  {!! Form::model($spotlight, array('route' => array('updateSpotlight', $spotlight->id), 'files' => 'true')) !!}
		  @else
			  {!! 
				  Form::model($spotlight, array('route' => array('addSpotlight'), 'files' => 'true')) !!}
			@endif	 

		    <div class="formRow">
			    {!! Form::label('title', 'Title:') !!}
			    {!! Form::text('title', null, array('required')) !!}
		    </div> 


			  <div class="formRow">
			    {!! Form::label('subtitle', 'Subtitle:') !!}
			    {!! Form::text('subtitle', $spotlight->subtitle ) !!}
		    </div>

		    <div class="formRow">
			    {!! Form::label('description', 'Description:') !!}
				  {!! Form::textarea('description', $spotlight->description , ['class' => 'wysiwyg']) !!}
		    </div>

		    <div class="formRow">
			    {!! Form::label('featured_image', 'Featured Image:') !!}
			    
			    <div class="featuredImageContainer ">
			    
				    @if($featured_image) 
						    <div class="selectedFeaturedImage">

							    <p>Current Image:</p>
							    <img src="{{ route('getentry', $featured_image->filename) }}"  />
			            <div class="caption">
			                <small>File Name: {{ $featured_image->original_filename }}</small>
			            </div>
			            <button class="removeFeaturedImage button delete" type="button">Remove Featured Image</button>
							    {!! Form::hidden('featured_image', $spotlight->featured_image) !!}
						    	
						    </div>
	          @else
		          <div class="featuredImageContainer addFeaturedImage">
						    {!! Form::file('featured_image', array('required')) !!}
					    </div>
				    @endif
			  
				  </div>

		    </div>

		    <div class="formRow">
			    {!! Form::label('user_id', 'User Type:') !!}
			    {!! Form::select('user_id', $selectUserTypes , $spotlight->user_id , array('required', 'class' => 'formSelect')); !!}
		    </div>

		    <div class="formRow">
			    {!! Form::label('link', 'Links to:') !!}
			    {!! Form::text('link', $spotlight->link ) !!}
		    </div>

			  @include('cms/submitButtons', array('object' => $spotlight, 'routeName' => 'Spotlight', 'name'=> 'Spotlight'))


		@else
			<section class="col-xs-9">
			  Could not find User. Please try again.
			</section>
		@endif
@stop

@section('customScripts')
	{!! Html::script('packages/ckeditor/ckeditor.js') !!}
@stop