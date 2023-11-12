<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('todos', TodoController::class);
// Index route to list all TODO items
// Route::get('/api/todos', 'TodoController@index')->name('todos.index');
// // Create route to display a form for creating a new TODO item
// Route::get('/todos/create', 'TodoController@create')->name('todos.create');
// // Store route to create a new TODO item
// Route::post('/todos', 'TodoController@store')->name('todos.store');
// // Show route to display a specific TODO item
// Route::get('/todos/{todo}', 'TodoController@show')->name('todos.show');
// // Edit route to display a form for editing a specific TODO item
// Route::get('/todos/{todo}/edit', 'TodoController@edit')->name('todos.edit');
// // Update route to update a specific TODO item
// Route::put('/todos/{todo}', 'TodoController@update')->name('todos.update');
// Route::patch('/todos/{todo}', 'TodoController@update'); // Optional for PATCH requests
// // Destroy route to delete a specific TODO item
// Route::delete('/todos/{todo}', 'TodoController@destroy')->name('todos.destroy');
