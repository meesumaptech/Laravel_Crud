<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/form',[UserController::class,"index"]);
Route::get('formdata',[UserController::class,"userdata"])->name("usrdata");
Route::get('userupdate/{id}',[UserController::class,"edit"])->name("updateuser");
Route::get('deleteuser/{id}',[UserController::class,"destroy"])->name("delusr");

/* Post Routes using for forms */
Route::post('/formpost',[UserController::class,"store"]);
Route::post('updateuser/{id}',[UserController::class,"update"])->name("updusr");