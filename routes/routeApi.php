<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teclib\UserController;

Route::group(["prefix" => "v1"], function () {

    Route::group(["prefix" => "users"], function () {
        Route::get('/consulta', [UserController::class, 'consulta']);
    });
    
});