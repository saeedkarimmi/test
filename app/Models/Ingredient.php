<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'best_before',
        'expires_at',
        'stock',
    ];

    protected $casts = [
        'best_before' => 'date',
        'expires_at' => 'date',
    ];

    public function foods(): BelongsToMany
    {
        return $this->belongsToMany(Food::class, 'food_ingredients');
    }
}
