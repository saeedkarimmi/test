<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'food_ingredients');
    }

    public function existingIngredients(): bool
    {
        return !$this->ingredients()
            ->where(function ($q){
                $q->where('stock', 0)
                    ->orWhere('expires_at', '<', now());
            })
            ->exists();
    }
}
