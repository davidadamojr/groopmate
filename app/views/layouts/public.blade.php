<!DOCTYPE html>
<html lang="en">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<head>
		<title>@yield('title')</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/sticky-footer.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.tagsinput.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/validationEngine.jquery.css') }}" />
		<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	</head>
	<body>
		<div id="wrap">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="#"><img src="{{ asset('img/logo-brand.png') }}" alt="Groopmate" /></a>
					</div>
					
					<!--<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li><a href="{{ url('groups') }}">My Groups</a></li>
							<!--<li><a href="{{ url('notifications') }}"><span class="badge pull-right">2</span>Notifications&nbsp;</a></li>-->
							<!--<li><a href="{{ url('invite') }}">Invite Friends</a></li>-->
							<!--<li><a href="{{ url('userstats') }}">User Stats</a></li>
							<li><a href="{{ url('logout') }}">Logout</a></li>
						</ul>
					</div>-->
				</div>
			</nav>
			<div class="container">
				@yield('content')
			</div>
		</div>
		<div id="footer">
			<div class="container">
				<small><a href="#">About</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Terms of Use & Privacy</a></small>
			</div>
		</div>
	</body>
</html>