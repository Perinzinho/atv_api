<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AutorController::class)->group(function(){
    Route::get('/autor', 'get');
    Route::post('/new_autor', 'store');
});