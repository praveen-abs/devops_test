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

    Route::get('viewAssigneeReviewList', 'App\Http\Controllers\VmtAPIPMSModuleController@showEmployeeApraisalReviewList');

    Route::get('viewAssigneeReviews', 'App\Http\Controllers\VmtAPIPMSModuleController@showEmployeeApraisalReview');

    Route::post('saveAssigneeReviews', 'App\Http\Controllers\VmtAPIPMSModuleController@saveEmployeeApraisalReview');
});