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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/test',function(){
// 	return view('test');
// });


Route::get('/','HomeController@home');

Route::auth();

// Route::get('/home', 'HomeController@index');
// Route::get('/ajax/{id}', function($id){
// 	return $id;
// });
Route::get('/home', 'HomeController@index'); 
Route::post('/post','HomeController@post');
Route::post('/addRestaurant','HomeController@addRestaurant');
Route::get('/restaurants','HomeController@restaurants');


Route::post('/ajax','HomeController@comment'); 
Route::get('/ajaxDelete/{id}','HomeController@commentDelete');



Route::get('/postReview',function(){
	return view('postReview');
});
Route::get('/newRestaurant',function(){
	return view('addRestaurant');
});

// ================================ Arnab code ============================ //
Route::get('ajaxRequest', 'HomeController@ajaxRequest');
Route::post('ajaxRequest', 'HomeController@ajaxRequestPost');
Route::post('ajaxTestDelete/{id}', 'HomeController@ajaxTestDelete');