<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tables</title>
    </head>
    <body>

    <h2>Choose a table</h2>
    
    <form action="/sit/seated" method="post">
		<label for="table">Currently available tables:</label>
		<select id="tableOption" name="tableOption">

        <?php for ($i = 0; $i <= 4; $i ++): ?> 
            <?php if($checkSeats[$i]['is_available'] == 0): ?>
                <option value="1" disabled>Table <?= $checkSeats[$i]['table_number'] ?></option>
            <?php else: ?>
                <option value="1">Table <?= $checkSeats[$i]['table_number'] ?></option>
            <?php endif; ?>
        <?php endfor; ?>

		</select>
		<input type="submit" value="Register">
	</form>

    </body>
</html>