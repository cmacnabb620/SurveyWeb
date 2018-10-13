<?php
//.................* Surveyor routing start(Sep-12-2018) *.................//
Route::group(['namespace' => 'Surveyor','prefix' => 'surveyor','middleware' => 'surveyor'],function(){ 
    Route::get('/dashboard','SurveyorDashboardController@index');

    /****Surveyor Setting Routes Starts*****/
    Route::get('/settings','SettingManagement\SurveyorSettingController@index');
    Route::post('/update_user','SettingManagement\SurveyorSettingController@updateUser');
    Route::post('/update_manager_password','SettingManagement\SurveyorSettingController@updateAdminPassword');
    /****Surveyor Setting Routes End*****/
});
//.................* Surveyor routing end(Sep-12-2018) *.................//
?>