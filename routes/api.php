<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\GuestStateController;
use App\Http\Controllers\TableGuestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//GUEST
Route::get('/guest', [GuestController::class, 'index']);
Route::post('/guest', [GuestController::class, 'store']);
Route::post('/guest/{id}', [GuestController::class, 'update']);

//GUEST STATE
Route::get('/guest-state', [GuestStateController::class, 'index']);

//TABLE GUEST
Route::get('/table-guest', [TableGuestController::class, 'index']);
Route::post('/table-guest', [TableGuestController::class, 'store']);
Route::put('/table-guest/{id}', [TableGuestController::class, 'update']);

//USER
Route::post('/validate-user', [UserController::class, 'validateUser']);
