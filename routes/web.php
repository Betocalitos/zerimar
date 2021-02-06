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

//pages
Route::get('/', 'PageController@index')->name('index');
Route::get('/nosotros', 'PageController@about')->name('about');
Route::get('/contacto', 'PageController@contact')->name('contact');

//equipment
Route::get('equipos/{$slug}', 'PageController@equipment')->name('equipments');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
