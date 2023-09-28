<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TeamController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('company', CompanyController::class);
Route::resource('department', DepartmentController::class);
Route::resource('team', TeamController::class);
Route::resource('employee', EmployeeController::class);

Route::post('/attendance', [AttendanceController::class,'attendance']);


Route::post('/swap', [DashboardController::class,'swap']);
Route::post('/delete', [DashboardController::class,'delete']);


