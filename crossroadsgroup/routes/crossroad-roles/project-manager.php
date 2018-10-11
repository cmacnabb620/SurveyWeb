<?php
//.................* ProjectManager routing start(Sep-12-2018) *.................//
Route::group(['namespace' => 'ProjectManager','prefix' => 'project_manager','middleware' => 'project_manager'],function(){ 
    Route::get('/dashboard','ProjectManagerDashboardController@index');

    /*Project Manager Settings routes start*/
    Route::get('/settings','SettingManagement\ProjectManagerSettingController@index');
    Route::post('/update_user','SettingManagement\ProjectManagerSettingController@updateUser');
    Route::post('/update_manager_password','SettingManagement\ProjectManagerSettingController@updateAdminPassword');
    /*Project Manager Settings routes end*/

    /*Projects Routes starts*/
    Route::get('/new_projects','ManageProjects\ManageProjectController@index');
    Route::get('/project_info/{project_id}','ManageProjects\ManageProjectController@projectInfo');
    Route::get('/make_schedule/{project_id}','ManageProjects\ManageProjectController@makeSchedule');

    /*Projects Routes starts*/

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

});
//.................* ProjectManager routing end(Sep_12-2018) *.................//
?>