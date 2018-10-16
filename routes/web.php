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

Route::get('/page-not-found', function () {
    return view('Error_Pages.404');
});

@include_once(base_path('routes/crossroad-roles/admin.php'));
@include_once(base_path('routes/crossroad-roles/project-manager.php'));
@include_once(base_path('routes/crossroad-roles/surveyor.php'));
@include_once(base_path('routes/crossroad-roles/qc-user.php'));
@include_once(base_path('routes/crossroad-roles/finance-user.php'));
Route::get('/','LoginController@login');
Route::post('submit-login','LoginController@submitLogin');
Route::post('forgot-check-username','LoginController@forgotUsernameCheck');
Route::get('set-password/{userid}','LoginController@setPassword');
Route::post('update-password','LoginController@updatePassword');
Route::get('logout','LoginController@logout');
Route::get('set_your_password/{userid}','LoginController@setYourPassword');
Route::post('updateEmaillinkPassword','LoginController@updateEmaillinkPassword');
Route::post('update_url_request_time','SuperAdmin\AdminDashboardController@update_url_request_time');
Route::post('check_ajax_time_every_3seconds','SuperAdmin\AdminDashboardController@check_ajax_time_every_3seconds');

Route::post('user_previous_login_timings_fetch','SuperAdmin\AdminDashboardController@userPreviousLoginTimingsFetch');

Route::get('change_user_status/{id}','SuperAdmin\AdminDashboardController@changeStatus');




/*******************Developer Test Route Start******************************/
Route::get('/modal_example','ModalController@index');
Route::get('/emial','ModalController@checkemial');
Route::get('/datepicker','ModalController@datepicker');
Route::get('image-upload',['as'=>'image.upload','uses'=>'ModalController@imageUpload']);

Route::post('image-upload',['as'=>'image.upload.post','uses'=>'ModalController@imageUploadPost']);
// Route::get('demo_excel','ModalController@demoExcel');
/*******************Developer Test Route End******************************/

Route::get('/demo_excel', 'ModalController@demoExcel')->name('import');
Route::post('/import_parse', 'ModalController@parseImport')->name('import_parse');
//below route for csv upload with  out Maat web 
Route::post('/import_process', 'ModalController@processImport')->name('import_process');
//below route for Mattweb upload
Route::post('importExcel', 'ModalController@importExcel');


//Maatwebsite xl or csv upload with roster data start
Route::get('roster_data_upload/{client_id}/{project_id}','RosterDataUploadController@getFileUploadPage');
Route::get('downloadExcel/{type}/{clientid}/{projectid}','RosterDataUploadController@downloadExcel');
Route::post('store_roster_file_data','RosterDataUploadController@storeClientRosterData');
//Maatwebsite xl or csv upload with roster data end

