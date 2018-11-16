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

// Landing page routing
Route::get('/', function () {
    /**
     * GET
     * Landing page routing + redirect to dashboard when authenticated
     * @return view
     */
    if (Auth::check()) return redirect('/dashboard');
    return view('index');
});

// Verified page routing
Route::get('/verified', function() {
    /**
     * GET
     * Return verified page after mail verification
     * @return view
     */
    Auth::logout();
    return view('verified');
});

// Reset page routing
Route::get('/reset', function() {
    /**
     * GET
     * Return reset page after password reset
     * @return view
     */
    Auth::logout();
    return view('reset');
});

// Success page routing
Route::get('/success', function() {
    /**
     * GET
     * Returns view
     * Return success page and log the user out when it's a normal user
     * and flushes the session
     * @return view
     */
    if (Auth::User() && Auth::User()->permission_level <= 0) {
        Auth::logout();
        session()->flush();
    } 
    return view('success');
});

// Dashboard routing
Route::get('/dashboard', function() {
    /**
     * GET
     * Returns Dashboard view
     * @return view
     */
    return view('dashboard.dashboard');
})->middleware('verified');

// Item Routing
route::get('/dashboard/item', 'ItemController@index')->middleware('permission:1');
route::get('/dashboard/item/add', 'ItemController@add');
route::post('/dashboard/item/add', 'ItemController@post');
route::get('/dashboard/item/edit/{id}', 'ItemController@edit');
route::post('/dashboard/item/edit/{id}', 'ItemController@update');

// Leen Routing
Route::get('/dashboard/leen', 'LeenController@index');
Route::post('/dashboard/leen/add', 'LeenController@add');
Route::post('/dashboard/leen/clear', 'LeenController@clear');
Route::post('/dashboard/leen/checkout', 'LeenController@checkout');
Route::get('/dashboard/leen/remove/{item}', 'LeenController@remove');

// Beheer Routing
Route::get('/dashboard/beheer', 'BeheerController@index')->middleware('permission:1');
Route::get('/dashboard/beheer/remove/{item}', 'BeheerController@remove');

// My Routing
Route::get('/dashboard/my', 'MyController@index');

// Return Routing
Route::get('/return', 'ReturnController@index');
Route::post('/return/add', 'ReturnController@add');
Route::post('/return/clear', 'ReturnController@clear');
Route::post('/return/checkout', 'ReturnController@checkout');
Route::get('/return/remove/{item}', 'ReturnController@remove');

// Redirects links with '/dashboard/*' not defined above back to dashboard
Route::redirect('/dashboard/{etc}', '/dashboard');

// Auth Routes
Auth::routes(['verify' => true]);
Route::get('/register', function() {
    /**
     * GET
     * Redirect /register route back to login
     * prevents users getting the register page
     * this is to make the login into a single page authentication
     * @return redirect
     */
    return redirect('/login');
}); // ->with(modal open)