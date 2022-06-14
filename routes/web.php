<?php

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

Route::get('/category/create', 'App\Http\Controllers\CategoryController@create');
Route::post('/category', 'App\Http\Controllers\CategoryController@store');

Route::get('/category', 'App\Http\Controllers\CategoryController@index');

Route::post('/category/{id}', 'App\Http\Controllers\CategoryController@delete');

Route::get('/category/{id}', 'App\Http\Controllers\CategoryController@edit');

Route::put('/category/{id}', 'App\Http\Controllers\CategoryController@update');

Route::get('/category/{id}/blog', 'App\HTTP\Controllers\CategoryController@show');

// routes for blog  routes

Route::get('/blog', 'App\Http\Controllers\BlogController@index');
Route::get('/blog/create', 'App\Http\Controllers\BlogController@create');
Route::post('/blog', 'App\Http\Controllers\BlogController@store');
Route::post('/blog/{id}', 'App\Http\Controllers\BlogController@delete');
