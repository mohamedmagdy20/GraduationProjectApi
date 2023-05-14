<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AppointmentTimeController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ClassificationRequestController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\GoogleDriveController;
use App\Http\Controllers\Dashboard\LoginHistoryController;
use App\Http\Controllers\Dashboard\InvoiceController;
use App\Http\Controllers\Dashboard\LogController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Utils\GoogleDrive;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ResultController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\TipsController;
use App\Http\Controllers\NotificationController;

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

Route::get('/', [HomeController::class,'index'])->middleware(['auth']);


Route::get('upload-google-drive',[GoogleDriveController::class,'uploadDrive'])->middleware(['auth']);
Route::get('google/login',[GoogleDrive::class,'googleLogin'])->name('google.login');

// Route::get('/', function () {

// })->middleware(['auth'])->name('dashboard');
Route::get('/logout',[HomeController::class,'logout'])->middleware(['auth'])->name('admin.logout');
Route::middleware(['auth'])->prefix('dashboard')->group(function(){
    Route::get('/get-invoice',[HomeController::class,'amountChart'])->name('invoice.chart');
    Route::get('/',[HomeController::class,'index'])->middleware(['auth'])->name('dashboard');
    Route::group(['prefix'=>'admins'],function(){
        Route::get('index',[AdminController::class,'index'])->name('admin.index');
        Route::get('create',[AdminController::class,'create'])->name('admin.create');
        Route::post('store',[AdminController::class,'store'])->name('admin.store');
        Route::get('edit/{id}',[AdminController::class,'edit'])->name('admin.edit');
        Route::post('update/{id}',[AdminController::class,'update'])->name('admin.update');
        Route::get('get_data',[AdminController::class,'data'])->name('admin.get-data');
        Route::post('delete',[AdminController::class,'delete'])->name('admin.delete');
        Route::post('restore',[AdminController::class,'restore'])->name('admin.restore');

        Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
        Route::get('change-password',[AdminController::class,'changePasswordView'])->name('change-password');
        Route::post('edit-profile',[AdminController::class,'editProfile'])->name('admin.edit.profile');
        Route::post('change-password',[AdminController::class,'changePassword'])->name('admin.change-password');


    });


    Route::group(['prefix'=>'category'],function(){

        Route::get('index',[CategoryController::class,'index'])->name('category.index');
        Route::get('create',[CategoryController::class,'create'])->name('category.create');
        Route::post('store',[CategoryController::class,'store'])->name('cateogry.store');
        Route::get('edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('update',[CategoryController::class,'update'])->name('category.update');

        Route::get('get_data',[CategoryController::class,'data'])->name('category.get-data');
        Route::post('delete',[CategoryController::class,'delete'])->name('category.delete');
        Route::post('restore',[CategoryController::class,'restore'])->name('category.restore');

    });


    Route::group(['prefix'=>'doctors'],function(){

        // view pages and get data
        Route::get('index',[DoctorController::class,'index'])->name('doctors.index');
        Route::get('create',[DoctorController::class,'create'])->name('doctors.create');
        Route::get('edit/{id}',[DoctorController::class,'edit'])->name('doctors.edit');
        Route::get('get_data',[DoctorController::class,'data'])->name('doctors.get-data');

        // act with db
        Route::post('store',[DoctorController::class,'store'])->name('doctors.store');
        Route::post('update',[DoctorController::class,'update'])->name('doctors.update');
        Route::post('delete',[DoctorController::class,'delete'])->name('doctors.delete');
        Route::post('restore',[DoctorController::class,'restore'])->name('doctors.restore');

    });

    Route::group(['prefix'=>'patients'],function(){

        Route::get('index',[PatientController::class,'index'])->name('patients.index');
        Route::get('get_data',[PatientController::class,'data'])->name('patients.get-data');
        Route::get('show/{id}',[PatientController::class,'show'])->name('patients.show');
        Route::post('delete',[PatientController::class,'delete'])->name('patients.delete');
        Route::post('restore',[PatientController::class,'restore'])->name('patients.restore');


        Route::get('get-result/{id}',[PatientController::class,'getResultData'])->name('patients.get-result');
        Route::get('get-appointment/{id}',[PatientController::class,'getAppointmentData'])->name('patients.get-appointment');

    });


    Route::group(['prefix'=>'roles'],function(){
        Route::get('index',[RoleController::class,'index'])->name('roles.index');
        Route::get('edit/{id}',[RoleController::class,'edit'])->name('role.edit');
        Route::get('update',[RoleController::class,'update'])->name('role.update');
    });


    Route::group(['prefix'=>'permissions'],function(){

        Route::get('edit/{id}',[PermissionController::class,'edit'])->name('permissions.edit');
        Route::post('update',[PermissionController::class,'update'])->name('permissions.update');

    });


    // noor.com/classificastaion-request/cre

    Route::group(['prefix'=>'classification-request'],function(){

        Route::get('index',[ClassificationRequestController::class,'index'])->name('classification-request.index');
        Route::get('data',[ClassificationRequestController::class,'data'])->name('classification-request.get-data');

        Route::get('create/{id}',[ClassificationRequestController::class,'create'])->name('classification-request.create');
        Route::post('make-classification',[ClassificationRequestController::class,'makeClassification'])->name('classification-request.make');

    });
    Route::group(['prefix'=>'results'],function(){
        Route::get('index',[ResultController::class,'index'])->name('results.index');
        Route::get('data',[ResultController::class,'data'])->name('results.get-data');
    });


    Route::group(['prefix'=>'invoices'],function(){
        Route::get('index',[InvoiceController::class,'index'])->name('invoices.index');
        Route::get('data',[InvoiceController::class,'data'])->name('invoices.get-data');
    });

    Route::group(['prefix'=>'notifications'],function(){

        Route::get('index',[NotificationController::class,'index'])->name('notifications.index');
        Route::get('data',[NotificationController::class,'data'])->name('notifications.get-data');

    });

    Route::group(['prefix'=>'activity'],function(){

        Route::get('index',[LogController::class,'index'])->name('activity.index');
        Route::get('data',[LogController::class,'data'])->name('activity.get-data');

    });


    Route::group(['prefix'=>'appointment-times'],function(){

        Route::get('index',[AppointmentTimeController::class,'index'])->name('appointment_times.index');
        Route::get('data',[AppointmentTimeController::class,'data'])->name('appointment_times.get-data');

        Route::get('create',[AppointmentTimeController::class,'create'])->name('appointment_times.create');
        Route::get('edit/{id}',[AppointmentTimeController::class,'edit'])->name('appointment_times.edit');

        // act with db
        Route::post('store',[AppointmentTimeController::class,'store'])->name('appointment_times.store');
        Route::post('update',[AppointmentTimeController::class,'update'])->name('appointment_times.update');
        Route::post('delete',[AppointmentTimeController::class,'delete'])->name('appointment_times.delete');
        Route::post('restore',[AppointmentTimeController::class,'restore'])->name('appointment_times.restore');

    });


    Route::group(['prefix'=>'settings'],function(){

        Route::get('index',[SettingsController::class,'index'])->name('settings.index');
        Route::post('toggle-recaptcha',[SettingsController::class,'toggleRecaptcha'])->name('settings.toggle-activate');

    });



    Route::group(['prefix'=>'tips'],function(){

        Route::get('index',[TipsController::class,'index'])->name('tips.index');
        Route::get('data',[TipsController::class,'data'])->name('tips.data');

    });

    Route::group(['prefix'=>'loginHistory'],function(){

        Route::get('index',[LoginHistoryController::class,'index'])->name('loginHisory.index');
        Route::get('get_data',[LoginHistoryController::class,'data'])->name('loginHisory.get-data');

    });

});
require __DIR__.'/auth.php';
