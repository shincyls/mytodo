<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/auth/google', 'Auth\LoginController@redirectToGoogle')->name('login.google-redirect');;
Route::get('/auth/google/callback', 'Auth\LoginController@handleGoogleCallback')->name('login.google-callback');

Route::get('/todo', 'TodoItemController@all')->name('todo.all');
Route::get('/todo/create', 'TodoItemController@create')->name('todo.create');
Route::post('/todo', 'TodoItemController@store')->name('todo.store');
Route::get('/todo/{id}/edit', 'TodoItemController@edit')->name('todo.edit');
Route::put('/todo/{id}', 'TodoItemController@update')->name('todo.update');
Route::delete('/todo/{id}', 'TodoItemController@delete')->name('todo.delete');
