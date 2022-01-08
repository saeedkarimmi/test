<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Ingredient::query()->insert([
            [
                "title" => "Ham",
                "best_before" => "2020-07-25",
                "expires_at" => "2020-07-27",
                "stock" => 3
            ], [
                "title" => "Cheese",
                "best_before" => "2020-07-08",
                "expires_at" => "2020-07-13",
                "stock" => 3
            ], [
                "title" => "Bread",
                "best_before" => "2020-07-25",
                "expires_at" => "2020-07-27",
                "stock" => 3
            ], [
                "title" => "Butter",
                "best_before" => "2020-07-25",
                "expires_at" => "2020-07-27",
                "stock" => 3
            ], [
                "title" => "Bacon",
                "best_before" => "2020-07-25",
                "expires_at" => "2020-07-27",
                "stock" => 3
            ], [
                "title" => "Eggs",
                "best_before" => "2020-07-25",
                "expires_at" => "2020-07-27",
                "stock" => 3
            ], [
                "title" => "Mushrooms",
                "best_before" => "2020-07-25",
                "expires_at" => "2020-07-27",
                "stock" => 3
            ], [
                "title" => "Sausage",
                "best_before" => "2020-07-25",
                "expires_at" => "2020-07-27",
                "stock" => 3
            ], [
                "title" => "Hotdog Bun",
                "best_before" => "2020-07-25",
                "expires_at" => "2020-07-27",
                "stock" => 3
            ], [
                "title" => "Ketchup",
                "best_before" => "2020-07-25",
                "expires_at" => "2020-07-27",
                "stock" => 3
            ], [
                "title" => "Mustard",
                "best_before" => "2020-07-25",
                "expires_at" => "2020-07-27",
                "stock" => 3
            ], [
                "title" => "Lettuce",
                "best_before" => "2020-07-25",
                "expires_at" => "2020-07-27",
                "stock" => 3
            ], [
                "title" => "Tomato",
                "best_before" => "2020-07-25",
                "expires_at" => "2020-07-27",
                "stock" => 3
            ], [
                "title" => "Cucumber",
                "best_before" => "2020-07-25",
                "expires_at" => "2020-07-27",
                "stock" => 3
            ], [
                "title" => "Beetroot",
                "best_before" => "2020-07-25",
                "expires_at" => "2020-07-27",
                "stock" => 3
            ], [
                "title" => "Salad Dressing",
                "best_before" => "2020-07-06",
                "expires_at" => "2020-07-07",
                "stock" => 3
            ]
        ]);
    }
}
