<?php
//.................* Surveyor routing start(Sep-12-2018) *.................//
Route::group(['namespace' => 'Surveyor','prefix' => 'surveyor','middleware' => 'surveyor'],function(){ 

    Route::group(['middleware' => 'check_surveyor_info'],function(){
        
    Route::get('/dashboard','SurveyorDashboardController@index');
    /*Projects Routes starts*/
    Route::get('/working_projects','ProjectManagement\SurveyorManageProjectController@workingProjects');
    Route::get('/working_project_info/{project_id}','ProjectManagement\SurveyorManageProjectController@workingProjectInfo');
    Route::get('/completed_projects','ProjectManagement\SurveyorManageProjectController@completedProjects');
    Route::get('/completed_project_info/{project_id}','ProjectManagement\SurveyorManageProjectController@completedProjectInfo');
    /*Projects Routes starts*/
        


    });

    /****Surveyor Setting Routes Starts*****/
    Route::get('/settings','SettingManagement\SurveyorSettingController@index');
    Route::post('/update_user','SettingManagement\SurveyorSettingController@updateUser');
    Route::post('/update_manager_password','SettingManagement\SurveyorSettingController@updateAdminPassword');
    /****Surveyor Setting Routes End*****/

});
//.................* Surveyor routing end(Sep-12-2018) *.................//
?>