<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FoodIngredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_id',
        'ingredient_id',
    ];

    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class, 'food_id');
    }

    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class, 'ingredient_id');
    }

}
