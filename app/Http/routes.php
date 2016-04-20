<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');

    // Route::get('/beers', 'BeerController@index');
    // Route::post('/beer', 'BeerController@store');
    // Route::delete('/beer/{beer}', 'BeerController@destroy');

    Route::get('/lists', 'BeerslistController@index');
    Route::post('/list', 'BeerslistController@store');
    Route::delete('/list/{beerslist}', 'BeerslistController@destroy');

    Route::get('search/autocomplete', 'SearchController@autocomplete');

    Route::auth();

});
