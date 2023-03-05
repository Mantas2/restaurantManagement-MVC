<!DOCTYPE html>
<html>
<head>
	<title>Welcome to the restaurant</title>
</head>
<body>
	<h1>Welcome to the restaurant</h1>
	<p>Please register for a table below:</p>
	<form action="/sit" method="post">
		<label for="guests">Number of guests:</label>
		<input type="number" id="guests" name="guests" min="1" max="5">
		<br>
		<input type="submit" value="Register">
	</form>
</body>
</html>
