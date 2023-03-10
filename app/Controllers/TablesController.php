<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\View;
use App\Models\Tables;

class TablesController
{
    public function seats()
    {

        $checkSeats = $this->validateData($_POST['guests']);

        return (new View('sitting/tables', ['checkSeats' => $checkSeats]))->make();

    }

    public function validateData(string $guests)
    {
        // check that does not exceed 5 seats and table is free
        $tablesModel = new Tables();
        $checkSeats = $tablesModel->check($guests);

        return $checkSeats;
    }

    public function chooseTable()
    {

        $this->takeTable($_POST['tableOption']);
        $table = $_POST['tableOption'];

        return (new View('sitting/seated', ['tables' => $table]))->make();
    }

    public function takeTable(string $table)
    {
        $tablesModel = new Tables();
        $takeTable = $tablesModel->takeTable($table);

        return $takeTable;
    }

    

}