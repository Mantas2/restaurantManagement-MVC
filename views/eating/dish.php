<!DOCTYPE html>
<html>
<head>
	<title>Choose a dish</title>
</head>

<form action="/sit/seated/choose" method="post">
		<label for="dish">Please choose a dish:</label>
		<select id="dish" name="dish">
		    <option value="1"><?= $dishes[0]['name'] ?></option>
			<option value="2"><?= $dishes[1]['name'] ?></option>
		</select>
		<input type="submit" value="Select">
	</form>

</html>