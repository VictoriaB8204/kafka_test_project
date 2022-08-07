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

Route::get('', 'App\Http\Controllers\Controller@index');
Route::post('create', 'App\Http\Controllers\Controller@create');
Route::post('update', 'App\Http\Controllers\Controller@update')->name('article.update');
Route::delete('{id}', 'App\Http\Controllers\Controller@delete')->name('article.delete');
