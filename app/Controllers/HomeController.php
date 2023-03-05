<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\View;
use App\Models\Produce;

class HomeController
{
    public function index()
    {
        return (new View('index'))->make();
    }

}