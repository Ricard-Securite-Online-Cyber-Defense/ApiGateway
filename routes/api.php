<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrisbeeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\RangeController;
use App\Http\Controllers\StepController;
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
        Route::put('/{id}', [FrisbeeController::class, 'update']);
    });

     // ROUTES INGREDIENT
     Route::group(['prefix' => 'ingredient'], function() {
        Route::get('/', [IngredientController::class, 'index']);
        Route::delete('/{id}', [IngredientController::class, 'delete']);
        Route::post('/', [IngredientController::class, 'create']);
        Route::put('/{id}', [IngredientController::class, 'update']);
     });

     Route::group(['prefix' => 'process'], function() {
        Route::get('/', [ProcessController::class, 'index']);
        Route::delete('/{id}', [ProcessController::class, 'delete']);
        Route::post('/', [ProcessController::class, 'create']);
        Route::put('/{id}', [ProcessController::class, 'update']);
    });

     Route::group(['prefix' => 'step'], function() {
        Route::get('/', [StepController::class, 'index']);
        Route::delete('/{id}', [StepController::class, 'delete']);
        Route::post('/', [StepController::class, 'create']);
        Route::put('/{id}', [StepController::class, 'update']);
    });

     Route::group(['prefix' => 'range'], function() {
        Route::get('/', [RangeController::class, 'index']);
        Route::delete('/{id}', [RangeController::class, 'delete']);
        Route::post('/', [RangeController::class, 'create']);
        Route::put('/{id}', [RangeController::class, 'update']);
    });

});
