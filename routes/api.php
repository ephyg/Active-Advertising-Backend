<?php


use App\Http\Controllers\Basic_infoController;

use App\Http\Controllers\AccountManagerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FreelancerConroller;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;

use App\Models\Basic_info;
use App\Models\Freelancer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group(['middleware' => ['auth:sanctum']], function () {
});


Route::post('/login', [UserController::class, 'login']);
Route::post('/forgot', [PasswordResetController::class, 'sendResetCode']);
Route::post('/verifyCode', [PasswordResetController::class, 'checkCode']);
Route::post('/changePassword', [PasswordResetController::class, 'changePassword']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::post('/user', [UserController::class, 'store']);
Route::put('/user/{id}', [UserController::class, 'update']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);
Route::post('/forgot', [PasswordResetController::class, 'sendResetCode']);


Route::post('/stock/add', [StockController::class, 'store']);
Route::get('/stock', [StockController::class, 'index']);
Route::put('/stock/{id}', [StockController::class, 'update']);
Route::delete('/stock/{id}', [StockController::class, 'destroy']);

Route::post('/freelancer/add', [FreelancerConroller::class, 'store']);
Route::get('/freelancer', [FreelancerConroller::class, 'index']);
Route::put('/freelancer/{id}', [FreelancerConroller::class, 'update']);
Route::delete('/freelancer/{id}', [FreelancerConroller::class, 'destroy']);

Route::get('/basic_info', [Basic_infoController::class, 'index']);
Route::put('/basic_info/{id}', [Basic_infoController::class, 'update']);

Route::get('/freelancer/{id}',[FreelancerConroller::class, 'show']);


Route::get('/account_manager', [AccountManagerController::class, 'index']);

Route::get('/employee', [EmployeeController::class, 'index']);//it also used from employ profile
Route::get('/employee/{user_role}', [EmployeeController::class, 'staffList']);
Route::get('/employee/{user_order}/{id}', [EmployeeController::class, 'employeeOrder']);
Route::get('/order/{id}', [EmployeeController::class, 'show']);// the controller is in the employeeController

