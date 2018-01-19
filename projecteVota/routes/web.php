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
    return view('home');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/logout', function () {
    return view('auth.logout');
});
Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/query', function () {
    return view('query.index');
});

Route::get('/myQueries', function () {
    return view('query.myQueries');
});

Route::get('/query/vote/{id}', function ($id) {
    return view('query.vote')->with('id', $id);
})->where('id', '[0-9]+');

Route::get('/query/create', function () {
    return view('query.create');
});

Route::get('/query/edit/{id}', function ($id) {
    return view('query.edit')->with('id', $id);
})->where('id', '[0-9]+');