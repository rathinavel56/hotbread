<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Recipe;

class RecipeController extends BaseController
{
   public function findall(Request $request)
    {
		$recipe = Recipe::where('is_active', true)->get();
        return response()->json(['status' => 'success', 'data' => $recipe]);
    }
	public function findyId(Request $request, $id)
    {
        return response()->json(['status' => 'success', 'data' => Recipe::find($id)]);
    }
	public function create(Request $request)
    {
	    $recipe = Recipe::create([
			'name' => $request->name
		]);
		$savedData = $recipe->save();
		return response()->json(['status' => 'success', 'data' => $recipe ]);
    }
	public function update(Request $request, $id)
    {
        Recipe::find($id)->fill($request->all())->save();
		return response()->json(['status' => 'success', 'data' => null ]);
    }
}
