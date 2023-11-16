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

Route::get('/login/google', 'App\Http\Controllers\Auth\LoginController@apiRedirectToGoogle');
Route::get('/login/google/callback', 'App\Http\Controllers\Auth\LoginController@apiHandleGoogleCallback');

Route::middleware(['middleware' => 'auth.json'])->group(function () {
    // Route::resource('todos', TodoController::class);
    Route::get('/todos', 'App\Http\Controllers\TodoController@index')->name('todos.index');
    Route::get('/todos/{todo}', 'App\Http\Controllers\TodoController@show')->name('todos.show');
    Route::get('/todos/create', 'App\Http\Controllers\TodoController@create')->name('todos.create');
    Route::post('/todos/create', 'App\Http\Controllers\TodoController@create')->name('todos.create');
    Route::put('/todos/{todo}/done', 'App\Http\Controllers\TodoController@done')->name('todos.done');
    Route::delete('/todos/{todo}', 'App\Http\Controllers\TodoController@delete')->name('todos.delete');
    // Route::post('/todos', 'TodoController@store')->name('todos.store');
    // Route::put('/todos/{todo}', 'TodoController@update')->name('todos.update');
    // Route::patch('/todos/{todo}', 'TodoController@update'); // Optional for PATCH requests
    
});
