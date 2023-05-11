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
use App\Http\Controllers\Api\VmtAPIInvestmentsController;
use App\Http\Controllers\Api\VmtApiNotificationsController;
use App\Http\Controllers\Api\VmtAPIReimbursementsController;

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
Route::post('/auth/send-passwordresetlink', [AuthController::class, 'sendPasswordResetLink']);
Route::post('/auth/updatePassword', [AuthController::class, 'updatePassword']);


Route::group(['middleware' => ['auth:sanctum']], function () {

    //CORE
    Route::get('/getAllUsers', [HRMSBaseAPIController::class, 'getAllUsers']);
    Route::get('/getAllBloodgroups', [HRMSBaseAPIController::class, 'getAllBloodgroups']);
    Route::get('/getAllMaritalStatus', [HRMSBaseAPIController::class, 'getAllMaritalStatus']);
    Route::get('/getAllLeaveTypes', [HRMSBaseAPIController::class, 'getAllLeaveTypes']);
    Route::get('/getAppConfig', [HRMSBaseAPIController::class, 'getAppConfig']);
    Route::post('/getEmployeeRole', [HRMSBaseAPIController::class, 'getEmployeeRole']);
    Route::post('/getOrgTimePeriod', [HRMSBaseAPIController::class, 'getOrgTimePeriod']);

    Route::post('/getFCMToken', [HRMSBaseAPIController::class, 'getFCMToken']);
    Route::post('/updateFCMToken', [HRMSBaseAPIController::class, 'updateFCMToken']);
    Route::post('/getEmployeePermissions', [HRMSBaseAPIController::class, 'getEmployeePermissions']);

    Route::post('/get-maindashboard-data', [VmtAPIDashboardController::class, 'getMainDashboardData']);

    //HOLIDAYS
    Route::get('/holidays/getAllHolidays', [HRMSBaseAPIController::class, 'getAllHolidays']);


    //PMS Forms
    Route::post('getAssigneeKPIForms', [VmtAPIPMSModuleController::class, 'getAssigneeKPIForms']);
    Route::post('getKPIFormDetails', [VmtAPIPMSModuleController::class, 'getKPIFormDetails']);
    Route::post('getReviewerKPIForms', [VmtAPIPMSModuleController::class, 'getReviewerKPIForms']);
    Route::get('getAssigneeReviews', 'App\Http\Controllers\Api\VmtAPIPMSModuleController@getAssigneeReviews');
    Route::post('saveAssigneeReviews', 'App\Http\Controllers\Api\VmtAPIPMSModuleController@saveAssigneeReviews');
    Route::get('getReviewerReviews', 'App\Http\Controllers\Api\VmtAPIPMSModuleController@getReviewerReviews');
    Route::post('saveReviewerReviews', 'App\Http\Controllers\Api\VmtAPIPMSModuleController@saveReviewerReviews');

    //Reimbursements
    Route::post('/reimbursements/save_reimbursement_data', [VmtAPIReimbursementsController::class, 'saveReimbursementData']);
    Route::get('/reimbursements/getReimbursementVehicleTypes', [VmtAPIReimbursementsController::class, 'getReimbursementVehicleTypes']);
    Route::get('/reimbursements/getReimbursementTypes', [VmtAPIReimbursementsController::class, 'getReimbursementTypes']);

    ////Attendance

    //Check-in/ Check-out
    Route::post('attendance_checkin', [VmtAPIAttendanceController::class, 'performAttendanceCheckIn']);
    Route::post('attendance_checkout', [VmtAPIAttendanceController::class, 'performAttendanceCheckOut']);
    Route::post('/attendance/get_attendance_status', [VmtAPIAttendanceController::class, 'getAttendanceStatus']);
    Route::post('/attendance/getEmployeeWorkShiftTimings', [VmtAPIAttendanceController::class, 'getEmployeeWorkShiftTimings']);

    //Leave
    Route::post('/attendance/apply_leave', [VmtAPIAttendanceController::class, 'applyLeaveRequest']);
    Route::post('/attendance/approveRejectRevoke-att-leave', [VmtAPIAttendanceController::class, 'approveRejectRevokeLeaveRequest']);
    Route::post('/attendance/getData-att-unused-compensatory-days', [VmtAPIAttendanceController::class, 'getUnusedCompensatoryDays']);
    Route::post('/attendance/getEmployeeLeaveBalance', [VmtAPIAttendanceController::class, 'getEmployeeLeaveBalance']);
    Route::post('/attendance/getEmployeeLeaveHistory', [VmtAPIAttendanceController::class, 'getEmployeeLeaveHistory']);

    //Attendance Reports
    Route::post('/attendance/monthStatsReport', [VmtAPIAttendanceController::class, 'getAttendanceMonthStatsReport']);
    Route::post('/attendance/dailyReport-PerMonth', [VmtAPIAttendanceController::class, 'getAttendanceDailyReport_PerMonth']);

    //Attendance Regularize
    Route::post('/attendance/apply-att-regularization', [VmtAPIAttendanceController::class, 'applyRequestAttendanceRegularization']);
    Route::post('/attendance/approveReject-att-regularization', [VmtAPIAttendanceController::class, 'approveRejectAttendanceRegularization']);
    Route::post('/attendance/getData-att-regularization', [VmtAPIAttendanceController::class, 'getAttendanceRegularizationData']);
    Route::post('/attendance/applyRequestAbsentRegularization', [VmtAPIAttendanceController::class, 'applyRequestAbsentRegularization']);


    //Payslip API
    Route::post('/payroll/payslip/getEmployeePayslipDetails', [VmtAPIPaySlipController::class, 'getEmployeePayslipDetails']);
    Route::post('/payroll/payslip/getEmployeePayslipDetailsAsPDF', [VmtAPIPaySlipController::class, 'getEmployeePayslipDetailsAsPDF']);
    Route::post('/payroll/payslip/getEmployeePayslipDetailsAsHTML', [VmtAPIPaySlipController::class, 'getEmployeePayslipDetailsAsHTML']);
    Route::post('/payroll/payslip/getEmployeeAllPayslipList', [VmtAPIPaySlipController::class, 'getEmployeeAllPayslipList']);
    Route::post('/payroll/getEmployeeCompensatoryDetails', [VmtAPIPaySlipController::class, 'getEmployeeCompensatoryDetails']);



    //Profile pages
    Route::post('/profile-pages-getEmpDetails', [VmtAPIProfilePagesController::class, 'fetchEmployeeProfileDetails']);
    Route::post('/profile-pages/getProfilePicture', [VmtAPIProfilePagesController::class, 'getProfilePicture']);
    Route::post('/profile-pages/updateProfilePicture', [VmtAPIProfilePagesController::class, 'updateProfilePicture']);
    Route::post('/profile-pages/updateEmployeeGeneralInformation', [VmtAPIProfilePagesController::class, 'updateEmployeeGeneralInformation']);
    Route::post('/profile-pages/updateEmployeeContactInformation', [VmtAPIProfilePagesController::class, 'updateEmployeeContactInformation']);
    Route::post('/profile-pages/updateEmployeeBankDetails', [VmtAPIProfilePagesController::class, 'updateEmployeeBankDetails']);
    Route::post('/profile-pages/addEmployeeFamilyDetails', [VmtAPIProfilePagesController::class, 'addEmployeeFamilyDetails']);
    Route::post('/profile-pages/updateEmployeeFamilyDetails', [VmtAPIProfilePagesController::class, 'updateEmployeeFamilyDetails']);
    Route::post('/profile-pages/deleteEmployeeFamilyDetails', [VmtAPIProfilePagesController::class,'deleteEmployeeFamilyDetails']);


    //Investments
    Route::post('/investments/getCurrentInvestmentsFormDetails', [VmtAPIInvestmentsController::class,'getCurrentInvestmentsFormDetails']);
    Route::post('/investments/getInvestmentsFormDetails', [VmtAPIInvestmentsController::class,'getInvestmentsFormDetails']);
    Route::post('/investments/getInvestmentsFormDetailsTemplate', [VmtAPIInvestmentsController::class,'getInvestmentsFormDetailsTemplate']);
    Route::post('/investments/saveEmpInvSecDetails', [App\Http\Controllers\Investments\VmtInvestmentsController::class, 'saveEmpInvSecDetails'])->name('saveEmpInvSecDetails');

    //Notifications
    Route::post('/notifications/getNotifications', [VmtApiNotificationsController::class,'getNotifications']);
    Route::post('/notifications/saveNotification', [VmtApiNotificationsController::class,'saveNotification']);
    Route::post('/notifications/updateNotificationReadStatus', [VmtApiNotificationsController::class,'updateNotificationReadStatus']);


    //Onboarding
    Route::post('/approvals/onboarding/isAllOnboardingDocumentsApproved', [App\Http\Controllers\VmtApprovalsController::class, 'isAllOnboardingDocumentsApproved'])->name('isAllOnboardingDocumentsApproved');


});
