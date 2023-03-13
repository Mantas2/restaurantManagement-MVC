<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\View;
use App\Models\Produce;

class DishController
{
    public function __construct(
        protected Produce $produceModel
    ) {}

    public function chooseDish()
    {
        $dishes = $this->listDishes();

        if ($this->checkIngredients() <= 0) {
            echo("No more ingredients left");
            die;
        }
        
        $choice = null;
        if (isset($_POST['dish'])) {
            $choice = (int) $this->queryDish($_POST['dish']);
            echo("Dish chosen");
        }
        
        return (new View('eating/dish', ['dishes' => $dishes]))->make();
    }

    public function listDishes()
    {
        $dishes = $this->produceModel->getQueryResults("
        SELECT * FROM dishes
        ");

        return $dishes;
    }

    public function queryDish(string $dish_id)
    {
        $choice = $this->produceModel->getQueryResults("
        UPDATE Ingredients i
        JOIN (
            SELECT di.ingredient_id, i.quantity_on_hand - (di.quantity * 1) AS new_quantity
            FROM Dish_Ingredient di
            JOIN Ingredients i ON di.ingredient_id = i.ingredient_id
            WHERE di.dish_id = {$dish_id}
        ) sub ON i.ingredient_id = sub.ingredient_id
        SET i.quantity_on_hand = sub.new_quantity
        ");

        return $choice;
    }

    public function checkIngredients()
    {
        $ingredients = $this->produceModel->getQueryResults("
        SELECT quantity_on_hand FROM Ingredients WHERE ingredient_id = 2
        ");

        return $ingredients[0]['quantity_on_hand'];
    }
}