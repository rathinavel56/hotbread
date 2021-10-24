<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\RecipeIngredient;

class RecipeIngredientController extends BaseController
{
    public function findall(Request $request)
    {
		$recipeIngredient = RecipeIngredient::where('is_active', true)->get();
        return response()->json(['status' => 'success', 'data' => $recipeIngredient]);
    }
	public function findyId(Request $request, $id)
    {
        return response()->json(['status' => 'success', 'data' => RecipeIngredient::find($id)]);
    }
	public function create(Request $request)
    {
	    $recipeIngredient = RecipeIngredient::create([
			'name' => $request->name
		]);
		$savedData = $recipeIngredient->save();
		return response()->json(['status' => 'success', 'data' => $recipeIngredient ]);
    }
	public function update(Request $request, $id)
    {
        RecipeIngredient::find($id)->fill($request->all())->save();
		return response()->json(['status' => 'success', 'data' => null ]);
    }
}
