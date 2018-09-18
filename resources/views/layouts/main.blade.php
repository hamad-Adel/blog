<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>
	@include('layouts.nav')
	<div class="container">
		@yield('content')
	</div>

	<!-- Javascrpt -->
	<script src="{{ asset('js/app.js') }} "></script>
</body>
</html>