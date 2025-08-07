<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/form',[UserController::class,"index"]);
Route::get('formdata',[UserController::class,"userdata"]);

/* Post Routes using for forms */
Route::post('/formpost',[UserController::class,"store"]);