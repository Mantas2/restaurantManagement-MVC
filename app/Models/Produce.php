<?php

declare(strict_types = 1);

namespace App\Models;

use App\DB;

class Produce extends DB
{
    public function query()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM ingredients WHERE egg = 89');
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
}