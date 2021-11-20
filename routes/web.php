<?php

use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Job\JobController;
use App\Http\Controllers\Backend\Job\JobTypeController;
use Illuminate\Support\Facades\Route;

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



Route ::view('/', 'welcome');
Route::post('dashboard', [LoginController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('job-types', JobTypeController::class);
    Route::resource('jobs', JobController::class);
    Route::get('applicant-details/{id}', [JobController::class, 'getApplicantDetails'])->name('applicant-details');
});
