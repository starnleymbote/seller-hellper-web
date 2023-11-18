<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\ShopController;
use App\Http\Controllers\Api\V1\SalesController;
use App\Http\Controllers\Api\V1\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::POST('/register', RegisterController::class);


Route::post('login', [UserController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    
    Route::prefix('shop')->group(function () {
    
        Route::POST('create', [ShopController::Class, 'store']);
        Route::GET('list', [ShopController::Class, 'index']);
    
    });

    Route::prefix('sale')->group(function () {

        Route::GET('list/{shop_uuid}', [SalesController::class, 'list']);

    });

});
