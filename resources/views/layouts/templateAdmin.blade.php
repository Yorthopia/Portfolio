<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Portfolio</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('lib/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
</head>
<body>
	<div class="nav-wrapper">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ url('admin') }}">{{ strtoupper(Auth::user()->login) }}</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="{{ url('admin/user') }}" class="nav-link">User</a></li>
						<li><a href="{{ url('admin/skill') }}" class="nav-link">Skill</a></li>
						<li><a href="{{ url('admin/exp') }}" class="nav-link">Exp</a></li>
						<li><a href="{{ url('admin/educ') }}" class="nav-link">Educ</a></li>
						<li><a href="{{ url('admin/project') }}" class="nav-link">Project</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</div>
	<div class="container">
		@yield('content')
	</div>
	<script type="text/javascript" src="{{ URL::asset('lib/jquery/jquery-2.1.3.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
	@yield('js')
</body>
</html>
