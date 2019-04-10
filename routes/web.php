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

Route::get('/', function () {
    return view('welcome');
});



Route::get(
        '/',
        'DrawingStrawController@getStraw'
        )->name('straw');

Route::get(
        '/options',
        'DrawingStrawController@getOptions'
        )->name('options');

Route::post(
        '/options',
        'DrawingStrawController@setOptions'
        )->name('setting');

Route::post(
        '/',
        'DrawingStrawController@drawing'
        )->name('drawing');


