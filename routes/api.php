<?php

use App\Http\Controllers\API\ClassroomController;
use App\Http\Controllers\API\DaysController;
use App\Http\Controllers\API\MapelController;
use App\Http\Controllers\API\ScheduleController;
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
Route::prefix('schedule')->group(function(){
  Route::get('/', [ScheduleController::class, 'index']);
});
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
  Route::get('user', [UserController::class, 'user']);
  Route::get('users', [UserController::class, 'users']);
  Route::prefix('list')->group(function(){
    Route::get('kelas', [ClassroomController::class, 'index']);
    Route::get('classes', [ClassroomController::class, 'classrooms']);
    Route::get('mapel', [MapelController::class, 'index']);
    Route::get('mapels', [MapelController::class, 'mapels']);
    Route::get('days', [DaysController::class, 'days']);
  });
  Route::prefix('create')->group(function(){
    Route::post('kelas', [ClassroomController::class, 'store']);
    Route::post('mapel', [MapelController::class, 'create']);
  });
Route::post('tambahjadwal', [ScheduleController::class, 'create']);
});