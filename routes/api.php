<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UsuarioController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AutorController::class)->group(function(){
    Route::get('/autor', 'get');
    Route::get('/autor/{id}','details');
    Route::post('/new_autor', 'store');
    Route::patch('/autor/{id}', 'update');
    Route::delete('/delete_autor/{id}','delete');
    Route::get('/autor/livros/{id}','findLivros');
    Route::get('/autor/livros', "GetWithLivros");
});

Route::controller(GeneroController::class)->group(function(){
    Route::get('/genero', 'get');
    Route::get('/genero/{id}','details');
    Route::post('/new_genero', 'store');
    Route::patch('/genero/{id}', 'update');
    Route::delete('/delete_genero/{id}','delete');
    Route::get('/generos/livros/{id}', "listarLivros");
    Route::get('/generos/livros', "GetWithLivros");
});

Route::controller(LivroController::class)->group(function(){
    Route::get('/livro', 'get');
    Route::get('/livro/{id}','details');
    Route::post('/new_livro', 'store');
    Route::patch('/livro/{id}', 'update');
    Route::delete('/delete_livro/{id}','delete');
    Route::get('/livros/reviews/{id}', "listarReviews");
    Route::get('/livros/reviews','GetWithReviews');
});

Route::controller(ReviewController::class)->group(function(){
    Route::get('/review', 'get');
    Route::get('/review/{id}','details');
    Route::post('/new_review', 'store');
    Route::patch('/review/{id}', 'update');
    Route::delete('/delete_review/{id}','delete');
});

Route::controller(UsuarioController::class)->group(function(){
    Route::get('/usuario', 'get');
    Route::get('/usuario/{id}','details');
    Route::post('/new_usuario', 'store');
    Route::patch('/usuario/{id}', 'update');
    Route::delete('/delete_usuario/{id}','delete');
    Route::get('/usuario/reviews/{id}','listarReviews');

});