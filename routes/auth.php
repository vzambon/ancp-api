<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')
    ->controller(AuthController::class)
    ->group(function () {
        Route::get('whoami', fn () => response()->json(Auth::user()))->middleware('auth:sanctum');
        Route::post('signin', 'signIn');
        Route::post('logout-session', 'logoutSession')->middleware('auth:sanctum');
    });
