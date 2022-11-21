<?php

use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Job\JobController;
use App\Http\Controllers\Backend\Settings\OrganizationController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::post('dashboard', [LoginController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth']], function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('organizations', OrganizationController::class);
    Route::resource('jobs', JobController::class);
    Route::get('applicant-details/{id}', [JobController::class, 'getApplicantDetails'])->name('applicant-details');
});
