<?php

use App\Http\Controllers\Backend\Auth\LoginController;
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
Route ::view('admin/login', 'auth.admin.login')->name('admin.login');
Route ::view('user/login', 'auth.user.login')->name('user.login');
Route ::view('user/registration', 'auth.user.register')->name('user.registration');

Route::post('admin/dashboard', [LoginController::class, 'login'])->name('admin.login.submit');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

