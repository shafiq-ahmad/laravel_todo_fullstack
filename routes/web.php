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

Route::get('/', "TodoController@index");
Route::get("{id}/complete", "TodoController@complete");

Route::auth();
//Admin Routes
Route::group(['namespace' => 'Admin'],function(){
	Route::get('admin/','ToDoController@index')->name('admin.home');
	Route::post("admin/todo", "TodoController@store");
	Route::get("admin/{id}/delete", "TodoController@destroy");
	// Users Routes
	Route::resource('admin/user','UserController');
	// Admin Auth Routes
	Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('admin-login', 'Auth\LoginController@login');
});

Route::group(['prefix' => 'api/v1'], function() {
	Route::get('active', 'Admin\TodoController@getActive');
	Route::get('completed', 'Admin\TodoController@getCompleted');
	Route::resource('api', 'TodoController');
});



/*


Auth::routes();
*/
