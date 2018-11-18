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

// route to find user type
Route::get('/checkUserType','HomeController@findUserType');
//Route::get('/home', 'HomeController@index')->middleware('verified');

Route::get('home',[
    'uses' => 'HomeController@index',
    'as' => 'home'
])->middleware('verified');

// Route to ask the questions
Route::post('question',[
    'uses' => 'QuestionController@question',
    'as' => 'question'
])->middleware('admin');

//route to answer the question
Route::post('answer',[
    'uses' => 'QuestionController@answer',
    'as' => 'answer'
])->middleware('admin');

//delete the questions
Route::post('delque',[
    'uses' => 'QuestionController@delque',
    'as' => 'delque'
])->middleware('admin');


//admin dashboard view
Route::get('dashboard',[
    'uses' => 'AdminController@dashboard',
    'as' => 'dashboard'
])->middleware('admin');


//admin Service view
Route::get('service',[
    'uses' => 'ServiceController@service',
    'as' => 'service'
])->middleware('admin');

//appointment detail view
Route::get('appointment',[
    'uses' => 'BookingController@appointment',
    'as' => 'appointment'
])->middleware('admin');

//appointment time block
Route::post('blockNow',[
    'uses' => 'BookingController@blockNow',
    'as' => 'blockNow'
])->middleware('admin');

//appointment filer using date
Route::get('checkBooking',[
    'uses' => 'BookingController@checkBooking',
    'as' => 'checkBooking'
])->middleware('admin');

//add service route
Route::post('addService',[
    'uses' => 'ServiceController@addService',
    'as' => 'addService'
])->middleware('admin');

//update service route
Route::post('updateService',[
    'uses' => 'ServiceController@updateService',
    'as' => 'updateService'
])->middleware('admin');

//delete service route
Route::post('deleteService',[
    'uses' => 'ServiceController@deleteService',
    'as' => 'deleteService'
])->middleware('admin');

//route to check the available time slots of the given date
Route::get('checkAvailability',[
    'uses' => 'BookingController@checkAvailability',
    'as' => 'checkAvailability'
])->middleware('verified');

//route to reserve the day and time
Route::post('reserve',[
    'uses' => 'BookingController@reserve',
    'as' => 'reserve'
])->middleware('verified');

// route to handle report payments
Route::get('payment', [
    'uses' => 'PaymentController@payWithpaypal',
    'as' => 'payment'
])->middleware('verified');
// route to get the status of the transaction
Route::get('paymentStatus', [
    'uses' => 'PaymentController@getStatusReport',
    'as' => 'paymentStatus'
])->middleware('verified');

