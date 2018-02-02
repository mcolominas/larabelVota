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

Route::get('/', 'HomeController@getHome');

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/logout', function () {
    return view('auth.logout');
});
Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/query', 'EncuestaController@getIndex');

Route::get('/myQueries', 'EncuestaController@getMyQueries');

Route::get('/query/vote/{id}', 'EncuestaController@getVote')->where('id', '[0-9]+');

Route::get('/query/create', 'EncuestaController@getCreate');

Route::get('/query/edit/{id}', 'EncuestaController@getEdit')->where('id', '[0-9]+');

Route::put('/query/create', 'EncuestaController@createEncuesta');


Auth::routes();
Route::get('/home', 'HomeController@getHome');
