<?php

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

Route::middleware(['menu'])->group(function () {

    Route::prefix('places')->group(function () {

        Route::name('exec.')->group(function () {

            Route::post('/photos/add', 'PlaceController@doAddPhoto')->name('add_photo');

            Route::post('/create', 'PlaceController@doAddPlace')->name('add_place');

        });

        Route::name('request.')->group(function () {

            Route::get('/{id}/photos/add', 'PlaceController@addPhoto')->name('add_photo');

            Route::get('/create', 'PlaceController@addPlace')->name('add_place');

        });

        Route::name('show.')->group(function () {
            Route::get('/{id}/', 'PlaceController@showPlace')->name('place');

            Route::get('/', 'PlaceController@placeList')->name('place_list');
        });

    });

    Route::get('/photos/add', 'PlaceController@addAnyPhoto')->name('request.add_any_photo');

});

Route::redirect('/', 'places');
