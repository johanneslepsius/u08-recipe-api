<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipelistController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SavedController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('recipelists', RecipelistController::class);
    Route::get('/logout', [UserController::class, 'logout']);
    Route::post('/save', [SavedController::class, 'store']);
    Route::delete('/save', [SavedController::class, 'destroy']);
});
