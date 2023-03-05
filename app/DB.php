<?php

declare(strict_types = 1);

namespace App;

use PDO;

class DB
{
    protected PDO $pdo;

    public function __construct() {
        $defaultOptions = [
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
        $this->pdo = new PDO(
            'mysql' . ':host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_DATABASE'], 
            $_ENV['DB_USER'], 
            $_ENV['DB_PASS'],
            $defaultOptions
        );
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
          }
    }

}