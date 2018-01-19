<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Clínica Admin - @yield('title', 'Início')</title>
	@include('admin.partials.css')
	@yield('styles')
</head>
<body>
	@include('admin.partials.menu')
  <div class="container">
	 @yield('content')
  </div>
	@include('admin.partials.footer')
	@include('admin.partials.js')
	@yield('scripts')
</body>
</html>