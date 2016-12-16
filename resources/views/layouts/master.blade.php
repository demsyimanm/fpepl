<!DOCTYPE html>
<html>
@include('header')
  
  <body class="hold-transition skin-blue sidebar-mini">
  	<div class="wrapper">
		@include('navbar')
		<div class="content-wrapper">
			@yield('content')
		</div>
	</div>
	@include('footer')	

      
  </body>
</html>