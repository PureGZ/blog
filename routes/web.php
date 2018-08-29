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

// 后台主页
Route::get('/admin', 'AdminController@index');
// 用户管理
Route::get('admin/user/add', 'UserController@add');
Route::post('user/insert', 'UserController@insert');
Route::get('admin/user/list', 'UserController@list');
Route::get('admin/user/edit/{id}', 'UserController@show');
Route::post('user/update', 'UserController@update');
Route::get('admin/user/delete/{id}', 'UserController@destroy');
// 分类管理 -- RESTful 资源控制器
Route::resource('cate', 'CateController');
// 标签管理
Route::resource('tag', 'TagController');




