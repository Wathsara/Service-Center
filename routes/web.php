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

//Route::get('/home', 'HomeController@index')->middleware('verified');

Route::get('home',[
    'uses' => 'HomeController@index',
    'as' => 'home'
])->middleware('verified');

// Route to ask the questions
Route::post('question',[
    'uses' => 'QuestionController@question',
    'as' => 'question'
]);

//route to answer the question
Route::post('answer',[
    'uses' => 'QuestionController@answer',
    'as' => 'answer'
]);

//delete the questions
Route::post('delque',[
    'uses' => 'QuestionController@delque',
    'as' => 'delque'
]);


//admin dashboard view
Route::get('dashboard',[
    'uses' => 'AdminController@dashboard',
    'as' => 'dashboard'
]);


//admin Service view
Route::get('service',[
    'uses' => 'ServiceController@service',
    'as' => 'service'
]);

//add service route
Route::post('addService',[
    'uses' => 'ServiceController@addService',
    'as' => 'addService'
]);

//update service route
Route::post('updateService',[
    'uses' => 'ServiceController@updateService',
    'as' => 'updateService'
]);

//delete service route
Route::post('deleteService',[
    'uses' => 'ServiceController@deleteService',
    'as' => 'deleteService'
]);

//route to check the available time slots of the given date
Route::get('checkAvailability',[
    'uses' => 'BookingController@checkAvailability',
    'as' => 'checkAvailability'
]);

//route to reserve the day and time
Route::post('reserve',[
    'uses' => 'BookingController@reserve',
    'as' => 'reserve'
]);

// route to handle report payments
Route::get('payment', [
    'uses' => 'PaymentController@payWithpaypal',
    'as' => 'payment'
]);
// route to get the status of the transaction
Route::get('paymentStatus', [
    'uses' => 'PaymentController@getStatusReport',
    'as' => 'paymentStatus'
]);

