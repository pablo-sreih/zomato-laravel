<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RestoController;
use App\Http\Controllers\ReviewController;

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

Route::get('/users', [UserController::class, 'getAllUsers']);
Route::get('/restos', [RestoController::class, 'getAllRestos']);
Route::get('/reviews', [ReviewController::class, 'getAllReviews']);
Route::get('/get-user', [UserController::class, 'getUserById']);
Route::post('/login', [UserController::class, 'userLogin']);
Route::get('/find_resto', [RestoController::class, 'findResto']);
Route::post('/add-user', [UserController::class, 'addUser']);
Route::post('/modify-user', [UserController::class, 'modifyUser']);
Route::post('/add-resto', [RestoController::class, 'addResto']);