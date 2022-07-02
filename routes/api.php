<?php

use App\Http\Controllers\API\ClassroomController;
use App\Http\Controllers\API\UserController;
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

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
  Route::get('user', [UserController::class, 'user']);
  Route::get('users', [UserController::class, 'users']);
  Route::prefix('list')->group(function(){
    Route::get('kelas', [ClassroomController::class, 'index']);
  });
  Route::prefix('create')->group(function(){
    Route::post('kelas', [ClassroomController::class, 'store']);
  });
});