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

use Illuminate\Http\Request;

Route::get('/', [
    'uses' => 'NiceActionController@getHome',
    'as' => 'home',
]);

Route::group(['prefix'=> 'do'], function() {
    Route::get('/{action}/{name?}', [
        'uses' => 'NiceActionController@getNiceAction',
        'as' => 'niceaction',
    ]);

    Route::post('/', [
        'uses' => 'NiceActionController@postNiceAction',
        'as' => 'benice',
    ]);
});