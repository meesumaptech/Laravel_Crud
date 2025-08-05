<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form',[UserController::class,"index"]);
Route::post('/formpost',[UserController::class,"store"]);