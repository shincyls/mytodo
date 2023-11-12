<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/api/v1/auth/google', 'Auth\LoginController@redirectToGoogle')->name('login.google-redirect');
Route::get('/api/v1/auth/google/callback', 'Auth\LoginController@handleGoogleCallback')->name('login.google-callback');

Route::get('/api/v1/todo', 'TodoItemController@all')->name('todo.all');
Route::post('/api/v1/todo', 'TodoItemController@add')->name('todo.add');
Route::put('/api/v1/todo/{id}/complete', 'TodoItemController@complete')->name('todo.complete');
Route::delete('/api/v1/todo/{id}', 'TodoItemController@delete')->name('todo.delete');
