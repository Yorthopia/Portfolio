<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="christophe aupet" />
	<title>My Portfolio</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('lib/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
</head>
<body>
	@yield('nav')
	<div class="container">
		@yield('content')
	</div>
	<script type="text/javascript" src="{{ URL::asset('lib/jquery/jquery-2.1.3.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
	@yield('js')
</body>
</html>
