<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AppointmentController;
use App\Http\Controllers\Dashboard\AppointmentTimeController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ChatController;
use App\Http\Controllers\Dashboard\ClassificationRequestController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\GoogleDriveController;
use App\Http\Controllers\Dashboard\LoginHistoryController;
use App\Http\Controllers\Dashboard\InvoiceController;
use App\Http\Controllers\Dashboard\LogController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\PaymentMethodController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Utils\GoogleDrive;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ResultController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\TipsController;
use App\Http\Controllers\LocalizationController;
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
Route::get('change-language/{lang}',[LocalizationController::class,'setLocal'])->name('change-language');

Route::get('upload-google-drive',[GoogleDriveController::class,'uploadDrive'])->middleware(['auth']);
Route::get('google/login',[GoogleDrive::class,'googleLogin'])->name('google.login');

// Route::get('/', function () {

// })->middleware(['auth'])->name('dashboard');
Route::get('/logout',[HomeController::class,'logout'])->middleware(['auth'])->name('admin.logout');
Route::middleware(['auth'])->prefix('dashboard')->group(function(){
    Route::get('/get-invoice',[HomeController::class,'amountChart'])->name('invoice.chart');
    Route::get('/get-gender',[HomeController::class,'genderData'])->name('gender.chart');
    Route::get('/get-alzhimer',[HomeController::class,'AlzhimerData'])->name('alzhimer.chart');
    Route::get('/get-brain',[HomeController::class,'BrainData'])->name('brain.chart');

    Route::get('/',[HomeController::class,'index'])->middleware(['auth'])->name('dashboard');
    Route::group(['prefix'=>'admins'],function(){
        Route::get('index',[AdminController::class,'index'])->middleware('permission:show_admins')->name('admin.index');
        Route::get('create',[AdminController::class,'create'])->middleware('permission:add_admins')->name('admin.create');
        Route::post('store',[AdminController::class,'store'])->middleware('permission:add_admins')->name('admin.store');
        Route::get('edit/{id}',[AdminController::class,'edit'])->middleware('permission:edit_admins')->name('admin.edit');
        Route::post('update',[AdminController::class,'update'])->middleware('permission:edit_admins')->name('admin.update');
        Route::get('get_data',[AdminController::class,'data'])->middleware('permission:show_admins')->name('admin.get-data');
        Route::post('delete',[AdminController::class,'delete'])->middleware('permission:delete_admins')->name('admin.delete');
        Route::post('restore',[AdminController::class,'restore'])->middleware('permission:delete_admins')->name('admin.restore');
        Route::post('delete-force',[AdminController::class,'forcedelete'])->middleware('permission:delete_admins')->name('admin.forcedelete');

        Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
        Route::get('change-password',[AdminController::class,'changePasswordView'])->name('change-password');
        Route::post('edit-profile',[AdminController::class,'editProfile'])->name('admin.edit.profile');
        Route::post('change-password',[AdminController::class,'changePassword'])->name('admin.change-password');


    });


    Route::group(['prefix'=>'category'],function(){
        

        Route::get('index',[CategoryController::class,'index'])->middleware('permission:show_categories')->name('category.index');
        Route::get('create',[CategoryController::class,'create'])->middleware('permission:add_categories')->name('category.create');
        Route::post('store',[CategoryController::class,'store'])->middleware('permission:add_categories')->name('cateogry.store');
        Route::get('edit/{id}',[CategoryController::class,'edit'])->middleware('permission:edit_categories')->name('category.edit');
        Route::post('update',[CategoryController::class,'update'])->middleware('permission:edit_categories')->name('category.update');

        Route::get('get_data',[CategoryController::class,'data'])->middleware('permission:show_categories')->name('category.get-data');
        Route::post('delete',[CategoryController::class,'delete'])->middleware('permission:delete_categories')->name('category.delete');
        Route::post('restore',[CategoryController::class,'restore'])->middleware('permission:delete_categories')->name('category.restore');
        Route::post('delete-force',[CategoryController::class,'forcedelete'])->middleware('permission:delete_categories')->name('category.forcedelete');

    });


    Route::group(['prefix'=>'doctors'],function(){

        // view pages and get data
        Route::get('index',[DoctorController::class,'index'])->middleware('permission:show_doctors')->name('doctors.index');
        Route::get('create',[DoctorController::class,'create'])->middleware('permission:add_doctors')->name('doctors.create');
        Route::get('edit/{id}',[DoctorController::class,'edit'])->middleware('permission:edit_doctors')->name('doctors.edit');
        Route::get('get_data',[DoctorController::class,'data'])->middleware('permission:show_doctors')->name('doctors.get-data');

        // act with db
        Route::post('store',[DoctorController::class,'store'])->middleware('permission:add_doctors')->name('doctors.store');
        Route::post('update',[DoctorController::class,'update'])->middleware('permission:edit_doctors')->name('doctors.update');
        Route::post('delete',[DoctorController::class,'delete'])->middleware('permission:delete_doctors')->name('doctors.delete');
        Route::post('restore',[DoctorController::class,'restore'])->middleware('permission:delete_doctors')->name('doctors.restore');
        Route::post('delete-force',[DoctorController::class,'forcedelete'])->middleware('permission:delete_doctors')->name('doctors.forcedelete');

    });

    Route::group(['prefix'=>'patients'],function(){

        Route::get('index',[PatientController::class,'index'])->middleware('permission:show_patients')->name('patients.index');
        Route::get('get_data',[PatientController::class,'data'])->middleware('permission:show_patients')->name('patients.get-data');
        Route::get('create',[PatientController::class,'create'])->middleware('permission:add_patients')->name('patients.create');
      
        Route::get('show/{id}',[PatientController::class,'show'])->middleware('permission:show_patients')->name('patients.show');
        Route::post('delete',[PatientController::class,'delete'])->middleware('permission:dective_patients')->name('patients.delete');
        Route::post('restore',[PatientController::class,'restore'])->middleware('permission:active_patients')->name('patients.restore');
        Route::post('delete-force',[PatientController::class,'forceDelete'])->middleware('permission:dective_patients')->name('patients.forcedelete');
        Route::post('store',[PatientController::class,'store'])->middleware('permission:add_patients')->name('patients.store');
        Route::get('get-result/{id}',[PatientController::class,'getResultData'])->middleware('permission:show_patients')->name('patients.get-result');
        Route::get('get-appointment/{id}',[PatientController::class,'getAppointmentData'])->middleware('permission:show_patients')->name('patients.get-appointment');

    });


    Route::group(['prefix'=>'roles'],function(){
        Route::get('index',[RoleController::class,'index'])->middleware('permission:show_permissions')->name('roles.index');
        Route::get('edit/{id}',[RoleController::class,'edit'])->middleware('permission:edit_permissions')->name('role.edit');
        Route::post('update',[RoleController::class,'update'])->middleware('permission:edit_permissions')->name('role.update');
    });


    Route::group(['prefix'=>'permissions'],function(){

        Route::get('edit/{id}',[PermissionController::class,'edit'])->middleware('permission:edit_permissions')->name('permissions.edit');
        Route::post('update',[PermissionController::class,'update'])->middleware('permission:edit_permissions')->name('permissions.update');

    });


    // noor.com/classificastaion-request/cre

    Route::group(['prefix'=>'classification-request'],function(){
        Route::get('index',[ClassificationRequestController::class,'index'])->middleware('permission:show_classifiation_request')->name('classification-request.index');
        Route::get('data',[ClassificationRequestController::class,'data'])->middleware('permission:show_classifiation_request')->name('classification-request.get-data');
        
        Route::get('create/{id}',[ClassificationRequestController::class,'create'])->middleware('permission:make_classification_reqeust')->name('classification-request.create');
        Route::post('make-classification',[ClassificationRequestController::class,'makeClassification'])->middleware('permission:make_classification_reqeust')->name('classification-request.make');

    });
    Route::group(['prefix'=>'results'],function(){
        Route::get('index',[ResultController::class,'index'])->middleware('permission:show_result')->name('results.index');
        Route::get('data',[ResultController::class,'data'])->middleware('permission:show_result')->name('results.get-data');
    });


    Route::group(['prefix'=>'invoices'],function(){
        Route::get('index',[InvoiceController::class,'index'])->middleware('permission:show_invoices')->name('invoices.index');
        Route::get('data',[InvoiceController::class,'data'])->middleware('permission:show_invoices')->name('invoices.get-data');
    });

    Route::group(['prefix'=>'notifications'],function(){
        Route::get('index',[NotificationController::class,'index'])->middleware('permission:show_notifications')->name('notifications.index');
        Route::get('data',[NotificationController::class,'data'])->middleware('permission:show_notifications')->name('notifications.get-data');

    });

    Route::group(['prefix'=>'activity'],function(){

        Route::get('index',[LogController::class,'index'])->middleware('permission:show_security')->name('activity.index');
        Route::get('data',[LogController::class,'data'])->middleware('permission:show_security')->name('activity.get-data');

    });


    Route::group(['prefix'=>'appointment-times'],function(){

        Route::get('index',[AppointmentTimeController::class,'index'])->middleware('permission:show_appointment_time')->name('appointment_times.index');
        Route::get('data',[AppointmentTimeController::class,'data'])->middleware('permission:show_appointment_time')->name('appointment_times.get-data');

        Route::get('create',[AppointmentTimeController::class,'create'])->middleware('permission:add_appointment_time')->name('appointment_times.create');
        Route::get('edit/{id}',[AppointmentTimeController::class,'edit'])->middleware('permission:edit_appointment_time')->name('appointment_times.edit');

        // act with db
        Route::post('store',[AppointmentTimeController::class,'store'])->middleware('permission:add_appointment_time')->name('appointment_times.store');
        Route::post('update',[AppointmentTimeController::class,'update'])->middleware('permission:edit_appointment_time')->name('appointment_times.update');
        Route::post('delete',[AppointmentTimeController::class,'delete'])->middleware('permission:delete_appointment_times')->name('appointment_times.delete');
        Route::post('restore',[AppointmentTimeController::class,'restore'])->middleware('permission:delete_appointment_times')->name('appointment_times.restore');

    });


    Route::group(['prefix'=>'settings'],function(){

        Route::get('index',[SettingsController::class,'index'])->name('settings.index');
        Route::post('toggle-recaptcha',[SettingsController::class,'toggleRecaptcha'])->name('settings.toggle-activate');
        Route::post('updatelocation',[SettingsController::class,'updateLocation'])->name('settings.location.update');

    });



    Route::group(['prefix'=>'tips'],function(){

        Route::get('index',[TipsController::class,'index'])->name('tips.index');
        Route::get('data',[TipsController::class,'data'])->name('tips.data');

    });

    Route::group(['prefix'=>'loginHistory'],function(){

        Route::get('index',[LoginHistoryController::class,'index'])->middleware('permission:show_security')->name('loginHisory.index');
        Route::get('get_data',[LoginHistoryController::class,'data'])->middleware('permission:show_security')->name('loginHisory.get-data');

    });

    Route::group(['prefix'=>'appointments'],function(){
        
        Route::get('index',[AppointmentController::class,'index'])->middleware('permission:show_appointments')->name('appointments.index');
        Route::get('data',[AppointmentController::class,'data'])->middleware('permission:show_appointments')->name('appointements.data');
        Route::post('delete',[AppointmentController::class,'toggleActive'])->name('appointements.delete');
        Route::get('time-data',[AppointmentController::class,'getAvalableTime'])->middleware('permission:show_appointments')->name('appointements.time.data');
        Route::get('create',[AppointmentController::class,'create'])->middleware('permission:show_appointments')->name('appointements.create');
        Route::post('store',[AppointmentController::class,'store'])->middleware('permission:show_appointments')->name('appointments.store');
        Route::post('delete-force',[AppointmentController::class,'forcedelete'])->middleware('permission:show_appointments')->name('appointments.forcedelete');
        Route::get('edit/{id}',[AppointmentController::class,'edit'])->middleware('permission:edit_appointments')->name('appointements.edit');
        Route::post('update',[AppointmentController::class,'update'])->middleware('permission:edit_appointments')->name('appointments.update');
    
    });


    Route::group(['prefix'=>'payment_methods'],function(){
        Route::get('index',[PaymentMethodController::class,'index'])->middleware('permission:show_payment_method')->name('payment_methods.index');
        Route::get('data',[PaymentMethodController::class,'data'])->middleware('permission:show_payment_method')->name('payment_methods.data');
        Route::post('delete',[PaymentMethodController::class,'toggleActive'])->middleware('permission:toggle_active_payment_method')->name('payment_methods.delete');
    });



    Route::group(['prefix'=>'chat'],function(){

        Route::get('index',[ChatController::class,'index'])->middleware('permission:show_payment_method')->name('chat.index');
        Route::get('data',[ChatController::class,'data'])->middleware('permission:show_payment_method')->name('chat.data'); 
        Route::get('/{chat_id}',[ChatController::class,'chat'])->middleware('permission:show_payment_method')->name('chat.start');
        Route::post('delete',[ChatController::class,'delete'])->middleware('permission:show_appointments')->name('chat.delete');
        Route::post('send-message',[ChatController::class,'store'])->middleware('permission:show_appointments')->name('chat.send');
    
    });


});
require __DIR__.'/auth.php';
