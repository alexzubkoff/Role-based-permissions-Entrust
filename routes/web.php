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

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::auth();

Route::get('https://laravel-news.com',function (){
    return json_encode('fuck',true);
});

Route::get('/', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');