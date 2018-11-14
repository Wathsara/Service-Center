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

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

// Route to ask the questions
Route::post('question',[
    'uses' => 'QuestionController@question',
    'as' => 'question'
]);

//admin dashboard view
Route::get('dashboard',[
    'uses' => 'AdminController@dashboard',
    'as' => 'dashboard'
]);


//admin Service view
Route::get('service',[
    'uses' => 'AdminController@service',
    'as' => 'service'
]);
