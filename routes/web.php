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

Auth::routes();
//Language Translation
//Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

//Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

Route::get('/',  [App\Http\Controllers\VmtMainDashboardController::class, 'index'])->name('index');
Route::get('/index',  [App\Http\Controllers\VmtMainDashboardController::class, 'index'])->name('index');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');
Route::post('/store-personal-info/{id}', [App\Http\Controllers\HomeController::class, 'storePersonalInfo'])->name('updatePersonalInformation');
Route::post('/store-profile-image/{id}', [App\Http\Controllers\HomeController::class, 'storeProfileImage'])->name('storeProfileImage');
Route::post('/update-bank-info/{id}', [App\Http\Controllers\HomeController::class, 'updateBankInfo'])->name('updateBankInfo');
Route::post('/update-personal-info/{id}', [App\Http\Controllers\HomeController::class, 'updatePersonalInfo'])->name('updatePersonalInfo');
Route::post('/update-experience-info/{id}', [App\Http\Controllers\HomeController::class, 'updateExperienceInfo'])->name('updateExperienceInfo');
Route::post('/update-emergency-info/{id}', [App\Http\Controllers\HomeController::class, 'updtaeEmergencyInfo'])->name('updtaeEmergencyInfo');
Route::post('/update-family-info/{id}', [App\Http\Controllers\HomeController::class, 'updtaeFamilyInfo'])->name('updtaeFamilyInfo');
Route::post('/update-checkin', [App\Http\Controllers\HomeController::class, 'updateCheckin'])->name('updateCheckin');
Route::get('/vmt-topbar-settings', [App\Http\Controllers\HomeController::class, 'vmt_topbar_settings'])->name('vmt_topbar_settings');
Route::post('/poll-voting', [App\Http\Controllers\HomeController::class, 'poll_voting'])->name('poll_voting');

Route::get('/registerNewAccount', function(){
    return view('/auth/register');
})->name('registerNewAccount');

Route::get('pages-profile', [App\Http\Controllers\HomeController::class, 'showProfile'])->name('pages-profile');
Route::get('pages-impersonate-profile/{id}', [App\Http\Controllers\HomeController::class, 'showImpersonateProfile'])->name('pages_impersonate_profile');
// Route::get('pages-profile-settings', [App\Http\Controllers\HomeController::class, 'showProfilePage'])->name('pages-profile-settings');

Route::get('/settings-user', function(){
    return view('vmt_topbar_settings');
})->name('settings-user');

Route::get('test-email', 'App\Http\Controllers\HomeController@testEmail');

// General Settings
Route::get('vmt-general-settings', [App\Http\Controllers\HomeController::class, 'generalSettings']);
Route::post('vmt-general-settings', [App\Http\Controllers\HomeController::class, 'storeGeneralSettings']);


// Permission Roles Routing
Route::get('vmt-roles', 'App\Http\Controllers\RolesController@create');

Route::get('vmt-role-list', 'App\Http\Controllers\RolesController@index');
Route::post('vmt-roles', 'App\Http\Controllers\RolesController@store');
Route::get('vmt-role-permissions/{id}', 'App\Http\Controllers\RolesController@permissionListForRoles');

Route::post('vmt-permissions', 'App\Http\Controllers\RolesController@assignPermissionToRoles');
Route::get('vmt-assign-roles', 'App\Http\Controllers\RolesController@assignRoles');
Route::post('vmt-assign-roles', 'App\Http\Controllers\RolesController@assignRolesToUser');

Route::post('vmt-delete-roles', 'App\Http\Controllers\RolesController@deleteRoles');

//360 Review Module Routing
Route::get('vmt-360-questions', 'App\Http\Controllers\Review360ModuleController@showQuestionsPage');
Route::get('vmt-360-questions/create', 'App\Http\Controllers\Review360ModuleController@showQuestionForm');
Route::get('vmt-360-questions/{id}', 'App\Http\Controllers\Review360ModuleController@showFormsEdit');
Route::post('vmt-360-questions/delete', 'App\Http\Controllers\Review360ModuleController@deleteQuestion');
Route::post('vmt-360-questions/store', 'App\Http\Controllers\Review360ModuleController@saveReviewQuestios');

// Performanse Appraisal Question
Route::get('vmt-apraisal-questions', 'App\Http\Controllers\VmtApraisalController@index');
Route::get('vmt-apraisal-question/edit/{id}', 'App\Http\Controllers\VmtApraisalController@edit');

Route::post('vmt-apraisal-question/update/{id}', 'App\Http\Controllers\VmtApraisalController@update');

Route::post('vmt-apraisal-question/delete', 'App\Http\Controllers\VmtApraisalController@delete');

Route::post('vmt-apraisal-question/bulk-upload', 'App\Http\Controllers\VmtApraisalController@bulkUploadQuestion');

