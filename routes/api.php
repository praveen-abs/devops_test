<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HRMSBaseAPIController;
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
    Route::get('/getAllUsers',[HRMSBaseAPIController::class, 'getAllUsers']);

    //PMS Forms
    Route::post('getAssigneeKPIForms', [VmtAPIPMSModuleController::class,'getAssigneeKPIForms']);
    Route::post('getKPIFormDetails', [VmtAPIPMSModuleController::class,'getKPIFormDetails']);
    Route::post('getReviewerKPIForms', [VmtAPIPMSModuleController::class,'getReviewerKPIForms']);
    Route::get('getAssigneeReviews', 'App\Http\Controllers\Api\VmtAPIPMSModuleController@getAssigneeReviews');
    Route::post('saveAssigneeReviews', 'App\Http\Controllers\Api\VmtAPIPMSModuleController@saveAssigneeReviews');
    Route::get('getReviewerReviews', 'App\Http\Controllers\Api\VmtAPIPMSModuleController@getReviewerReviews');
    Route::post('saveReviewerReviews', 'App\Http\Controllers\Api\VmtAPIPMSModuleController@saveReviewerReviews');


    Route::post('save_reimbursement_data', [VmtAPIAttendanceController::class, 'saveReimbursementData']);

    ////Attendance

    //Check-in/ Check-out
    Route::post('attendance_checkin', [VmtAPIAttendanceController::class, 'attendanceCheckin']);
    Route::post('attendance_checkout', [VmtAPIAttendanceController::class, 'attendanceCheckout']);
    Route::post('/attendance/get_attendance_status', [VmtAPIAttendanceController::class, 'getAttendanceStatus']);

    //Leave
    Route::post('/attendance/apply_leave', [VmtAPIAttendanceController::class, 'applyLeaveRequest']);
    Route::post('/attendance/approveRejectRevoke-att-leave', [VmtAPIAttendanceController::class, 'approveRejectRevokeLeaveRequest']);
    Route::post('/attendance/getData-att-unused-compensatory-days', [VmtAPIAttendanceController::class, 'getUnusedCompensatoryDays']);
    //Route::post('/attendance/getData-att-leaves', [VmtAPIAttendanceController::class, '']);

    //Attendance Reports
    Route::post('/attendance/monthStatsReport', [VmtAPIAttendanceController::class, 'getAttendanceMonthStatsReport']);
    Route::post('/attendance/dailyReport-PerMonth', [VmtAPIAttendanceController::class, 'getAttendanceDailyReport_PerMonth']);

    //Attendance Regularize
    Route::post('/attendance/apply-att-regularization', [VmtAPIAttendanceController::class, 'applyRequestAttendanceRegularization']);
    Route::post('/attendance/approveReject-att-regularization', [VmtAPIAttendanceController::class, 'approveRejectAttendanceRegularization']);
    Route::post('/attendance/getData-att-regularization', [VmtAPIAttendanceController::class, 'getAttendanceRegularizationData']);


    //Payslip API
    Route::get('payslip_getmonthlypayslipdata', [VmtAPIPaySlipController::class, 'getMonthlyPayslipData']);

    Route::post('employee_monthly_leave_details', [VmtAPIAttendanceController::class,
    'employeeMonthlyLeaveDetails']);

    Route::post('/get-maindashboard-data', [VmtAPIDashboardController::class, 'getMainDashboardData']);
    Route::get('/profile-pages-getEmpDetails', [VmtAPIProfilePagesController::class, 'fetchEmployeeProfileDetails']);

});



