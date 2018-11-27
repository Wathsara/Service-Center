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
Route::get('/home', 'HomeController@index')->middleware('verified');


//route to view the Service List
Route::get('ServiceList',[
    'uses' => 'HomeController@index',
    'as' => 'ServiceList'
]);

//route to view contact us
Route::get('contactUs',[
    'uses' => 'HomeController@contactUs',
    'as' => 'contactUs'
]);

// Route to view the questions
Route::get('customerQuestion',[
    'uses' => 'QuestionController@customerQuestion',
    'as' => 'customerQuestion'
])->middleware('admin');

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

//admin Employee view
Route::get('employee',[
    'uses' => 'EmployeeController@employee',
    'as' => 'employee'
])->middleware('admin');

//add Employee route
Route::post('addEmployee',[
    'uses' => 'EmployeeController@addEmployee',
    'as' => 'addEmployee'
])->middleware('admin');

//update Employee route
Route::post('updateEmployee',[
    'uses' => 'EmployeeController@updateEmployee',
    'as' => 'updateEmployee'
])->middleware('admin');

//delete Employee route
Route::post('deleteEmployee',[
    'uses' => 'EmployeeController@deleteEmployee',
    'as' => 'deleteEmployee'
])->middleware('admin');
