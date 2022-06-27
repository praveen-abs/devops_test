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
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');



Route::get('/registerNewAccount', function(){
    return view('/auth/register');
})->name('registerNewAccount');

Route::get('pages-profile', [App\Http\Controllers\HomeController::class, 'showProfile']);

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

Route::get('vmt-employess/bulk-upload', 'App\Http\Controllers\VmtEmployeeController@bulkUploadEmployee');
Route::post('vmt-employess/bulk-upload', 'App\Http\Controllers\VmtEmployeeController@storeBulkEmployee');

Route::get('vmt-employess/directory', 'App\Http\Controllers\VmtEmployeeController@showEmployeeDirectory');



// pay slip

Route::get('vmt-payslip', 'App\Http\Controllers\VmtPaySlipController@uploadPaySlipView');
Route::post('vmt-payslip', 'App\Http\Controllers\VmtPaySlipController@uploadPaySlip');
Route::get('vmt-employee-payslip', 'App\Http\Controllers\VmtPaySlipController@payslipView');
Route::get('vmt-payslip-pdf', 'App\Http\Controllers\VmtPaySlipController@payslipPdf');


// General Info
Route::post('vmt-general-info',  [App\Http\Controllers\HomeController::class, 'storeGeneralInfo']);

// self appraisal review for employees
Route::get('vmt-pmsappraisal-review', 'App\Http\Controllers\VmtApraisalController@showEmployeeApraisalReview');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Onboarding pages
Route::get('/vmt_employeeOnboarding', function () {
    return view('vmt_employeeOnboarding');
});

Route::get('/vmt_clientOnboarding', function () {
    return view('vmt_clientOnboarding');
});

//
Route::post('vmt_clientOnboarding', 'App\Http\Controllers\VmtClientController@store');