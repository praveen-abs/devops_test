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

// 360 Module Form : CRUD
Route::get('vmt-360-forms', 'App\Http\Controllers\Review360ModuleController@showFormIndex');
Route::get('vmt-360-forms/create', 'App\Http\Controllers\Review360ModuleController@showFormsPage');
Route::post('vmt-360-forms', 'App\Http\Controllers\Review360ModuleController@storeOrUpdateForms');
Route::get('vmt-360-forms/{id}', 'App\Http\Controllers\Review360ModuleController@editReviewForm');
Route::post('vmt-360-forms/delete', 'App\Http\Controllers\Review360ModuleController@deleteReviewForm');


Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
