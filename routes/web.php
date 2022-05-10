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
Route::post('vmt-roles', 'App\Http\Controllers\RolesController@store');
Route::get('vmt-assign-roles', 'App\Http\Controllers\RolesController@assignRoles');
Route::post('vmt-assign-roles', 'App\Http\Controllers\RolesController@assignRolesToUser');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
