<?php

//.................* Super-Admin routing start(Sep-12-2018) *.........abcd123........//
Route::group(['namespace' => 'SuperAdmin','prefix' => 'admin', 'middleware' => 'admin'],function(){

    Route::get('/page-not-found','AdminDashboardController@pagenotFound');
    /*Admin dash board routes start*/
    Route::get('/dashboard','AdminDashboardController@index');
    Route::post('continue_session','AdminDashboardController@continue_session');
    /*Admin dash board routes end*/

  	/*Admin Role Management routes start*/
    Route::get('/roles','RoleManagement\RoleController@index');
    Route::post('/add-role','RoleManagement\RoleController@addRole');
    Route::get('roles/edit-role/{roleid}','RoleManagement\RoleController@editRole');
    Route::post('update-role','RoleManagement\RoleController@updateRole');
    Route::get('role-delete/{roleid}','RoleManagement\RoleController@deleteRole');
     /*Admin Role Management routes end*/

    /*Admin Admin User routes start*/
    Route::get('/admin_users','UserManagement\AdminUserController@index');
    Route::get('/add_admin_users','UserManagement\AdminUserController@addAdminUser');
    Route::post('/submit_admin_details','UserManagement\AdminUserController@storeDetails');
    Route::get('edit_admin_users/{userid}','UserManagement\AdminUserController@editDetails');
    Route::get('admin_users_info/{userid}','UserManagement\AdminUserController@viewDetails');
    Route::post('update_admin_user_details','UserManagement\AdminUserController@updateDetails');
    Route::get('delete_admin_user/{adminuserid}','UserManagement\AdminUserController@deleteAdminUser');
    /*Admin Admin User routes end*/

  	/*Admin Project Manager routes start*/
  	Route::get('/project_managers','UserManagement\ProjectManagerController@index');
    Route::get('/add_project_managers','UserManagement\ProjectManagerController@addProjectManager');
    Route::post('/submit_user_details','UserManagement\ProjectManagerController@storeDetails');
    Route::get('edit_project_manager/{userid}','UserManagement\ProjectManagerController@editDetails');
    Route::get('project_manager_info/{userid}','UserManagement\ProjectManagerController@viewDetails');
    Route::post('update_user_details','UserManagement\ProjectManagerController@updateDetails');
    Route::get('delete_project_manager/{projectmanagerid}','UserManagement\ProjectManagerController@deleteProjectManager');
  	/*Admin Project Manager routes end*/

    /*Admin Surveyor routes start*/
    Route::get('/active_surveyors','UserManagement\SurveyorController@index');
    Route::get('/prospective_surveyors','UserManagement\SurveyorController@prospective_surveyors');
    Route::get('/trainee_surveyors','UserManagement\SurveyorController@trainee_surveyors');
    Route::get('/inactive_surveyors','UserManagement\SurveyorController@inactive_surveyors');
    Route::get('/add_surveyors','UserManagement\SurveyorController@addSurveyor');
    Route::post('/submit_surveyor_details','UserManagement\SurveyorController@storeDetails');
    Route::get('edit_surveyor/{userid}/{usertype}','UserManagement\SurveyorController@editDetails');
    Route::get('surveyor_info/{userid}/{usertype}','UserManagement\SurveyorController@viewDetails');
    Route::post('update_surveyor_details','UserManagement\SurveyorController@updateDetails');
    Route::get('delete_surveyor/{surveyorid}','UserManagement\SurveyorController@deleteSurveyor');
    /*Admin Surveyor routes end*/

    /*Admin QC User routes start*/
    Route::get('/qc_users','UserManagement\QcUserController@index');
    Route::get('/add_qc_users','UserManagement\QcUserController@addQcUser');
    Route::post('/submit_qcuser_details','UserManagement\QcUserController@storeDetails');
    Route::get('edit_qcuser/{userid}','UserManagement\QcUserController@editDetails');
    Route::get('qcuser_info/{userid}','UserManagement\QcUserController@viewDetails');
    Route::post('update_qcuser_details','UserManagement\QcUserController@updateDetails');
    Route::get('delete_qcuser/{surveyorid}','UserManagement\QcUserController@deleteQcUser');
    /*Admin QC User routes end*/

    /*Admin Finance User routes start*/
    Route::get('/finance_users','UserManagement\FinanceUserController@index');
    Route::get('/add_finance_users','UserManagement\FinanceUserController@addFinanceUser');
    Route::post('/submit_finance_user_details','UserManagement\FinanceUserController@storeDetails');
    Route::get('edit_finance_user/{userid}','UserManagement\FinanceUserController@editDetails');
    Route::get('finance_user_info/{userid}','UserManagement\FinanceUserController@viewDetails');
    Route::post('update_finance_user_details','UserManagement\FinanceUserController@updateDetails');
    Route::get('delete_finance_user/{surveyorid}','UserManagement\FinanceUserController@deleteFinanceUser');
    /*Admin Finance User routes end*/

    /*Admin Manage Project routes start*/
    Route::get('/manage_projects','ProjectManagement\AdminManageProjectController@index');
    Route::get('/add_new_project','ProjectManagement\AdminManageProjectController@addProject');
    Route::get('/project_info/{project_id}','ProjectManagement\AdminManageProjectController@projectInfo');
    Route::get('/edit_project/{project_id}','ProjectManagement\AdminManageProjectController@editProject');
    Route::post('/submit_project_details','ProjectManagement\AdminManageProjectController@storeProject');
    Route::post('/update_project_details','ProjectManagement\AdminManageProjectController@updateProject');
    Route::get('/delete_project/{project_id}','ProjectManagement\AdminManageProjectController@deleteProject');
    Route::get('/make_post/{project_id}','ProjectManagement\AdminManageProjectController@makePost');
    /*Route::get('/remove_post/{project_id}','ProjectManagement\AdminManageProjectController@removePost');*/
    /*Admin Manage Project routes End*/

    /*Frequency type routes starts*/
    Route::get('/manage_frequency_types','ProjectManagement\AdminFrequencyTypeController@index');
    Route::post('/add_new_frequency_type','ProjectManagement\AdminFrequencyTypeController@addNewFrequencyType');
    Route::get('/edit_frequency_type/{report_freq_id}','ProjectManagement\AdminFrequencyTypeController@editFrequencyType');
    Route::get('/delete_frequency_type/{report_freq_id}','ProjectManagement\AdminFrequencyTypeController@deleteFrequencyType');
    Route::post('/update_frequency_type','ProjectManagement\AdminFrequencyTypeController@updateFrequencyType');
    /*Frequency type  routes ends*/

    /*Survey routes starts*/
    Route::get('/manage_survey_types','ProjectManagement\AdminManageSurveyTypeController@index');
    Route::post('/add_new_survey_type','ProjectManagement\AdminManageSurveyTypeController@addNewSurveyType');
    Route::get('/edit_survey_type/{survey_type_id}','ProjectManagement\AdminManageSurveyTypeController@editSurveyType');
    Route::post('/update_survey_type','ProjectManagement\AdminManageSurveyTypeController@updateSurveyType');
    Route::get('/delete_survey_type/{survey_type_id}','ProjectManagement\AdminManageSurveyTypeController@deleteSurveyType');
    /*Survey routes ends*/

    /*Client routes starts*/
    Route::get('/manage_client','ProjectManagement\AdminManageClientController@index');
    Route::get('/add_new_client','ProjectManagement\AdminManageClientController@addNewClient');
    Route::post('/add_new_client','ProjectManagement\AdminManageClientController@saveNewClient');
    Route::get('/edit_client/{clientid}','ProjectManagement\AdminManageClientController@editClient');
    Route::post('/update_client','ProjectManagement\AdminManageClientController@updateClient');
    Route::get('/delete_client/{client_id}','ProjectManagement\AdminManageClientController@deleteClient');
    /*Client routes ends*/

    /*Language routes starts*/
    Route::get('/manage_language','ProjectManagement\AdminManageLanguageController@index');
    Route::post('/add_new_language','ProjectManagement\AdminManageLanguageController@addNewLanguage');
    Route::get('/edit_language/{language_id}','ProjectManagement\AdminManageLanguageController@editLanguage');
    Route::get('/delete_language/{language_id}','ProjectManagement\AdminManageLanguageController@deleteLanguage');
    Route::post('/update_language','ProjectManagement\AdminManageLanguageController@updateLanguage');
    /*Language routes ends*/

    /*Dist Type routes starts*/
    Route::get('/manage_dist_type','ProjectManagement\AdminManageDistTypeController@index');
    Route::post('/add_new_dist_type','ProjectManagement\AdminManageDistTypeController@addNewDistType');
    Route::get('/edit_dist_type/{dist_types_id}','ProjectManagement\AdminManageDistTypeController@editDistType');
    Route::get('/delete_dist_type/{dist_types_id}','ProjectManagement\AdminManageDistTypeController@deleteDistType');
    Route::post('/update_dist_type','ProjectManagement\AdminManageDistTypeController@updateDistType');
    /*Dist Type routes ends*/
    
    /*Modal Routes Starts*/
    Route::post('/modal_add_new_survey_type','ProjectManagement\AdminManageProjectController@addNewSurveyType');
    Route::post('/modal_add_new_client','ProjectManagement\AdminManageProjectController@saveNewClient');
    Route::post('/modal_add_new_language','ProjectManagement\AdminManageProjectController@addNewLanguage');
    /*Modal Routes End*/
    /*Admin Manage Project routes end*/

    /*Admin Qc Reports routes start*/
    Route::get('/admin_qcreports','QcManagement\AdminQcReportController@index');

    Route::get('/view_admin_qcreports','QcManagement\AdminQcReportController@viewQcReport');
    /*Admin Qc Reports routes end*/

    /*Admin Invoice Reports routes start*/
    Route::get('/admin_invoice','InvoiceManagement\AdminInvoiceController@index');

    Route::get('/view_invoice','InvoiceManagement\AdminInvoiceController@viewInvoice');
    /*Admin Invoice Reports routes end*/

    /*Admin Settings routes start*/
    Route::get('/admin_settings','SettingManagement\AdminSettingController@index');
    Route::post('/update_user','SettingManagement\AdminSettingController@updateUser');
    Route::post('/update_admin_password','SettingManagement\AdminSettingController@updateAdminPassword');

    /*Admin Settings routes end*/


});
//.................* Super-Admin routing end(Sep-12-2018) *.................//
?>