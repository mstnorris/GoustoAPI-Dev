<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['namespace' => 'API\v1', 'prefix' => 'v1'], function () {

    Route::get('recipes', 'RecipeController@index');
    Route::get('recipes/{id}', 'RecipeController@show');
    Route::post('recipes', 'RecipeController@store');

});