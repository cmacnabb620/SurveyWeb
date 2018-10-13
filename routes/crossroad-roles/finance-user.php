<?php
//.................* FinanceUser routing start(Sep-12-2018) *.................//
Route::group(['namespace' => 'FinanceUser','prefix' => 'finance_user','middleware' => 'finance_user'],function(){ 
    Route::get('/dashboard','FinanceUserDashboardController@index');

    /****Surveyor Setting Routes Starts*****/
    Route::get('/settings','SettingManagement\FinanceUserSettingController@index');
    Route::post('/update_user','SettingManagement\FinanceUserSettingController@updateUser');
    Route::post('/update_manager_password','SettingManagement\FinanceUserSettingController@updateAdminPassword');
    /****Surveyor Setting Routes End*****/
});
//.................* FinanceUser routing start(Sep-12-2018) *.................//
?>