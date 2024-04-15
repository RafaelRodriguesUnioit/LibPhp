<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teclib\UserController;

Route::group(["prefix" => "v1"], function () {

    Route::group(["prefix" => "usuarios"], function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{usuario}', [UserController::class, 'show']);
        Route::post('/', [UserController::class, 'store']);
        Route::put('/{usuario}', [UserController::class, 'update']);
        Route::delete('/{usuario}', [UserController::class, 'destroy']);
    });
    
});