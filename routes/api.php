<?php

use App\Http\Controllers\Api\AppointmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuth\PatientAuthController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\TipsController;

use App\Http\Controllers\ApiAuth\DoctorAuthController;
use App\Http\Controllers\ApiAuth\UserAuthController;
use App\Http\Controllers\Dashboard\PatientController as PatientDasboard;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\DoctorController as DoctorDashboard;
use  App\Http\Controllers\Dashboard\ModelController;
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

Route::get('health-tips',[TipsController::class,'index']);
Route::get('health-tips/show/{id}',[TipsController::class,'show']);

Route::post('patient/login',[PatientAuthController::class,'login']);
Route::post('patient/register',[PatientAuthController::class,'Register']);
Route::post('patient/verfiy',[PatientAuthController::class,'verifyUser']);
Route::post('patient/resend',[PatientAuthController::class,'resendCode']);
Route::post('patient/send-email',[PatientController::class,'sendEmail']);
Route::post('patient/check/code',[PatientController::class,'checkCode']);
Route::post('patient/reset-password', [PatientController::class,'resetPassword']);
Route::get('location',[LocationController::class,'index']);

Route::middleware('auth:api-patient')->prefix('patient')->group(function(){
    Route::get('logout',[PatientAuthController::class,'logout']);
    Route::put('change-password',[PatientController::class,'changePassword']);
    Route::get('profile',[PatientController::class,'profile']);
    
    Route::get('profile/results',[PatientController::class,'classifications']);
    Route::get('profile/appointments',[PatientController::class,'appointments']);
    Route::get('profile/invoices',[PatientController::class,'invoice']);

    Route::post('edit',[PatientController::class,'editProfile']);
    Route::post('edit-image',[PatientController::class,'changeImage']);
    
    Route::get('notification',[PatientDasboard::class,'getAllNotification']);
    Route::get('notification/make-seen',[PatientDasboard::class,'Makeseen']);
    Route::get('notification/count',[PatientDasboard::class,'unseenNotificationCount']);

    Route::post('get-avalable-time',[AppointmentController::class,'getAvalableTime']);
    Route::post('reservation',[AppointmentController::class,'reservation']);

    Route::get('get-all-category',[AppointmentController::class,'chooseScan']);

     Route::get('paymod/auth',[PaymentController::class,'getToken']);
   
    Route::get('get-reservation-result',[AppointmentController::class,'getReservationResult']);
    
    
});
// Test Comment //
Route::post('doctor/login',[DoctorAuthController::class,'login']);
Route::post('tips/create',[TipsController::class,'store']);

Route::middleware('auth:api-doctor')->prefix('doctor')->group(function(){
    Route::get('/profile',[DoctorController::class,'profile']);
    Route::post('/edit/profile',[DoctorController::class,'editProfile']);
    Route::get('/logout',[DoctorAuthController::class,'logout']);
    Route::post('/profile/send-email',[DoctorController::class,'sendEmail']);
    Route::get('profile/resend-email',[DoctorController::class,'resend']);
    Route::post('profile/check-code',[DoctorController::class,'CheckVerification']);
    Route::post('profile/change-password',[DoctorController::class,'changePassword']);
    Route::post('reset-setting',[DoctorAuthController::class,'resetSetting']);
});

Route::post('admin/login',[UserAuthController::class,'login']);

// Route::middleware('auth:admin-api')->prefix('admin')->group(function(){
//     Route::post('set-location',[LocationController::class,'store']);
//     Route::get('patient/index',[PatientDasboard::class,'index']);
//     Route::get('/logout',[UserAuthController::class,'logout']);
//     // Doctor Crud 
//     Route::get('/doctor',[DoctorDashboard::class,'index']);
//     Route::post('/doctor/store',[DoctorDashboard::class,'store']);
//     Route::post('/doctor/edit',[DoctorDashboard::class,'edit']);
//     Route::get('/doctor/delete/{id}',[DoctorDashboard::class,'delete']);
//     Route::get('/doctor/show/{id}',[DoctorDashboard::class,'show']);

//     // Admin Crud
//     Route::get('index',[AdminController::class,'index']);
//     Route::get('show/{id}',[AdminController::class,'show']);
//     Route::post('store',[AdminController::class,'store']);
//     Route::get('delete/{id}',[AdminController::class,'delete']);
//     Route::post('edit/{id}',[AdminController::class,'edit']);

//     Route::post('update/profile',[AdminController::class,'editProfile']);
//     Route::get('profile',[AdminController::class,'profile']);

//     // Model Api Test 

//     Route::get('send-notification-patient',[PatientDasboard::class,'sendReport']);

// });

Route::post('model',[ModelController::class,'approveZhimer']);



