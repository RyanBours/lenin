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

Route::get('/reset', function() {
    Auth::logout();
    return view('reset');
});

Route::get('/success', function() {
    Auth::logout();
    session()->flush();
    return view('success');
});

Route::get('/dashboard', function() {
    return view('dashboard.dashboard');
})->middleware('verified');

route::get('/dashboard/item', 'ItemController@index')->middleware('permission:1');
route::post('/dashboard/item/add', 'ItemController@post');
route::get('/dashboard/item/edit/{id}', 'ItemController@edit');
route::post('/dashboard/item/edit/{id}', 'ItemController@update');

Route::get('/dashboard/leen', 'LeenController@index');
Route::post('/dashboard/leen/add', 'LeenController@add');
Route::post('/dashboard/leen/clear', 'LeenController@clear');
Route::post('/dashboard/leen/checkout', 'LeenController@checkout');
Route::get('/dashboard/leen/remove/{item}', 'LeenController@remove');

Route::get('/dashboard/beheer', 'BeheerController@index')->middleware('permission:1');

Route::get('/dashboard/my', 'MyController@index');

Route::get('/return', 'ReturnController@index');
Route::post('/return/add', 'ReturnController@add');
Route::post('/return/clear', 'ReturnController@clear');
Route::post('/return/checkout', 'ReturnController@checkout');
Route::get('/return/remove/{item}', 'ReturnController@remove');

Route::redirect('/dashboard/{etc}', '/dashboard');

Auth::routes(['verify' => true]);
Route::get('/register', function() {
    return redirect('/login');
}); // ->with(modal open)