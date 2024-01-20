<?php

use App\Http\Controllers\ParkingController;
use App\Http\Controllers\SpaceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1' ], function(){

    Route::group(['prefix' => 'user' ], function(){
        Route::post('/register', [UserController::class, 'register']);
        Route::post('/login', [UserController::class, 'login']);
    });

    Route::group(['prefix' => 'admin' ], function(){
        Route::post('/login', [AuthController::class, 'login']);
        Route::apiResources(['space' => ParkingController::class]);
        Route::get('/active/space', SpaceController::class);

    });



        Route::apiResources(['admin' => AdminController::class]);



});






