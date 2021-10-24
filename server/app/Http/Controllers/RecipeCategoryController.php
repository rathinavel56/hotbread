<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\RecipeCategory;

class RecipeCategoryController extends BaseController
{
    public function findall(Request $request)
    {
		$recipeCategory = RecipeCategory::where('is_active', true)->get();
        return response()->json(['status' => 'success', 'data' => $recipeCategory]);
    }
	public function findyId(Request $request, $id)
    {
        return response()->json(['status' => 'success', 'data' => RecipeCategory::find($id)]);
    }
	public function create(Request $request)
    {
	    $recipeCategory = RecipeCategory::create([
			'name' => $request->name
		]);
		$savedData = $recipeCategory->save();
		return response()->json(['status' => 'success', 'data' => $recipeCategory ]);
    }
	public function update(Request $request, $id)
    {
        RecipeCategory::find($id)->fill($request->all())->save();
		return response()->json(['status' => 'success', 'data' => null ]);
    }
}
