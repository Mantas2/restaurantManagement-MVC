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

        <?php if($checkSeats[0]['is_available'] == 0): ?>
		    <option value="1" disabled>Table <?= $checkSeats[0]['table_number'] ?></option>
        <?php else: ?>
            <option value="1">Table <?= $checkSeats[0]['table_number'] ?></option>
        <?php endif; ?>

        <?php if($checkSeats[1]['is_available'] == 0): ?>
			<option value="2" disabled>Table <?= $checkSeats[1]['table_number'] ?></option>
        <?php else: ?>
            <option value="2">Table <?= $checkSeats[1]['table_number'] ?></option>
        <?php endif; ?>

        <?php if($checkSeats[2]['is_available'] == 0): ?>
			<option value="3" disabled>Table <?= $checkSeats[2]['table_number'] ?></option>
        <?php else: ?>
            <option value="3">Table <?= $checkSeats[2]['table_number'] ?></option>
        <?php endif; ?>

        <?php if($checkSeats[3]['is_available'] == 0): ?>
			<option value="4" disabled>Table <?= $checkSeats[3]['table_number'] ?></option>
        <?php else: ?>
            <option value="4">Table <?= $checkSeats[3]['table_number'] ?></option>
        <?php endif; ?>

        <?php if($checkSeats[4]['is_available'] == 0): ?>
			<option value="5" disabled>Table <?= $checkSeats[4]['table_number'] ?></option>
        <?php else: ?>
            <option value="5">Table <?= $checkSeats[4]['table_number'] ?></option>
        <?php endif; ?>

		</select>
		<input type="submit" value="Register">
	</form>

    </body>
</html>