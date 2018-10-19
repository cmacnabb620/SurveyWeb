<?php
//.................* ProjectManager routing start(Sep-12-2018) *.................//
Route::group(['namespace' => 'ProjectManager','prefix' => 'project_manager','middleware' => 'project_manager'],function(){ 

    /*Project Manager Settings routes start*/
    Route::get('/settings','SettingManagement\ProjectManagerSettingController@index');
    Route::post('/update_user','SettingManagement\ProjectManagerSettingController@updateUser');
    Route::post('/update_manager_password','SettingManagement\ProjectManagerSettingController@updateAdminPassword');
    /*Project Manager Settings routes end*/

  
    Route::get('/dashboard','ProjectManagerDashboardController@index');
    /* New Projects Routes starts*/
    Route::get('/new_projects','ManageProjects\ManageNewProjectController@index');
    Route::get('/new_project_info/{project_id}','ManageProjects\ManageNewProjectController@projectInfo');
    Route::get('/set_project_duration/{project_id}','ManageProjects\ManageNewProjectController@setProjectDuration');
    Route::post('/update_project_date','ManageProjects\ManageNewProjectController@updateProjectDate');
    Route::get('/make_post/{project_id}','ManageProjects\ManageNewProjectController@makePost');
    /*Route::get('/remove_post/{project_id}','ManageProjects\ManageNewProjectController@removePost');*/
    /* New Projects Routes starts*/

    /* Active Projects Routes starts*/
    Route::get('/active_projects','ManageProjects\ActiveProjectController@index');
    Route::get('/make_schedule/{project_id}','ManageProjects\ActiveProjectController@makeSchedule');
    Route::get('/active_project_info/{project_id}','ManageProjects\ActiveProjectController@projectInfo');
    Route::get('/upload_roster_data/{project_id}/{client_id}/{week_no}/{week_startdate}/{week_end_date}','ManageProjects\ProjectManagerRosterDataUploadController@getFileUploadPage');
    
    Route::get('downloadExcel/{type}/{clientid}/{projectid}','ManageProjects\ProjectManagerRosterDataUploadController@downloadExcel');
    
    Route::post('store_roster_file_data','ManageProjects\ProjectManagerRosterDataUploadController@storeClientRosterData');
    /* Active Projects Routes starts*/

    /********************Completed Projects Routes Starts**********************/
    Route::get('/completed_projects','ManageProjects\CompletedProjectController@index');
    Route::get('/completed_project_info/{project_id}','ManageProjects\CompletedProjectController@projectInfo');
    /********************Completed Projects Routes ends**********************/

    /*Providers routes starts*/
    Route::get('/manage_providers','ManageProviders\ManageProviderController@index');
    Route::get('/add_new_provider','ManageProviders\ManageProviderController@addNewProvider');
    Route::post('/save_new_provider','ManageProviders\ManageProviderController@saveNewProvider');
    Route::get('/edit_provider/{provider_id}','ManageProviders\ManageProviderController@editProvider');
    Route::post('/update_provider','ManageProviders\ManageProviderController@updateProvider');
    Route::get('/delete_provider/{provider_id}','ManageProviders\ManageProviderController@deleteProvider');
    /*Providers routes ends*/

    /*Speaciality routes starts*/
    Route::get('/manage_specialty','ManageSpecialty\ManageSpecialtyController@index');
    Route::get('/add_new_specialty','ManageSpecialty\ManageSpecialtyController@addNewSpecialty');
    Route::post('/save_new_specialty','ManageSpecialty\ManageSpecialtyController@saveNewSpecialty');
    Route::get('/edit_specialty/{specialty_id}','ManageSpecialty\ManageSpecialtyController@editSpecialty');
    Route::post('/update_specialty','ManageSpecialty\ManageSpecialtyController@updateSpecialty');
    Route::get('/delete_specialty/{specialty_id}','ManageSpecialty\ManageSpecialtyController@deleteSpecialty');
    /*Speaciality routes ends*/

    Route::get('active_surveyors','ManageSurveyors\ActiveSurveyorController@index');
    Route::get('active_surveyor_info/{userid}/{usertypeid}','ManageSurveyors\ActiveSurveyorController@detailViewSurveyor');
    
    Route::get('trainee_surveyors','ManageSurveyors\TraineeSurveryorController@index');
    Route::get('trainee_surveyor_info/{userid}/{usertypeid}','ManageSurveyors\TraineeSurveryorController@detailViewSurveyor');
    
    Route::get('prospective_surveyors','ManageSurveyors\ProspectiveSurveyorController@index');
    Route::get('prospective_surveyor_info/{userid}/{usertypeid}','ManageSurveyors\ProspectiveSurveyorController@detailViewSurveyor');
    
    Route::get('inactive_surveyors','ManageSurveyors\InactiveSurveyorController@index');
    Route::get('inactive_surveyor_info/{userid}/{usertypeid}','ManageSurveyors\InactiveSurveyorController@detailViewSurveyor');
    
    
    
});
//.................* ProjectManager routing end(Sep_12-2018) *.................//
?>