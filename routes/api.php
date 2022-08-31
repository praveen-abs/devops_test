<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Mobile\VmtMobileMainDashboardController;

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


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/mobiledashboard',[VmtMobileMainDashboardController::class, 'getDashboarddata']);
});

Route::group(['middleware' => ['auth:sanctum']], function () {

    //Route::get('viewAssigneeReviewList', 'App\Http\Controllers\VmtAPIPMSModuleController@showEmployeeApraisalReviewList');


    /*
        getAssignedKPIForms():
        Input : assignee_id
        DB Table : vmt_pms_kpiform_assigned
        Output : JSON containing the list of all forms assigned to the given assignee_id

    */
    Route::get('getAssignedKPIForms', 'App\Http\Controllers\VmtAPIPMSModuleController@getAssignedKPIForms');

    /*
        getAssigneeReviews():
        Input : assignee_id, vmt_pms_kpiform_assigned_id
        DB Table : vmt_pms_kpiform_reviews
        Output : JSON containing kpi review of the form assigned to the given assignee id.

    */
    Route::get('getAssigneeReviews', 'App\Http\Controllers\VmtAPIPMSModuleController@getAssigneeReviews');



    /*
        saveAssigneeReviews():
        Input : assignee_id, assigned form id, JSON data of KPI reviews.
        DB Table : vmt_pms_kpiform_reviews
        Output : success/failure response.

    */
    Route::post('saveAssigneeReviews', 'App\Http\Controllers\VmtAPIPMSModuleController@saveAssigneeReviews');


    //Route::get('getReviewerReviews', 'App\Http\Controllers\VmtAPIPMSModuleController@getReviewerReviews');
    //Route::post('saveReviewerReviews', 'App\Http\Controllers\VmtAPIPMSModuleController@saveReviewerReviews');



});
