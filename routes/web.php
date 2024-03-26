<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

# Book routes
// Route::group(['prefix' => 'books'], function () {
//     Route::get('/', ['as' => 'index', 'uses' => 'BooksController@index']);
//     Route::post('store', ['as' => 'store', 'uses' => 'BooksController@store']);
//     Route::get('show/{id}', ['as' => 'show', 'uses' => 'BooksController@show']);
//     Route::post('update/{id}', ['as' => 'update', 'uses' => 'BooksController@update']);
//     Route::delete('destroy/{id}', ['as' => 'destroy', 'uses' => 'BooksController@destroy']);
// });
Route::resource('/books', \App\Http\Controllers\BookController::class);

Route::resource('/authors', \App\Http\Controllers\AuthorController::class);

Route::resource('/publishers', \App\Http\Controllers\PublisherController::class);
