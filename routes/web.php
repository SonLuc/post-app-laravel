<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [PostsController::class, 'index'])->name('home');

Route::get('/create-post', function () {
    return view('posts.create');
});

Route::post('/create-post', [PostsController::class, 'store'])->name('create-post');

// Ruta para mostrar el formulario de edición con los datos del post
Route::get('/edit-post/{id}', [PostsController::class, 'edit'])->name('edit-post');

// Ruta tipo patch, para actualizar un post existente en la base de datos
Route::patch('/update-post/{id}', [PostsController::class, 'update'])->name('update-post');

// Ruta tipo delete, para eliminar un post existente de la base de datos
Route::delete('/destroy-post/{id}', [PostsController::class, 'destroy'])->name('destroy-post');

Route::get('/post/{id}', [PostsController::class, 'show'])->name('post');



