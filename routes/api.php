<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\User\UserActivityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => 'v1', 'as' => 'v1.'], function () {

    //login registration route
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::post('register', [AuthController::class, 'register'])->name('registration');
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
        Route::get('jobs/list', [UserActivityController::class, 'getActiveJobList'])->middleware('auth:api')->name('jobs.list');
        Route::get('jobs/{id}', [UserActivityController::class, 'show'])->middleware('auth:api')->name('jobs.show');
        Route::post('jobs/apply', [UserActivityController::class, 'applyJob'])->middleware('auth:api')->name('jobs.apply');

    });
});

