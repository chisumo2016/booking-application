<?php

use App\Http\Controllers\Admin\BusinessController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('admin')->group(function (){
    Route::apiResource('user',  UserController::class)->name('index','user');
    Route::apiResource('business',BusinessController::class)->name('index','business');
});


Route::post('admin_login',[LoginController::class, 'login'])->name('admin_login');
Route::post('login-form',[LoginController::class, 'showLoginform'])->name('login_form');
Route::post('logout',[LoginController::class, 'logout'])->name('logout');
