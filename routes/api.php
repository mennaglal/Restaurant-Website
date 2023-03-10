<?php

use App\Http\Controllers\Api\FoodsController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('/foods',[FoodsController::class,'index']);
Route::get('/food/{id}',[FoodsController::class,'show']);
Route::post('/foods',[FoodsController::class,'store']);
Route::post('/food/{id}',[FoodsController::class,'update']);