Route::post('vmt-apraisal-question/save', 'App\Http\Controllers\VmtApraisalController@addNewQuestion');

// assign pms goals
Route::get('vmt-pms-assigngoals', 'App\Http\Controllers\VmtApraisalController@vmtAssignGoals');

Route::post('vmt-pms-kpi-table/save', 'App\Http\Controllers\VmtApraisalController@vmtStoreKpiTable');

Route::post('vmt-pms-assign-goals/publish', 'App\Http\Controllers\VmtApraisalController@vmtPublishGoals');

Route::get('vmt-getAllChildEmployees', 'App\Http\Controllers\VmtApraisalController@vmtGetAllChildEmployees');

Route::get('vmt-approvereject-kpitable', 'App\Http\Controllers\VmtApraisalController@approveRejectKPITable');
Route::post('vmt-approvereject-command', 'App\Http\Controllers\VmtApraisalController@approveRejectCommandKPITable');
// dashboard post task 
Route::post('vmt-dashboard-post', 'App\Http\Controllers\VmtMainDashboardController@DashBoardPost');
Route::get('vmt-dashboard-post-view/{id}', 'App\Http\Controllers\VmtMainDashboardController@DashBoardPostView');
// dashboard task //
Route::post('vmt-pms-saveKPItableDraft_HR', 'App\Http\Controllers\VmtApraisalController@saveKPItableDraft_HR');

Route::post('vmt-pms-saveKPItableDraft_Manager', 'App\Http\Controllers\VmtApraisalController@saveKPItableDraft_Manager');

Route::post('vmt-pms-saveKPItableDraft_Employee', 'App\Http\Controllers\VmtApraisalController@saveKPItableDraft_Employee');


// 360 Module Form : CRUD
Route::get('vmt-360-forms', 'App\Http\Controllers\Review360ModuleController@showFormIndex');
Route::get('vmt-360-forms/create', 'App\Http\Controllers\Review360ModuleController@showFormsPage');
Route::post('vmt-360-forms', 'App\Http\Controllers\Review360ModuleController@storeOrUpdateForms');
Route::get('vmt-360-forms/{id}', 'App\Http\Controllers\Review360ModuleController@editReviewForm');

Route::get('vmt-360-forms/{id}/view-form', 'App\Http\Controllers\Review360ModuleController@viewForm');

Route::get('vmt-360-forms/{id}/assign-to-user', 'App\Http\Controllers\Review360ModuleController@assignToUser');

Route::get('vmt-360-forms/{id}/remove-assigned-user', 'App\Http\Controllers\Review360ModuleController@unassignView');

Route::post('vmt-360-forms/{id}/remove-assigned-user', 'App\Http\Controllers\Review360ModuleController@unassignUserStore');

Route::post('vmt-360-forms/{id}/assign-to-user', 'App\Http\Controllers\Review360ModuleController@assignForm');

Route::post('vmt-360-forms/delete', 'App\Http\Controllers\Review360ModuleController@deleteReviewForm');


Route::get('vmt_360review', 'App\Http\Controllers\Review360ModuleController@viewAssignUserForm' );

//
Route::get('vmt-employee-hierarchy', 'App\Http\Controllers\VmtEmployeeController@index');
Route::get('vmt-employee-hierarchy/get-all', 'App\Http\Controllers\VmtEmployeeController@getChildrenList');

Route::get('vmt-employee-hierarchy/create', 'App\Http\Controllers\VmtEmployeeController@create');

Route::get('vmt-employee-hierarchy/{id}/view', 'App\Http\Controllers\VmtEmployeeController@viewHierarchy');

Route::get('vmt-employee-hierarchy/{id}/childrens', 'App\Http\Controllers\VmtEmployeeController@getChildForUser');


Route::post('vmt-employee-hierarchy/store', 'App\Http\Controllers\VmtEmployeeController@store');


Route::get('vmt-employee-hierarchy/modify', 'App\Http\Controllers\VmtEmployeeController@edit');

// store employee
Route::post('vmt-employee-store', 'App\Http\Controllers\VmtEmployeeController@storeEmployeeData');

Route::post('vmt-employee-onboard', 'App\Http\Controllers\VmtEmployeeController@employeeOnboard');

Route::get('vmt-employess/bulk-upload', 'App\Http\Controllers\VmtEmployeeController@bulkUploadEmployee')->name('emp-bulk-upload');
Route::post('vmt-employess/bulk-upload', 'App\Http\Controllers\VmtEmployeeController@storeBulkEmployee');


