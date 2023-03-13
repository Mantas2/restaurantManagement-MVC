<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\View;
use App\Models\Tables;

class TablesController
{

    public function __construct(
        protected Tables $tablesModel
    ){}

    public function seats()
    {
        $checkSeats = $this->validateData($_POST['guests']);

        return (new View('sitting/tables', ['checkSeats' => $checkSeats]))->make();
    }

    public function chooseTable()
    {

        $this->takeTable($_POST['tableOption']);
        $table = $_POST['tableOption'];

        return (new View('sitting/seated', ['tables' => $table]))->make();
    }

    public function validateData(string $guests)
    {
        // check that does not exceed 5 seats and table is free
        $checkSeats = $this->tablesModel->getQueryResults("
        SELECT * FROM tables WHERE seats >= {$guests} ORDER BY table_number ASC
        ");

        return $checkSeats;
    }

    public function takeTable(string $table)
    {
        $takeTable = $this->tablesModel->getQueryResults("
        UPDATE tables SET is_available = false WHERE table_number = {$table}
        ");

        return $takeTable;
    }

    

}