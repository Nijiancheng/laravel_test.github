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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/toReg',function(){
//    return view('admin.register');
//});
//Route::post('/reg','User\LoginController@reg');
Route::match(['get','post'],'reg','User\LoginController@reg');
//Route::get('/toLogin',function(){
//    return view('admin.login');
//});
//Route::post('/login','User\LoginController@login');
Route::match(['get','post'],'login','User\LoginController@login')->name("login");
Route::get('/admin','User\UserController@index')->middleware('login')->name("admin");
Route::get('/user/select', 'User\UserController@index')->middleware('login')->name("select");

Route::get('/logout','User\LoginController@logout')->name("login");

//Route::get('/edit','User\UserController@edit')->middleware('login');
//Route::post('/user/edit', 'User\UserController@edit')->middleware('login');
Route::match(['get','post'],'/edit','User\UserController@edit')->middleware('login')->name("edit");
Route::get('/user', 'User\UserController@index')->middleware('login')->name("user");
//Route::get('/add',function(){
//    return view('admin.add');
//});
//Route::post('/user/add', 'User\UserController@create')->middleware('login');
Route::match(['get','post'],'/add','User\UserController@create')->middleware('login')->name("add");
Route::post('/user/del', 'User\UserController@delete')->middleware('login')->name("del");


//Route::get('post/create', 'PostController@create');
//Route::post('post', 'PostController@store');
