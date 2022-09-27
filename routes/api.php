<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrisbeeController;
use App\Http\Controllers\IngredientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', [AuthController::class, 'login']);


// Middleware API
Route::group(['middleware' => 'jwt'], function () {

    // ROUTES FRISBEE
    Route::group(['prefix' => 'frisbee'], function() {
        Route::get('/', [FrisbeeController::class, 'index']);
        Route::delete('/{id}', [FrisbeeController::class, 'delete']);
        Route::post('/', [FrisbeeController::class, 'create']);
        Route::patch('/{id}', [FrisbeeController::class, 'update']);
    });

     // ROUTES INGREDIENT
     Route::group(['prefix' => 'ingredient'], function() {
        Route::get('/', [IngredientController::class, 'index']);
        Route::delete('/{id}', [IngredientController::class, 'delete']);
        Route::post('/', [IngredientController::class, 'create']);
        Route::patch('/{id}', [IngredientController::class, 'update']);
    });
    
});