// Bulk upload employees for quick Onboarding
Route::get('vmt-employess/quick-onboarding/upload', 'App\Http\Controllers\VmtEmployeeController@bulkUploadEmployeeForQuickOnboarding')->name('emp-bulk-upload');
Route::post('vmt-employess/quick-onboarding/upload', 'App\Http\Controllers\VmtEmployeeController@storeEmployeeForQuickOnboarding');
Route::get('vmt-employee/complete-onboarding', 'App\Http\Controllers\VmtEmployeeController@showQuickOnboardForEmployee');
Route::post('vmt-employee/complete-onboarding', 'App\Http\Controllers\VmtEmployeeController@storeQuickOnboardFormEmployee');


Route::get('vmt-employess/directory', 'App\Http\Controllers\VmtEmployeeController@showEmployeeDirectory');
Route::post('vmt-kpi/data', 'App\Http\Controllers\VmtEmployeeController@showKpiData')->name('kpi-data');

//Asset Inventory
Route::get('vmt-assetinventory-index', 'App\Http\Controllers\VmtAssetInventoryController@index')->name('vmt-assetinventory-index');
Route::post('vmt-assetinventory-add', 'App\Http\Controllers\VmtAssetInventoryController@addAsset')->name('vmt-assetinventory-add');
Route::get('vmt-assetinventory-fetch/{id}', 'App\Http\Controllers\VmtAssetInventoryController@fetchAsset')->name('vmt-assetinventory-fetch');
Route::get('vmt-assetinventory-fetchAll', 'App\Http\Controllers\VmtAssetInventoryController@fetchAll')->name('vmt-assetinventory-fetchall');
Route::post('vmt-assetinventory-edit', 'App\Http\Controllers\VmtAssetInventoryController@updateAsset')->name('vmt-assetinventory-edit');
Route::post('vmt-assetinventory-delete', 'App\Http\Controllers\VmtAssetInventoryController@deleteAsset')->name('vmt-assetinventory-delete');

// pay slip

Route::get('vmt-payslip', 'App\Http\Controllers\VmtPaySlipController@uploadPaySlipView');
Route::post('vmt-payslip', 'App\Http\Controllers\VmtPaySlipController@uploadPaySlip');
Route::get('vmt-employee-payslip', 'App\Http\Controllers\VmtPaySlipController@payslipView');
Route::get('vmt-payslip-pdf', 'App\Http\Controllers\VmtPaySlipController@payslipPdf');
    // code end by hentry //
// sample xl download  11/08/2022  //
Route::get( '/download/{filename}', 'App\Http\Controllers\VmtPaySlipController@download');

// end rout //

// General Info
Route::post('vmt-general-info',  [App\Http\Controllers\HomeController::class, 'storeGeneralInfo']);

// self appraisal review for employees
Route::get('vmt-pmsappraisal-review', 'App\Http\Controllers\VmtApraisalController@showEmployeeApraisalReview');

Route::post('vmt-pmsappraisal-review', 'App\Http\Controllers\VmtApraisalController@storeEmployeeApraisalReview');

// to view employees reviews for manager
Route::get('pms-employee-reviews', 'App\Http\Controllers\VmtApraisalController@showManagerApraisalReview');
Route::post('vmt-pms-saveKPItableFeedback_Manager', 'App\Http\Controllers\VmtApraisalController@saveManagerFeedback');
// store review given by manager
Route::post('vmt-pmsappraisal-managerreview', 'App\Http\Controllers\VmtApraisalController@storeManagerApraisalReview');

// Store Review Given by HR
Route::post('vmt-pmsappraisal-hrreview', 'App\Http\Controllers\VmtApraisalController@storeHRApraisalReview');



Route::get('/vmt_employeeOnboarding',  [App\Http\Controllers\VmtEmployeeController::class, 'employeeOnboarding'])->name('vmt_employeeOnboarding');
Route::post('/upload_file',  [App\Http\Controllers\VmtApraisalController::class, 'uploadFile'])->name('upload-file');
Route::post('/upload_file_review',  [App\Http\Controllers\VmtApraisalController::class, 'uploadFileReview'])->name('upload-file-review');
Route::get('/download_file/{id}',  [App\Http\Controllers\VmtApraisalController::class, 'downloadFile'])->name('download-file');
Route::post('/state',  [App\Http\Controllers\VmtEmployeeController::class, 'getState'])->name('state');
Route::get('/vmt_salary_details',  [App\Http\Controllers\VmtPaySlipController::class, 'paySlipIndex']);
Route::get('/vmt_employee_payslip',  [App\Http\Controllers\VmtPaySlipController::class, 'payslipPdfView'])->name('vmt_employee_payslip');
Route::get('/pdfview/{selectedPaySlipMonth}',[App\Http\Controllers\VmtPaySlipController::class, 'pdfview'])->name('pdfview');
  
Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index']);

//Onboarding pages

Route::get('/vmt_clientOnboarding', function () {
    return view('vmt_clientOnboarding');
});

//
Route::post('vmt_clientOnboarding', 'App\Http\Controllers\VmtClientController@store');