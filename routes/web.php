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

//patient bone
Route::get('/patientbone', [App\Http\Controllers\patientlistController::class, 'patientbone'])->name('patientbone');
Route::post('/patientbone/addpatientbone', [App\Http\Controllers\patientlistController::class, 'addpatientbone'])->name('addpatientbone');
Route::get('/patientbone/editpatientbone/{id}', [App\Http\Controllers\patientlistController::class, 'editpatientbone'])->name('editpatientbone');
Route::post('/patientbone/updatepatientbone', [App\Http\Controllers\patientlistController::class, 'updatepatientbone'])->name('updatepatientbone');


//patient child
Route::get('/patientchild', [App\Http\Controllers\patientlistController::class, 'patientchild'])->name('patientchild');
Route::post('/patientchild/addpatientchild', [App\Http\Controllers\patientlistController::class, 'addpatientchild'])->name('addpatientchild');
Route::get('/patientchild/addpatientchild/{id}', [App\Http\Controllers\patientlistController::class, 'editpatientchild'])->name('editpatientchild');
Route::post('/patientchild/updatepatientchild', [App\Http\Controllers\patientlistController::class, 'updatepatientchild'])->name('updatepatientchild');


//Admin
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('type');

//User
Route::get('/userdata', [App\Http\Controllers\UserController::class, 'userdata'])->name('userdata');
Route::post('/userdata/adduser', [App\Http\Controllers\UserController::class, 'adduser'])->name('adduser');
Route::get('/User/home', [App\Http\Controllers\HomeController::class, 'UserHome'])->name('UserHome.home')->middleware('type');

//DoctorBone
Route::get('/DoctorBone/home', [App\Http\Controllers\HomeController::class, 'DoctorBonehome'])->name('DoctorBone.home')->middleware('type');

//DoctorChild
Route::get('/DoctorChild/home', [App\Http\Controllers\HomeController::class, 'DoctorChildhome'])->name('DoctorChild.home')->middleware('type');

//Type
Route::get('/typedrugs', [App\Http\Controllers\TypedrugsController::class, 'typedrugs'])->name('typedrugs');
Route::post('/typedrugs/addtype', [App\Http\Controllers\TypedrugsController::class, 'addtype'])->name('addtype');
Route::get('/typedrugs/editType/{id}', [App\Http\Controllers\TypedrugsController::class, 'editType'])->name('editType');
Route::post('/updateType', [App\Http\Controllers\TypedrugsController::class, 'updateType'])->name('updateType');

//Send patient
Route::get('/sendpatientbone', [App\Http\Controllers\patientlistController::class, 'sendpatientbone'])->name('sendpatientbone');
Route::post('/sendpatientbone/startPatientBoneLog', [App\Http\Controllers\patientlistController::class, 'startPatientBoneLog'])->name('startPatientBoneLog');
Route::get('/sendpatientchild', [App\Http\Controllers\patientlistController::class, 'sendpatientchild'])->name('sendpatientchild');
Route::post('/sendpatientchild/startPatientChildLog/', [App\Http\Controllers\patientlistController::class, 'startPatientChildLog'])->name('startPatientChildLog');

//CheckData
Route::post('/sendpatientbone/CheckDataBone', [App\Http\Controllers\patientlistController::class, 'CheckDataBone'])->name('CheckDataBone');
Route::post('/sendpatientchild/CheckDataChild', [App\Http\Controllers\patientlistController::class, 'CheckDataChild'])->name('CheckDataChild');

// Done Patient
Route::get('/donepatientbone', [App\Http\Controllers\patientlistController::class, 'donepatientbone'])->name('donepatientbone');
Route::post('/donepatientbone/fetchBoneDrugdoneDetail', [App\Http\Controllers\patientlistController::class, 'fetchBoneDrugdoneDetail'])->name('fetchBoneDrugdoneDetail');
Route::get('/donepatientchild', [App\Http\Controllers\patientlistController::class, 'donepatientchild'])->name('donepatientchild');
Route::post('/donepatientchild/fetchChildDrugdoneDetail', [App\Http\Controllers\patientlistController::class, 'fetchChildDrugdoneDetail'])->name('fetchChildDrugdoneDetail');

//dispense
Route::post('/dispenseBone', [App\Http\Controllers\patientlistController::class, 'dispenseBone'])->name('dispenseBone');
Route::post('/dispenseChild', [App\Http\Controllers\patientlistController::class, 'dispenseChild'])->name('dispenseChild');

//List patient check bone
Route::get('/patientcheckbone', [App\Http\Controllers\patientlistController::class, 'patientcheckbone'])->name('patientcheckbone');
Route::get('/patientcheckbone/patientBoneDetail/{id}', [App\Http\Controllers\patientlistController::class, 'patientBoneDetail'])->name('patientBoneDetail');
Route::post('/patientcheckbone/fetchBoneDrugDetail', [App\Http\Controllers\patientlistController::class, 'fetchBoneDrugDetail'])->name('fetchBoneDrugDetail');
Route::get('/patientcheckbone/patientBoneTreatment/{id}', [App\Http\Controllers\patientlistController::class, 'patientBoneTreatment'])->name('patientBoneTreatment');
Route::post('/patientcheckbone/addPatientBoneTreatment', [App\Http\Controllers\patientlistController::class, 'addPatientBoneTreatment'])->name('addPatientBoneTreatment');

//List patient check child
Route::get('/patientcheckchild', [App\Http\Controllers\patientlistController::class, 'patientcheckchild'])->name('patientcheckchild');
Route::get('/patientcheckchild/patientChildDetail/{id}', [App\Http\Controllers\patientlistController::class, 'patientChildDetail'])->name('patientChildDetail');
Route::post('/patientcheckchild/fetchChildDrugDetail', [App\Http\Controllers\patientlistController::class, 'fetchChildDrugDetail'])->name('fetchChildDrugDetail');
Route::get('/patientcheckchild/patientChildTreatment/{id}', [App\Http\Controllers\patientlistController::class, 'patientChildTreatment'])->name('patientChildTreatment');
Route::post('/patientcheckchild/addPatientChildTreatment', [App\Http\Controllers\patientlistController::class, 'addPatientChildTreatment'])->name('addPatientChildTreatment');

//Drug
Route::get('/drugslist', [App\Http\Controllers\DrugListController::class, 'drugslist'])->name('drugslist');
Route::get('/drugs-low', [App\Http\Controllers\DrugListController::class, 'drugslow'])->name('drugs-low');
Route::post('/drugslist/addDrugs', [App\Http\Controllers\DrugListController::class, 'addDrugs'])->name('addDrugs');

//Stock
Route::get('/stock', [App\Http\Controllers\StockController::class, 'stock'])->name('stock');
Route::post('/stock/addStock', [App\Http\Controllers\StockController::class, 'addStock'])->name('addStock');

//temp table
Route::post('/stock/dropDrugSelect', [App\Http\Controllers\StockController::class, 'dropDrugSelect'])->name('dropDrugSelect');






