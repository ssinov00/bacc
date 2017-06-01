<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['as' => 'public.'], function () {

	Route::get('/', ['as' => 'index', 'uses' => 'PublicController@index']);
	Route::get('animals', ['as' => 'animals', 'uses' => 'PublicController@getanimals']);
	Route::get('search', ['as' => 'search', 'uses' => 'PublicController@search']);

});


Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {

	Route::get('/', ['as' => 'admin.index', 'uses' => 'AdminController@index']);
	Route::get('post/data', ['as' => 'admin.post.data', 'uses' => 'PostController@data']);
	Route::get('animal/data', ['as' => 'admin.animal.data', 'uses' => 'AnimalController@data']);
	
	Route::resource('animal', 'AnimalController', ['names' => [
		'index' => 'admin.animal.index',
		'create' => 'admin.animal.create',
		'store' => 'admin.animal.store',
		'show' => 'admin.animal.show',
		'edit' => 'admin.animal.edit',
		'update' => 'admin.animal.update',
		'destroy' => 'admin.animal.destroy'
	]]);
	Route::resource('post', 'PostController', ['names' => [
		'index' => 'admin.post.index',
		'create' => 'admin.post.create',
		'store' => 'admin.post.store',
		'show' => 'admin.post.show',
		'edit' => 'admin.post.edit',
		'update' => 'admin.post.update',
		'destroy' => 'admin.post.destroy'
	]]);
	Route::resource('upload', 'UploadController', ['names' => [
		'index' => 'admin.upload.index',
		'create' => 'admin.upload.create',
		'store' => 'admin.upload.store',
		'show' => 'admin.upload.show',
		'edit' => 'admin.upload.edit',
		'update' => 'admin.upload.update',
		'destroy' => 'admin.upload.destroy'
	]]);
});



Route::post('sort', '\Rutorika\Sortable\SortableController@sort');
Route::post('image', 'UploadController@image');
Route::auth();

