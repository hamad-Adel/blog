<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<!-- Ckeditor-->
	<script src="//cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
</head>
<body>
	{{-- Navbar --}}
	@include('layouts.nav')
	
	<div class="container">
		{{-- Flash message --}}
		@include('layouts.flash')
		@yield('content')
	</div>
	<!-- Javascrpt -->
	<script src="{{ asset('js/app.js') }} "></script>
	@yield('scripts')
</body>
</html>
