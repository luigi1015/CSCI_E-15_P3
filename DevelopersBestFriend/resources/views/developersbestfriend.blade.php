<!DOCTYPE html>
<html>
    <head>
        <title>Developer's Best Friend</title>
    </head>
    <body>
        <h1>Developer's Best Friend</h1>
        <div>
        <h2>Lorem Ipsum Generator</h2>
        <form method='POST' action="loremipsum">
			Paragraphs: <input type="number" name="paragraphs" min="1" max="99" step="1" value="1"> (Max:99)
			<br>
			<input type="submit" value="Get Lorem Ipsum">
        </form>
        </div>
        <div>
        <h2>Random User Generator</h2>
        <form method='POST' action="randomuser">
			Number of Users: <input type="number" name="users" min="1" max="99" step="1" value="1"> (Max:99)
			<br>
			<input type="checkbox" name="birthdate" value="birthdate">Birthdate<br>
			<input type="checkbox" name="profile" value="profile">Profile<br>
			<input type="submit" value="Get Users">
        </form>
        </div>
    </body>
</html>
