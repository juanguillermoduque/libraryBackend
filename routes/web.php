<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

//Se crean las rutas para los metodos de la clase BookController
Route::get('/api/books', [BookController::class, 'list']); //  ->listar todos los libros
Route::post('/api/books', [BookController::class, 'create']); //  ->crear un libro
Route::get('/api/books/{id}', [BookController::class, 'getOne']); // ->obtener un libro por su id
Route::put('/api/books/{id}', [BookController::class, 'update']);  //  ->actualizar un libro por su id
Route::delete('/api/books/{id}', [BookController::class, 'delete']);  //  ->eliminar un libro por su id