<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
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

// Validamos que el usuario esté autenticado para poder acceder a las rutas de creación, edición y eliminación de posts
Route::middleware(['auth.login'])->group(function () {

	// Ruta para mostrar el formulario de creación de posts
	Route::get('/dashboard/create-post', function () {
		return view('posts.create');
	});
	
	// Ruta para mostrar el formulario de edición con los datos del post
	Route::get('dashboard/edit-post/{id}', [PostsController::class, 'edit'])->name('edit-post');

	// Ruta tipo post, para crear un nuevo post en la base de datos
	Route::post('/dashboard/create-post', [PostsController::class, 'store'])->name('create-post');

	// Ruta tipo patch, para actualizar un post existente en la base de datos
	Route::patch('/dashboard/update-post/{id}', [PostsController::class, 'update'])->name('update-post');
	
	// Ruta tipo delete, para eliminar un post existente de la base de datos
	Route::delete('/dashboard/destroy-post/{id}', [PostsController::class, 'destroy'])->name('destroy-post');

	// Ruta para ver los posts pero en una tabla con la opción de editar y eliminar
	Route::get('/dashboard/table', [PostsController::class, 'table'])->name('table-posts');
});


Route::get('/post/{id}', [PostsController::class, 'show'])->name('post');

// Rutas para temas de logeo
Route::get('/login', function () {
	return view('login');
})->middleware('guest')->name('login');

Route::post('/auth', [UserController::class, 'auth'])->name('auth');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
