<?php

declare(strict_types = 1);

namespace App\Models;

use App\DB;

class Tables extends DB
{
    public function check(string $people)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tables WHERE seats >= {$people} ORDER BY table_number ASC");
        $stmt->execute();
        
        return $stmt->fetchAll();
    }

    public function takeTable(string $table)
    {
        $stmt = $this->pdo->prepare("UPDATE tables SET is_available = false WHERE table_number = {$table}");
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
}