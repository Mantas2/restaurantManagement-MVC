<?php

declare(strict_types = 1);

namespace App\Models;

use App\DB;

class Tables extends DB
{
    public function getQueryResults(string $sql): array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}