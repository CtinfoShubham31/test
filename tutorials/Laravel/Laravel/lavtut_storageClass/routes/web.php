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

Route::get('/', function(){
	return view('welcome');
});

Route::get('home', 'HtmlController@home');
Route::get('about', 'HtmlController@about');
Route::get('portfolio', 'HtmlController@portfolio');
Route::get('features', 'HtmlController@features');

Route::get('queryrun', 'TestController@queryrun');
Route::get('orm', 'TestController@insertorm');
Route::get('select', 'TestController@selectmodel');

Route::get('form', 'TestController@myform');
Route::post('submitmyform', 'TestController@submitmyform');

Route::resource("movie","MovieController");

Route::resource("student","StudentController");















Auth::routes();
