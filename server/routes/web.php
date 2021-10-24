<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('recipe', 'RecipeController@findall');
$router->get('recipe/{id}', 'RecipeController@findyId');
$router->post('recipe', 'RecipeController@create');
$router->put('recipe/{id}', 'RecipeController@update');
$router->get('recipe_ingredient', 'RecipeIngredientController@findall');
$router->get('recipe_ingredient/{id}', 'RecipeIngredientController@findyId');
$router->post('recipe_ingredient', 'RecipeIngredientController@create');
$router->put('recipe_ingredient/{id}', 'RecipeIngredientController@update');
$router->get('recipe_categories', 'RecipeCategoryController@findall');
$router->get('recipe_categories/{id}', 'RecipeCategoryController@findyId');
$router->post('recipe_categories', 'RecipeCategoryController@create');
$router->put('recipe_categories/{id}', 'RecipeCategoryController@update');