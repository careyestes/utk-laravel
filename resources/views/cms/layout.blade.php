<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf-8">
  	<title>UTK.edu CMS</title>
  	{!! Html::style('assets/css/cms/cms.layout.css') !!}
  </head>
  <body>
    <div class="wrapper">
      @include('cms/headerLogo')
      <section class="mainContent">
        @include('cms/mainNavigation')
        <section class="contentColumn col-sm-8">
          @yield('content')
        </section>
      </section>
      <footer class="col-sm-12">
        &copy;{{ date('Y') }} University of Tennessee
      </footer>
    </div>
  {{-- Adding scripts to the tail --}}
  {{-- First...load jquery --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
  @yield('customScripts')
  {{-- Now load the script stack from local --}}
  {!! Html::script('assets/js/cms/all.js') !!}
  </body>
</html>