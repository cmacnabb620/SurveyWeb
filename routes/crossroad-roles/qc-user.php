<?php
//.................* QualityUser routing start(Sep-12-2018) *.................//
Route::group(['namespace' => 'QualityUser','prefix' => 'quality_user','middleware' => 'quality_user'],function(){ 
    Route::get('/dashboard','QualityUserDashboardController@index');

    /***************QC User Project Reviews Routes Starts************************/
    Route::get('/projects_reviews','ProjectReviewManagement\ProjectReviewController@index');
    Route::get('/project_review_info/{projectid}','ProjectReviewManagement\ProjectReviewController@viewReview');
    Route::get('/my_surveyors','MySurveyorManagement\MySurveyorController@index');
    Route::get('/surveyor_projects_info/{userid}/{usertypeid}','MySurveyorManagement\MySurveyorController@surveyorProjectInfo');
    /***************QC User Project Reviews Routes Ends************************/

    /****Qc Setting Routes Starts*****/
    Route::get('/settings','SettingManagement\QcUserSettingController@index');
    Route::post('/update_user','SettingManagement\QcUserSettingController@updateUser');
    Route::post('/update_manager_password','SettingManagement\QcUserSettingController@updateAdminPassword');
    /****Qc Setting Routes End*****/
});
//.................* QualityUser routing end(Sep-12-2018) *.................//
?>