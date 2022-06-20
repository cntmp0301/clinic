<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

//patient
Route::get('/patientbone', [App\Http\Controllers\patientlistController::class, 'patientbone'])->name('patientbone');
Route::post('/patientbone/addpatientbone', [App\Http\Controllers\patientlistController::class, 'addpatientbone'])->name('addpatientbone');
Route::get('/patientbone/editpatientbone/{id}', [App\Http\Controllers\patientlistController::class, 'editpatientbone'])->name('editpatientbone');
Route::post('/patientbone/updatepatientbone', [App\Http\Controllers\patientlistController::class, 'updatepatientbone'])->name('updatepatientbone');

Route::get('/patientchild', [App\Http\Controllers\patientlistController::class, 'patientchild'])->name('patientchild');
Route::post('/patientchild/addpatientchild', [App\Http\Controllers\patientlistController::class, 'addpatientchild'])->name('addpatientchild');
Route::get('/patientchild/addpatientchild/{id}', [App\Http\Controllers\patientlistController::class, 'editpatientchild'])->name('editpatientchild');
Route::post('/patientchild/updatepatientchild', [App\Http\Controllers\patientlistController::class, 'updatepatientchild'])->name('updatepatientchild');


//Admin
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('type');


//User
Route::get('/userdata', [App\Http\Controllers\UserController::class, 'userdata'])->name('userdata');
Route::post('/userdata/adduser', [App\Http\Controllers\UserController::class, 'adduser'])->name('adduser');

//Type
Route::get('/typedrugs', [App\Http\Controllers\TypedrugsController::class, 'typedrugs'])->name('typedrugs');
Route::post('/typedrugs/addtype', [App\Http\Controllers\TypedrugsController::class, 'addtype'])->name('addtype');
Route::get('/typedrugs/editType/{id}', [App\Http\Controllers\TypedrugsController::class, 'editType'])->name('editType');
Route::post('/updateType', [App\Http\Controllers\TypedrugsController::class, 'updateType'])->name('updateType');

//Send patient
Route::get('/sendpatient', [App\Http\Controllers\patientlistController::class, 'sendpatient'])->name('sendpatient');
Route::get('/sendpatient/statusupdate/{id}', [App\Http\Controllers\patientlistController::class, 'statusupdate'])->name('statusupdate');

//List patient check
Route::get('/patientcheckbone', [App\Http\Controllers\patientlistController::class, 'patientcheckbone'])->name('patientcheckbone');
Route::get('/patientcheckbone/patientBoneDetail/{id}', [App\Http\Controllers\patientlistController::class, 'patientBoneDetail'])->name('patientBoneDetail');



