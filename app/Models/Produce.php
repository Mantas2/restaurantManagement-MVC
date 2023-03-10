<?php

declare(strict_types = 1);

namespace App\Models;

use App\DB;

class Produce extends DB
{
    public function query()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM dishes');
        $stmt->execute();
        
        return $stmt->fetchAll();
    }

    public function chooseDish(int $quantity, string $dish_id)
    {
        $stmt = $this->pdo->prepare("UPDATE Ingredients i
        JOIN (
            SELECT di.ingredient_id, i.quantity_on_hand - (di.quantity * {$quantity}) AS new_quantity
            FROM Dish_Ingredient di
            JOIN Ingredients i ON di.ingredient_id = i.ingredient_id
            WHERE di.dish_id = {$dish_id}
        ) sub ON i.ingredient_id = sub.ingredient_id
        SET i.quantity_on_hand = sub.new_quantity
        ");

        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function checkIngredientAvailability()
    {
        $stmt = $this->pdo->prepare("SELECT quantity_on_hand FROM Ingredients WHERE ingredient_id = 2");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}