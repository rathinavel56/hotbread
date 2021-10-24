<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeCategory extends Model
{
    protected $table = 'recipe_categories';
    protected $fillable = [
        'id', 'name', 'is_active', 'created_at', 'update_at'
    ];
}
