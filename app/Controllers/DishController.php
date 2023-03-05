<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\View;
use App\Models\Produce;

class DishController
{
    public function chooseDish()
    {
        return (new View('eating/dish'))->make();
    }

}