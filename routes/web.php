<?php
use Illuminate\Http\Request;
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
})->name('home');

Route::post('/signup', [
    'uses' => 'UserController@signUp',
    'as' => 'signup'
]);

Route::post('/signin', [
    'uses' => 'UserController@signIn',
    'as' => 'signin'
]);

Route::get('/dashboard', [
    'uses' => 'PostController@getDashBoard',
    'as' => 'dashboard',
])->middleware('auth.basic');

Route::post('/createpost', [
    'uses' => 'PostController@createpost',
    'as' => 'postcreate',
    'middleware' => 'auth'
]);

Route::get('/delete-post/{post_id}', [
    'uses' => 'PostController@deletePost',
    'as' => 'post.delete',
    'middleware' => 'auth'
]);

Route::get('/logout', [
    'uses' => 'UserController@logout',
    'as' => 'logout'
]);

Route::get('/account', [
    'uses' => 'UserController@getAccount',
    'as' => 'account'
]);

Route::post('/updateaccount', [
    'uses' => 'UserController@saveAccount',
    'as' => 'account.save'
]);

Route::get('/userimage/{filename}', [
    'uses' => 'UserController@getUserImage',
    'as' => 'accountimage'
]);

Route::post('/edit', [
    'uses' => 'PostController@editPost',
    'as' => 'edit'
]);

Route::post('/like', [
    'uses' => 'PostController@likePost',
    'as' => 'like'
]);

Route::get('/login', [
    'uses' => 'UserController@signInPage',
    'as' => 'login'
]);
