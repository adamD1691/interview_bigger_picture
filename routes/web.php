<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', [UserController::class, 'index']);
Route::get('user/create', [UserController::class, 'create']);
Route::post('user/create', [UserController::class, 'save']);

Route::get('user/{user}', [UserController::class, 'edit']);
Route::post('user/{user}/update', [UserController::class, 'update']);

Route::get('user/{user}/delete', [UserController::class, 'delete']);
