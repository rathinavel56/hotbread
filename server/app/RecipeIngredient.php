<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    protected $table = 'recipe_ingredients';
    protected $fillable = [
        'id', 'recipe_id', 'name', 'unit_id', 'category_id', 'quantity', 'is_active', 'created_at', 'update_at'
    ];
}
