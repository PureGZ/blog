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

// 后台路由规则
Route::get('/admin','AdminController@index');
// 用户的添加
Route::get('/user/add','UserController@add');
Route::post('/user/insert','UserController@insert');
Route::get('/user/index','UserController@index');