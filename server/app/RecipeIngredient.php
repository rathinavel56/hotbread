<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    protected $table = 'recipe_ingredients';
    protected $fillable = [
        'id', 'name', 'unit_id', 'is_recipe', 'is_active', 'created_at', 'update_at'
    ];
}
