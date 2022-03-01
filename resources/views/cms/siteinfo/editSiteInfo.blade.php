@extends('cms/layout')

@section('content')
  
  <section class="titleButtons">
		<h1 class="formTitle">Site Info</h1>
		@if(isset($role) and $role === "Administrator" or $role === "Super Admin")
			<a class="addObject" href="{{ URL::route('addSiteInfo') }}">+ Site Info Entry</a>
		@endif
	</section>
	  
	  {!! $message = Session::get('message') !!}
		@if(isset($siteInfos))

			{!! Form::model($siteInfos, array('route' => array('editSiteInfo'), 'files' => 'true')) !!}

			@foreach($siteInfos as $index => $info) 

				@if(isset($role) and $role === "Super Admin")

			    <div class="formRow">
				    {!! Form::label($info->site_info_key.'_'.$index, 'Setting Key:') !!}
				    {!! Form::text($info->site_info_key.'_'.$index, $info->site_info_key) !!}
			    </div> 
			  
			    <div class="formRow">
				    {!! Form::label($info->site_info_value.'_'.$index, 'Setting Value:') !!}
				    {!! Form::text($info->site_info_value.'_'.$index, $info->site_info_value) !!}
			    </div> 

			  @else

				  {!! $info->site_info_key !!}
				  {!! Form::hidden('site_info_key_'.$index, $info->site_info_key) !!}

				  <div class="formRow">
				    {!! Form::text('site_info_value_'.$index, $info->site_info_value) !!}
			    </div> 

				@endif


		    <hr>


			@endforeach

		@else

			<div class="formRow">
		    {!! Form::label('site_info_key', 'Setting Key:') !!}
		    {!! Form::text('site_info_key', null) !!}
	    </div> 


	    <div class="formRow">
		    {!! Form::label('site_info_value', 'Setting Value:') !!}
		    {!! Form::text('site_info_value', 'site_info_value') !!}
	    </div> 

		@endif

		{!! Form::hidden('count', $count) !!}
			
			<div class="formRow buttonRow">
			  
			    {!! Form::submit('Update', array('class' => 'submit button add')) !!} 
			 
			</div>

@stop