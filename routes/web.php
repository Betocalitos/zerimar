<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for the application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now can create something great!
|
*/

// Public pages
Route::get('/', 'PageController@index')->name('index');
Route::get('/nosotros', 'PageController@about')->name('about');
Route::get('/contacto', 'PageController@contact')->name('contact');

// Public equipment
Route::get('/equipo/{slug}', 'EquipmentController@show')->name('equipments.show');
Route::get('/paquete/{slug}', 'EquipmentController@showBundle')->name('bundles.show');
Route::get('/equipos/{type}', 'EquipmentController@index')->name('equipments.index');

// Auth (register and password reset disabled)
Auth::routes(['register' => false, 'reset' => false]);

// Admin panel
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/', 'DashboardController')->name('dashboard');

    Route::resource('equipment-types', 'EquipmentTypeController');
    Route::resource('equipment', 'EquipmentController');
    Route::resource('bundles', 'EquipmentBundleController');

    // Image management
    Route::post('equipment/{equipment}/images', 'EquipmentController@uploadImages')->name('equipment.upload-images');
    Route::post('equipment/{equipment}/images/reorder', 'EquipmentController@reorderImages')->name('equipment.reorder-images');
    Route::delete('equipment/images/{image}', 'EquipmentController@deleteImage')->name('equipment.delete-image');

    // Feature management
    Route::post('equipment/{equipment}/features', 'EquipmentController@addFeature')->name('equipment.add-feature');
    Route::delete('equipment/features/{feature}', 'EquipmentController@deleteFeature')->name('equipment.delete-feature');

    // Help
    Route::get('help', 'HelpController')->name('help');
});