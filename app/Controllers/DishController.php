<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\View;
use App\Models\Produce;

class DishController
{
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
        $produceModel = new Produce();
        $dishes = $produceModel->query();

        return $dishes;
    }

    public function queryDish(string $dish_id)
    {
        $produceModel = new Produce();
        $choice = $produceModel->chooseDish(1, $dish_id);

        return $choice;
    }

    public function checkIngredients()
    {
        $produceModel = new Produce();
        $ingredients = $produceModel->checkIngredientAvailability();

        return $ingredients[0]['quantity_on_hand'];
    }
}