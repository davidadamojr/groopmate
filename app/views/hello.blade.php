<!DOCTYPE html>
<html lang="en">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<head>
		<title>Welcome to Groopmate</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" />
	</head>
	<body>
		<div class="welcome-container">
			<img src="{{ URL::asset('img/logo.png') }}" alt="Groopmate!" />
			<h4>Collaborating on schoolwork has never been easier</h4>
			<p>Groopmate allows you create and manage exclusive groups to collaboratively prepare for tests and share ideas with classmates!</p><br/><br/>
			<a href="{{ url('welcome') }}"><img src="{{ asset('img/fblogin.png') }}" alt="Facebook login" /></a><br/>
			<span class="small">We will never post anything without permission!</span>
			<div class="welcome-footer">
				<a href="#"><small>About</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="#"><small>Terms of Use & Privacy</small></a>
			</div>
		</div>
	</body>
</html>