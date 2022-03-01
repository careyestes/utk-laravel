@extends('cms/layout')

@section('content')
  
  <section class="titleButtons">
		<h1 class="formTitle">Add Site Info Custom Key</h1>
	</section>
	  
	  {!! $message = Session::get('message') !!}
		@if(isset($siteInfo))

			{!! Form::model($siteInfo, array('route' => array('insertSiteInfo'), 'files' => 'true')) !!}


			<div class="formRow">
		    {!! Form::label('site_info_key', 'Setting Key:') !!}
		    {!! Form::text('site_info_key', null) !!}
	    </div> 


	    <div class="formRow">
		    {!! Form::label('site_info_value', 'Setting Value:') !!}
		    {!! Form::text('site_info_value', null) !!}
	    </div> 

		@endif
			
			<div class="formRow buttonRow">
			  
			    {!! Form::submit('Update', array('class' => 'submit button add')) !!} 
			 
			</div>

@stop