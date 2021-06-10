<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::middleware('auth')->group(function(){

	Route::get('/todos', [TodoController::class, 'index'])->name('todo.home');
	Route::patch('/todos/{todo}/completed', [TodoController::class, 'completed'])->name('todo.completed');
	Route::patch('/todos/{todo}/notcompleted', [TodoController::class, 'revert'])->name('todo.notcompleted');
	Route::put('/todos/{todo}/delete', [TodoController::class, 'delete'])->name('todo.delete');
	Route::get('/todos/{todo}/showlist', [TodoController::class, 'showlist'])->name('todo.showlist');

	Route::get('/todos/create', [TodoController::class, 'create']);
	Route::post('/todos/create', [TodoController::class, 'store']);

	Route::get('/todos/{todo}/edit', [TodoController::class, 'edit']);
	Route::patch('/todos/{todo}/update', [TodoController::class, 'update'])->name('todo.update');	


//});


Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/', function () {
    return view('user');
});*/

Route::get('/user', [UserController::class, 'index']);

Route::post('/upload_image', [UserController::class, 'uploadAvatar']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
