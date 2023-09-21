<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\UserController;

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


    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::apiResource('/projects', ProjectController::class);
        Route::post('auth/logout',[AuthController::class,'logout']);
    });



Route::post('auth/register',[UserController::class,'store']);
Route::post('auth/login',[AuthController::class,'login']);
Route::post('social/login',[UserController::class,'socialLogin']);

