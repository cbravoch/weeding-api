<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\GuestStateController;
use Illuminate\Support\Facades\Route;

Route::get('/guest', [GuestController::class, 'index']);
Route::get('/guest-state', [GuestStateController::class, 'index']);
