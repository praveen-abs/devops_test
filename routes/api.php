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
use App\Http\Controllers\Api\VmtAPILoanAndSalaryAdvanceController;
use App\Imports\VmtEmployee;
use App\Http\Controllers\VmtProfilePagesController;
use Illuminate\Support\Facades\Cache;
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
Route::post('/clearCache',function(){ Cache::flush(); return response()->json(['message' => 'Cache cleared successfully']);});


Route::group(['middleware' => ['auth:sanctum']], function () {

    //CORE
    Route::get('/getAllUsers', [HRMSBaseAPIController::class, 'getAllUsers']);
    Route::get('/getAllBloodgroups', [HRMSBaseAPIController::class, 'getAllBloodgroups']);
    Route::get('/getAllMaritalStatus', [HRMSBaseAPIController::class, 'getAllMaritalStatus']);
    Route::get('/getAllLeaveTypes', [HRMSBaseAPIController::class, 'getAllLeaveTypes']);
    Route::post('/getEmployeeRole', [HRMSBaseAPIController::class, 'getEmployeeRole']);
    Route::post('/getOrgTimePeriod', [HRMSBaseAPIController::class, 'getOrgTimePeriod']);

    Route::get('/getFCMToken', [HRMSBaseAPIController::class, 'getFCMToken']);
    Route::get('/updateFCMToken', [HRMSBaseAPIController::class, 'updateFCMToken']);
    Route::post('/getEmployeePermissions', [HRMSBaseAPIController::class, 'getEmployeePermissions']);
    Route::get('/getAppConfig', [HRMSBaseAPIController::class, 'getAppConfig']);
    Route::post('/permissions/getClientMobilePermissionsDetails', [HRMSBaseAPIController::class, 'getClientMobilePermissionsDetails']);
    Route::post('/permissions/getEmployee_MobileModulePermissionsDetails', [HRMSBaseAPIController::class, 'getEmployee_MobileModulePermissionsDetails']);

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
    Route::post('/reimbursements/save_reimbursement_claims', [VmtAPIReimbursementsController::class, 'saveReimbursementData_Claims']);
    Route::get('/reimbursements/getReimbursementVehicleTypes', [VmtAPIReimbursementsController::class, 'getReimbursementVehicleTypes']);
    Route::get('/reimbursements/getReimbursementTypes', [VmtAPIReimbursementsController::class, 'getReimbursementTypes']);
    Route::get('/reimbursements/getReimbursementClaimTypes', [App\Http\Controllers\VmtReimbursementController::class, 'getReimbursementClaimTypes'])->name('getReimbursementClaimTypes');

    Route::post('/reimbursements/isReimbursementAppliedOrNot', [VmtAPIReimbursementsController::class, 'isReimbursementAppliedOrNot']);

    ////Attendance

    //Check-in/ Check-out
    Route::post('attendance_checkin', [VmtAPIAttendanceController::class, 'performAttendanceCheckIn']);
    Route::post('attendance_checkout', [VmtAPIAttendanceController::class, 'performAttendanceCheckOut']);
    Route::post('/attendance/get_attendance_status', [VmtAPIAttendanceController::class, 'getAttendanceStatus']);
    Route::post('/attendance/get_last_attendance_status', [VmtAPIAttendanceController::class, 'getLastAttendanceStatus']);
    Route::post('/attendance/getEmployeeWorkShiftTimings', [VmtAPIAttendanceController::class, 'getEmployeeWorkShiftTimings']);

    //Leave
    Route::post('/attendance/apply_leave', [VmtAPIAttendanceController::class, 'applyLeaveRequest']);
    Route::post('/attendance/approveRejectRevoke-att-leave', [VmtAPIAttendanceController::class, 'approveRejectRevokeLeaveRequest']);
    Route::post('/attendance/getData-att-unused-compensatory-days', [VmtAPIAttendanceController::class, 'getUnusedCompensatoryDays']);
    Route::post('/attendance/getEmployeeLeaveBalance', [VmtAPIAttendanceController::class, 'getEmployeeLeaveBalance']);
    Route::post('/attendance/getEmployeeLeaveDetails', [VmtAPIAttendanceController::class, 'getEmployeeLeaveDetails']);
    Route::post('/attendance/getAllEmployeesLeaveDetails', [VmtAPIAttendanceController::class, 'getAllEmployeesLeaveDetails']);
    Route::post('/attendance/getTeamEmployeesLeaveDetails', [VmtAPIAttendanceController::class, 'getTeamEmployeesLeaveDetails']);

    //Attendance Reports
    Route::post('/attendance/monthStatsReport', [VmtAPIAttendanceController::class, 'getAttendanceMonthStatsReport']);
    Route::post('/attendance/dailyReport-PerMonth', [VmtAPIAttendanceController::class, 'getAttendanceDailyReport_PerMonth_v2']);

    //Attendance Regularize
    Route::post('/attendance/apply-att-regularization', [VmtAPIAttendanceController::class, 'applyRequestAttendanceRegularization']);
    Route::post('/attendance/approveReject-att-regularization', [VmtAPIAttendanceController::class, 'approveRejectAttendanceRegularization']);
    Route::post('/attendance/approveReject-absent-regularization', [VmtAPIAttendanceController::class, 'approveRejectAbsentRegularization']);
    Route::post('/attendance/getData-att-regularization', [VmtAPIAttendanceController::class, 'getAttendanceRegularizationData']);
    Route::post('/attendance/getAttendanceRegularizationStatus', [VmtAPIAttendanceController::class, 'getAttendanceRegularizationStatus']);
    Route::post('/attendance/applyRequestAbsentRegularization', [VmtAPIAttendanceController::class, 'applyRequestAbsentRegularization']);
    Route::post('/attendance/countOfAttendanceRegularization', [VmtAPIAttendanceController::class, 'getCountForAttRegularization']);
    Route::post('/attendance/fetchAttendadnceRegularization', [VmtAPIAttendanceController::class, 'getfetchAttendadnceRegularization']);


    //Payslip API
    Route::post('/payroll/payslip/getEmployeePayslipDetails', [VmtAPIPaySlipController::class, 'getEmployeePayslipDetails']);
    Route::post('/payroll/payslip/getEmployeePayslipDetailsAsPDF', [VmtAPIPaySlipController::class, 'getEmployeePayslipDetailsAsPDF']);
    Route::post('/payroll/payslip/getEmployeePayslipDetailsAsHTML', [VmtAPIPaySlipController::class, 'getEmployeePayslipDetailsAsHTML']);
    Route::post('/payroll/payslip/sendEmployeePayslipMail', [VmtAPIPaySlipController::class, 'sendEmployeePayslipMail']);
    Route::post('/payroll/payslip/getEmployeeAllPayslipList', [VmtAPIPaySlipController::class, 'getEmployeeAllPayslipList']);
    Route::post('/payroll/getEmployeeCompensatoryDetails', [VmtAPIPaySlipController::class, 'getEmployeeCompensatoryDetails']);
    Route::post('/payroll/getEmployeeYearlyAndMonthlyCTC',[VmtAPIPaySlipController::class,'getEmployeeYearlyAndMonthlyCTC']);



    //Profile pages
    Route::post('/profile-pages-getEmpDetails', [VmtAPIProfilePagesController::class, 'fetchEmployeeProfileDetails']);
    Route::post('/profile-pages/getProfilePicture', [VmtAPIProfilePagesController::class, 'getProfilePicture']);
    Route::post('/profile-pages/updateProfilePicture', [VmtAPIProfilePagesController::class, 'updateProfilePicture']);
    Route::post('/profile-pages/updateEmployeeGeneralInformation', [VmtAPIProfilePagesController::class, 'updateEmployeeGeneralInformation']);
    Route::post('/profile-pages/updateEmployeeContactInformation', [VmtAPIProfilePagesController::class, 'updateEmployeeContactInformation']);
    Route::post('/profile-pages/updateEmployeeBankDetails', [VmtAPIProfilePagesController::class, 'updateEmployeeBankDetails']);
    Route::post('/profile-pages/addEmployeeFamilyDetails', [VmtAPIProfilePagesController::class, 'addEmployeeFamilyDetails']);
    Route::post('/profile-pages/updateEmployeeFamilyDetails', [VmtAPIProfilePagesController::class, 'updateEmployeeFamilyDetails']);
    Route::post('/profile-pages/deleteEmployeeFamilyDetails', [VmtAPIProfilePagesController::class, 'deleteEmployeeFamilyDetails']);
    Route::post('/profile-pages/addEmployeeExperianceDetails', [VmtAPIProfilePagesController::class, 'addEmployeeExperianceDetails']);
    Route::post('/profile-pages/updateEmployeeExperianceDetails', [VmtAPIProfilePagesController::class, 'updateEmployeeExperianceDetails']);
    Route::post('/profile-pages/deleteEmployeeExperianceDetails', [VmtAPIProfilePagesController::class, 'deleteEmployeeExperianceDetails']);
    Route::post('/profile-pages/saveDocumentDetails',[VmtProfilePagesController::class, 'saveDocumentDetails']);


    //Investments
    Route::post('/investments/saveSection80', [VmtAPIInvestmentsController::class, 'saveSection80']);
    Route::post('/investments/saveSectionPopups', [VmtAPIInvestmentsController::class, 'saveSectionPopups']);
    Route::post('/investments/SaveInvDetails', [VmtAPIInvestmentsController::class, 'SaveInvDetails']);
    Route::post('/investments/getInvestmentsFormDetailsTemplate', [VmtAPIInvestmentsController::class, 'getInvestmentsFormDetailsTemplate']);
    Route::post('/investments/fetchHousePropertyDetails', [VmtAPIInvestmentsController::class, 'fetchHousePropertyDetails']);
    Route::post('/investments/fetchEmpRentalDetails', [VmtAPIInvestmentsController::class, 'fetchEmpRentalDetails']);
    Route::post('/investments/deleteHousePropertyDetails', [VmtAPIInvestmentsController::class, 'deleteHousePropertyDetails']);

    //Notifications
    Route::post('/notifications/getNotifications', [VmtApiNotificationsController::class, 'getNotifications']);
    Route::post('/notifications/saveNotification', [VmtApiNotificationsController::class, 'saveNotification']);
    Route::post('/notifications/updateNotificationReadStatus', [VmtApiNotificationsController::class, 'updateNotificationReadStatus']);

    //Onboarding
    Route::post('/approvals/onboarding/isAllOnboardingDocumentsApproved', [App\Http\Controllers\VmtApprovalsController::class, 'isAllOnboardingDocumentsApproved'])->name('isAllOnboardingDocumentsApproved');

    //Payroll

    Route::post('/payroll/getCurrentPayrollDates', [App\Http\Controllers\VmtPayrollController::class, 'getCurrentPayrollMonth'])->name('payroll/getCurrentPayrollDates');

  //payroll statutory PT settings
    Route::post('fetchProfessionalTaxSettings', [App\Http\Controllers\VmtPayrollSettingsController::class, 'fetchProfessionalTaxSettings'])->name('fetchProfessionalTaxSettings');
    Route::post('saveProfessionalTaxSettings', [App\Http\Controllers\VmtPayrollSettingsController::class, 'saveProfessionalTaxSettings'])->name('saveProfessionalTaxSettings');
    Route::post('updateProfessionalTaxSettings', [App\Http\Controllers\VmtPayrollSettingsController::class, 'updateProfessionalTaxSettings'])->name('updateProfessionalTaxSettings');

    //payroll statutory LWF settings
    Route::post('fetchlwfSettingsDetails', [App\Http\Controllers\VmtPayrollSettingsController::class, 'fetchlwfSettingsDetails'])->name('fetchlwfSettingsDetails');
    Route::post('savelwfSettings', [App\Http\Controllers\VmtPayrollSettingsController::class, 'savelwfSettings'])->name('savelwfSettings');
    Route::post('updatelwfSettings', [App\Http\Controllers\VmtPayrollSettingsController::class, 'updatelwfSettings'])->name('updatelwfSettings');



    //loanandadvance
    Route::post('/loanandsalaryadvance/getEmpLoanAndSalaryAdvance', [VmtAPILoanAndSalaryAdvanceController::class, 'getEmpLoanAndSalaryAdvance']);
    Route::post('checkAbsentEmployeeAdminStatus', [App\Http\Controllers\VmtAttendanceController::class, 'checkAbsentEmployeeAdminStatus'])->name('checkAbsentEmployeeAdminStatus');
    Route::post('checkAttendanceEmployeeAdminStatus', [App\Http\Controllers\VmtAttendanceController::class, 'checkAttendanceEmployeeAdminStatus'])->name('checkAttendanceEmployeeAdminStatus');
    Route::post('applyLeaveRequest_AdminRole', [App\Http\Controllers\VmtAttendanceController::class, 'applyLeaveRequest_AdminRole'])->name('applyLeaveRequest_AdminRole');

});
