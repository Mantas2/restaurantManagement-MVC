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

        <?php foreach ($checkSeats as $table): ?> 
            <?php if($table['is_available'] == 0): ?>
                <option value="<?= $table['table_number'] ?>" disabled>Table <?= $table['table_number'] ?></option>
            <?php else: ?>
                <option value="<?= $table['table_number'] ?>">Table <?= $table['table_number'] ?></option>
            <?php endif; ?>
        <?php endforeach; ?>

		</select>
		<input type="submit" value="Register">
	</form>

    </body>
</html>