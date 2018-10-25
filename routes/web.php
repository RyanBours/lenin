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
    return view('index');
});

Route::get('/return', function() {
    abort(404, 'Unauthorized action.');
    return view('return');
});

Route::get('verify', function() {
    return view('verify');
});

Route::get('/dashboard', 'DashboardController@dashboard')->middleware('verified');
Route::get('/item/add', 'DashboardController@add');
Route::get('/item/leen', 'DashboardController@leen');
Route::get('/item/beheer', 'DashboardController@beheer');
Route::get('/item/my', 'DashboardController@my');

Route::redirect('/item', '/dashboard');
Auth::routes(['verify' => true]);