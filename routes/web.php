<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('pusher', function () {
    return view('pusher');
});

Route::get('loop', function () {
    return view('loop')
        ->with('posts', \App\Post::paginate(10));
});


Auth::routes();

Route::get('/home', 'HomeController@index');
