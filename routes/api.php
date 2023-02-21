<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuth\PatientAuthController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\ApiAuth\DoctorAuthController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\LocationController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('patient/login',[PatientAuthController::class,'login']);
Route::post('patient/register',[PatientAuthController::class,'Register']);
Route::post('patient/verfiy',[PatientAuthController::class,'verifyUser']);
Route::post('patient/resend',[PatientAuthController::class,'resendCode']);
Route::post('patient/send-email',[PatientController::class,'sendEmail']);
Route::post('patient/check/code',[PatientController::class,'checkCode']);
Route::put('patient/reset-password', [PatientController::class,'resetPassword']);
Route::get('location',[LocationController::class,'index']);

Route::middleware('auth:api-patient')->prefix('patient')->group(function(){
    Route::get('logout',[PatientAuthController::class,'logout']);
    Route::put('change-password',[PatientController::class,'changePassword']);
    Route::get('profile',[PatientController::class,'profile']);
    Route::post('edit',[PatientController::class,'editProfile']);

});

Route::post('doctor/login',[DoctorAuthController::class,'login']);

Route::middleware('auth:api-doctor')->prefix('doctor')->group(function(){
    Route::get('/profile',[DoctorController::class,'profile']);
    Route::post('/edit/profile',[DoctorController::class,'editProfile']);
    Route::get('/logout',[DoctorAuthController::class,'logout']);
    Route::post('/profile/send-email',[DoctorController::class,'sendEmail']);
    Route::get('profile/resend-email',[DoctorController::class,'resend']);
    Route::post('profile/check-code',[DoctorController::class,'CheckVerification']);
    Route::post('profile/change-password',[DoctorController::class,'changePassword']);

});