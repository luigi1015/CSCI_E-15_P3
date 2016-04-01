<!DOCTYPE html>
<html>
    <head>
        <title>Users</title>
    </head>
    <body>
        <h1>Users</h1>
	@foreach ($users as $user)
	<p>
		Name: {{ $user['name'] }}
		<br>
		{{isset($user['birthdate']) ? 'Birthdate: ' . $user['birthdate'] : '' }}
		<br>
		{{isset($user['profile']) ? 'Profile: ' . $user['profile'] : '' }}
	</p>
	@endforeach
	<a href="/">Main Page</a>
    </body>
</html>
