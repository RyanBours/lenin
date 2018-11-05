<?php

use Illuminate\Support\Facades\Auth;

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
    if (Auth::check()) return redirect('/dashboard');
    return view('index');
});

Route::get('/verified', function() {
    Auth::logout();
    return view('verified');
});

Route::get('/reseted', function() {
    Auth::logout();
    return view('reseted');
});

Route::get('/success', function() {
    Auth::logout();
    return view('success');
});

Route::get('/dashboard', function() {
    return view('dashboard.dashboard');
})->middleware('verified');

route::get('/item/add', 'AddController@index');
route::post('/item/add/post', 'AddController@post');

Route::get('/item/leen', 'LeenController@index');
Route::post('/item/leen/add', 'LeenController@add');
Route::post('/item/leen/clear', 'LeenController@clear');
Route::post('/item/leen/checkout', 'LeenController@checkout');
Route::get('/item/leen/remove/{item}', 'LeenController@remove');

Route::get('/item/beheer', 'BeheerController@index');

Route::get('/item/my', 'MyController@index');

Route::get('/return', 'ReturnController@index');
Route::post('/return/add', 'ReturnController@add');
Route::post('/return/clear', 'ReturnController@clear');
Route::post('/return/checkout', 'ReturnController@checkout');
Route::get('/return/remove/{item}', 'ReturnController@remove');

Route::redirect('/item', '/dashboard');
Auth::routes(['verify' => true]);