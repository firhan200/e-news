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


Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\AuthController@login');
    Route::post('/login', 'Admin\AuthController@loginProcess');
    Route::get('/home', 'Admin\HomeController@dashboard');
    Route::get('/logout', 'Admin\HomeController@__logout');

    /*news*/
    Route::prefix('news')->group(function(){
    	Route::get('/', 'Admin\NewsController@list');
	    Route::get('/add', 'Admin\NewsController@add');
	    Route::post('/addProcess', 'Admin\NewsController@addProcess');
	    Route::get('/{id}', 'Admin\NewsController@detail');
	    Route::get('/edit/{id}', 'Admin\NewsController@edit');
	    Route::post('/editProcess', 'Admin\NewsController@editProcess');
	    Route::get('/delete/{id}/{isDeleted}', 'Admin\NewsController@deleteProcess');
    });

    /*category*/
    Route::prefix('category')->group(function(){
    	Route::get('/', 'Admin\CategoryController@list');
	    Route::get('/add', 'Admin\CategoryController@add');
	    Route::post('/addProcess', 'Admin\CategoryController@addProcess');
	    Route::get('/{id}', 'Admin\CategoryController@detail');
	    Route::get('/edit/{id}', 'Admin\CategoryController@edit');
	    Route::post('/editProcess', 'Admin\CategoryController@editProcess');
	    Route::get('/delete/{id}/{isDeleted}', 'Admin\CategoryController@deleteProcess');
    });
});