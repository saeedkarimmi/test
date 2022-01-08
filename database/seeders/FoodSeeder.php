<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = [
            [
                'title' => "Ham and Cheese Toastie",
                'ingredients' => [
                    1,
                    2,
                    3,
                    4
                ]
            ],
            [
                'title' => "Fry-up",
                'ingredients' => [
                    5,
                    6,
                    7,
                    8,
                    3
                ]
            ],
            [
                'title' => "Salad",
                'ingredients' => [
                    12,
                    13,
                    14,
                    15,
                    16
                ]
            ],
            [
                'title' => "Hotdog",
                'ingredients' => [
                    9,
                    8,
                    10,
                    11
                ]
            ],
        ];

        foreach ($foods as $item) {
            /** @var Food $food */
            $food = Food::query()->create([
                'title' => $item['title']
            ]);

            foreach ($item['ingredients'] as $ingredient)
                $food->foodIngredients()->create([
                    'ingredient_id' => $ingredient
                ]);
        }
    }
}
