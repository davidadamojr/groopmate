<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Groopmate Invitation</h2>

		<div>
			{{ $from }} invited you to join his group on <a href="{{ url('/') }}" target="_blank">Groopmate</a>. Please click the link below to accept the invitation.<br/><br/>
			{{ $confirmation_link }}
		</div>
	</body>
</html>