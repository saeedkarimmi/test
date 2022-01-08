<?php

namespace App\Rules;

use App\Models\Food;
use Illuminate\Contracts\Validation\Rule;

class CheckFoodHasIngredient implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        /** @var Food $food */
        $food = Food::query()->find($value);
        return $food->existingIngredients();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The food selected is all';
    }
}
