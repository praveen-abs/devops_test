<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VmtAPIPMSModuleController;
use App\Http\Controllers\Api\VmtAPIDashboardController;
use App\Http\Controllers\Api\VmtAPIAttendanceController;
use App\Http\Controllers\Api\VmtAPIPaySlipController;
use App\Http\Controllers\Api\VmtAPIProfilePagesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::post('/auth/updatePassword', [AuthController::class, 'updatePassword']);


Route::group(['middleware' => ['auth:sanctum']], function () {

    //Route::get('viewAssigneeReviewList', 'App\Http\Controllers\VmtAPIPMSModuleController@showEmployeeApraisalReviewList');


    /*
        getAssigneeKPIForms():
        DB Table : vmt_pms_kpiform_assigned
        Input : assignee_id
        Output : JSON containing the list of all forms assigned to the given LoggedInUserId

    */
    Route::post('getAssigneeKPIForms', [VmtAPIPMSModuleController::class,'getAssigneeKPIForms']);
       Route::post('getKPIFormDetails', [VmtAPIPMSModuleController::class,'getKPIFormDetails']);

    /*
        getReviewerKPIForms():
        DB Table : vmt_pms_kpiform_assigned
        Input : assignee_id
        Output : JSON containing the list of all forms which reviewed by given LoggedInUserId

    */
    Route::post('getReviewerKPIForms', [VmtAPIPMSModuleController::class,'getReviewerKPIForms']);

    /*
        getAssigneeReviews():
        Input : assignee_id, vmt_pms_kpiform_assigned_id
        DB Table : vmt_pms_kpiform_reviews
        Output : JSON containing kpi review of the form assigned to the given assignee id.

    */
    Route::get('getAssigneeReviews', 'App\Http\Controllers\Api\VmtAPIPMSModuleController@getAssigneeReviews');

    /*
        saveAssigneeReviews():
        Input : assignee_id, assigned form id, JSON data of KPI reviews.
        DB Table : vmt_pms_kpiform_reviews
        Output : success/failure response.

    */
    Route::post('saveAssigneeReviews', 'App\Http\Controllers\Api\VmtAPIPMSModuleController@saveAssigneeReviews');


    Route::get('getReviewerReviews', 'App\Http\Controllers\Api\VmtAPIPMSModuleController@getReviewerReviews');
    Route::post('saveReviewerReviews', 'App\Http\Controllers\Api\VmtAPIPMSModuleController@saveReviewerReviews');


    //Main Dashboard Module
    Route::get('getDashboardData',  [VmtAPIDashboardController::class,'getDashboardData']);


    /*
        get current day attendance API
        attendanceGetCurrentDay():
        Input : date
        DB Table : vmt_employee_attendance
        Output : success/failure response.

    */
    Route::get('attendance_getcurrentday', [VmtAPIAttendanceController::class,'getCurrentDayAttendance']);

    /*
        attendanceCheckin():
        Input : date, checkin_time, shift_type
        DB Table : vmt_employee_attendance
        Output : success/failure response.

    */
    Route::post('attendance_checkin', [VmtAPIAttendanceController::class,
        'attendanceCheckin']);

    /*
        attendanceCheckout():
        Input : date, checkout_time,
        DB Table : vmt_employee_attendance
        Output : success/failure response.

    */
    Route::post('attendance_checkout', [VmtAPIAttendanceController::class,
        'attendanceCheckout']);

    /*
        attendanceCheckout():
        Input : date, checkout_time,
        DB Table : vmt_employee_attendance
        Output : success/failure response.

    */
    Route::post('save_reimbursement_data', [VmtAPIAttendanceController::class,
        'saveReimbursementData']);

    /*
        attendanceApplyLeave():
        Input : date, leave_type_id
        DB Table : vmt_employee_attendance
        Output : success/failure response.
    */
    Route::post('attendance_applyleave', [VmtAPIAttendanceController::class,
        'attendanceApplyLeave']);


    /*
        attendanceMonthlyReport():
        Input : date
        DB Table : vmt_employee_attendance
        Output : success/failure response.
    */
    Route::post('/attendance/monthStatsReport', [VmtAPIAttendanceController::class, 'getAttendanceMonthStatsReport']);
    Route::post('/attendance/dailyReport-PerMonth', [VmtAPIAttendanceController::class, 'getAttendanceDailyReport_PerMonth']);

    //Payslip API
    Route::get('payslip_getmonthlypayslipdata', [VmtAPIPaySlipController::class, 'getMonthlyPayslipData']);


////Profile Pages



});

Route::get('/profile-pages-getEmpDetails', [VmtAPIProfilePagesController::class, 'fetchEmployeeProfileDetails']);

