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


Route::get('/store', 'MyController@myFunc')->middleware('auth');
Route::get('/addStore','MyController@myInsert')->middleware('auth');
Route::get('/updateStore','MyController@myUpdate')->middleware('auth');
Route::get('/deleteStore','MyController@myDelete')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
