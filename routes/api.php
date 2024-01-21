<?php

use App\Http\Controllers\Admin\BusinessController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Business\ServiceController;
use App\Http\Controllers\ReviewController;
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

Route::post('login',     [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);

Route::middleware('admin')->group(function (){
    Route::apiResource('user',  UserController::class)->name('index','user');
    Route::apiResource('business',BusinessController::class)->name('index','business');
});



Route::middleware('auth:sanctum')->group(function (){
    Route::apiResource('service', ServiceController::class);
    Route::apiResource('booking', BookingController::class);
    Route::post('update_service/{id}', [ServiceController::class, 'update']);
    Route::apiResource('review', ReviewController::class);
    Route::get('business_review/{id}', [ReviewController::class, 'show']); //business reviews
    Route::get('update_review/{id}', [ReviewController::class, 'update']); //business reviews

});

Route::post('update_business/{id}', [BookingController::class, 'update']);


Route::get('/auth',function (Request $request){
    return response()->json(['message' => 'Please login first']);
})->name('auth');
