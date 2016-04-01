<!DOCTYPE html>
<html>
    <head>
        <title>Lorem Ipsum</title>
    </head>
    <body>
        <h1>Lorem Ipsum</h1>
	@foreach ($loremIpsum as $paragraph)
	<p>
		{{ $paragraph }}
	</p>
	@endforeach
	<a href="/">Main Page</a>
    </body>
</html>
