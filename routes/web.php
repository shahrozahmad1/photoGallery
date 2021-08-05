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

Route::group(['middleware' => 'auth'], function(){
    Route::prefix('/user/')->group(function(){
        
        Route::get('galleries/create', 'App\Http\Controllers\GalleryController@galleryCreate')->name('galleryCreate');
        Route::post('galleries/store', 'App\Http\Controllers\GalleryController@galleryStore')->name('galleryStore');
        Route::get('galleries/show/{id}', 'App\Http\Controllers\GalleryController@galleryShow')->name('galleryShow');
        Route::get('galleries/edit/{id}', 'App\Http\Controllers\GalleryController@galleryEdit')->name('galleryEdit');
        Route::post('galleries/update/{id}', 'App\Http\Controllers\GalleryController@galleryUpdate')->name('galleryUpdate');
        Route::get('galleries/delete/{id}', 'App\Http\Controllers\GalleryController@galleryDelete')->name('galleryDelete');

        ///  photo routes
        Route::get('galleries/photos/create/{id}', 'App\Http\Controllers\GalleryController@photoCreate')->name('photoCreate');
        Route::post('galleries/photos/store', 'App\Http\Controllers\GalleryController@photoStore')->name('photoStore');
        Route::get('galleries/photos/show/{id}', 'App\Http\Controllers\GalleryController@photoShow')->name('photoShow');

    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');