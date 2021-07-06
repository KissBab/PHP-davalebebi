<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
Route::get('/posts', [\App\Http\Controllers\Api\PostController::class, 'index']);
Route::middleware('auth:api')->prefix('posts/{id}/comment')->group(function (){
    Route::post('/', [\App\Http\Controllers\Api\PostController::class, 'comment']);
});
Route::post('/posts/create', [\App\Http\Controllers\Api\PostController::class, 'store']);
Route::put('/posts/{id}/update', [\App\Http\Controllers\Api\PostController::class, 'update']);
Route::delete('/posts/{id}/delete', [\App\Http\Controllers\Api\PostController::class, 'delete']);
