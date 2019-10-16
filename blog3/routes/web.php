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
Route::get('/add',function(){
    return view('admin.add');
});
Route::get('/admin','User\UserController@index');
Route::get('/toLogin',function(){
    return view('admin.login');
});
Route::get('/toReg',function(){
    return view('admin.register');
});
Route::post('login','User\LoginController@login');
Route::post('reg','User\LoginController@reg');
Route::get('/edit/{id}','User\UserController@toEdit');
Route::get('/user/select', 'User\UserController@select');
Route::get('/user', 'User\UserController@index');
Route::post('/user/edit', 'User\UserController@edit');
Route::post('/user/add', 'User\UserController@create');
Route::delete('/user/del/{id}', 'User\UserController@delete');


Route::get('post/create', 'PostController@create');
Route::post('post', 'PostController@store');
