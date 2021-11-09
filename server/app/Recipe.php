<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipe_recipes';
    protected $fillable = [
        'id', 'name', 'yield', 'unit_id', 'is_ingredient', 'is_active', 'created_at', 'update_at'
    ];
}
