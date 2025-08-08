<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/form',[UserController::class,"index"]);
Route::get('formdata',[UserController::class,"userdata"]);
Route::get('userupdate/{id}',[UserController::class,"edit"])->name("updateuser");
Route::post('updateuser/{id}',[UserController::class,"update"])->name("updusr");
/* Post Routes using for forms */
Route::post('/formpost',[UserController::class,"store"]);