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

use \App\Mail\Reminder;

Route::get('/', function () {
    return view('welcome');
});

Route::get('pusher', function () {
    return view('pusher');
});

Route::get('loop', function () {
    //$posts = [
    //    ["id" => 1,
    //     "user_id" => 1,
    //     "title" => "Et veritatis.",
    //     "body" => "Sit recusandae aut omnis qui suscipit et quia fuga iusto.",
    //     "created_at" => "2016-11-16 08:04:28",
    //     "updated_at" => "2016-11-16 08:04:28",
    //    ],
    //    ["id" => 2,
    //     "user_id" => 1,
    //     "title" => "Eveniet laborum sed.",
    //     "body" => "Asperiores ut nam est fugit veritatis recusandae sint iste ratione iste fugit ut magnam non quod magnam.",
    //     "created_at" => "2016-11-16 08:04:28",
    //     "updated_at" => "2016-11-16 08:04:28",
    //    ],
    //    ["id" => 3,
    //     "user_id" => 1,
    //     "title" => "Et non qui.",
    //     "body" => "Enim dicta error tenetur nostrum sunt iste molestias id qui vel nisi est eum et et.",
    //     "created_at" => "2016-11-16 08:04:28",
    //     "updated_at" => "2016-11-16 08:04:28",
    //    ],
    //];
    //return view('loop')->with('posts', $posts);
    return view('loop')->with('posts', \App\Post::paginate(10));
});

Route::get('/user/{id}', function ($id) {
    return \App\User::find($id);
});

Route::get('/posts/{user}', function ( App\User $user ) {
    return $user->posts()->get();
});

Route::get('/posts/id/{post}', function ( App\Models\Post $post ) {
    return $post->user()->get();
});

Route::get('dbquery', function () {
    $posts = DB::table('posts')->get();
    dd($posts);
});

Route::get('email', function () {
    return Mail::to('group@sdlug.com')->send(new Reminder);
});

Route::get('email-queue', function () {
    return Mail::to('group@sdlug.com')->queue(new Reminder);
});

Route::get('email-later', function () {
    $when = Carbon\Carbon::now()->addMinutes(1);
    return Mail::to('group@sdlug.com')->later($when, new Reminder);
});

Route::get('search', function () {
    return App\Post::search('sdlug')->get();
    //dd(App\Post::search('sdlug')->get());
});

Auth::routes();

Route::get('/home', 'HomeController@index');
