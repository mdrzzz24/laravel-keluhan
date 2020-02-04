<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{{-- Stylesheet --}}
	<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
</head>
<body>
	
	{{-- Content --}}
	@yield('content')
	{{-- Akhir Content --}}
	
{{-- Script --}}
<script src="{{ asset('/js/jquery.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
</body>
</html>