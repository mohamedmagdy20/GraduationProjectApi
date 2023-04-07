<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DoctorController;
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

// Route::get('/', function () {
//     return view('');
// });

// Route::get('/', function () {
    
// })->middleware(['auth'])->name('dashboard');
Route::get('/',[HomeController::class,'index'])->middleware(['auth'])->name('dashboard');;

Route::middleware(['auth'])->prefix('dashboard')->group(function(){
    Route::group(['prefix'=>'admins'],function(){
        Route::get('index',[AdminController::class,'index'])->name('admin.index');
        Route::get('create',[AdminController::class,'create'])->name('admin.create');
        Route::post('store',[AdminController::class,'store'])->name('admin.store');
        Route::get('edit/{id}',[AdminController::class,'edit'])->name('admin.edit');
        Route::post('update/{id}',[AdminController::class,'update'])->name('admin.update');
        Route::get('get_data',[AdminController::class,'data'])->name('admin.get-data'); 
        Route::post('delete',[AdminController::class,'delete'])->name('admin.delete');
    });


    Route::group(['prefix'=>'category'],function(){
        
        Route::get('index',[CategoryController::class,'index'])->name('category.index');
        Route::get('create',[CategoryController::class,'create'])->name('category.create');
        Route::post('store',[CategoryController::class,'store'])->name('cateogry.store');
        Route::get('edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('update',[CategoryController::class,'update'])->name('category.update');

        Route::get('get_data',[CategoryController::class,'data'])->name('category.get-data'); 
        Route::post('delete',[CategoryController::class,'delete'])->name('category.delete');
    });


    Route::group(['prefix'=>'doctors'],function(){
        
        Route::get('index',[DoctorController::class,'index'])->name('doctors.index');
        Route::get('create',[DoctorController::class,'create'])->name('doctors.create');
        Route::post('store',[DoctorController::class,'store'])->name('doctors.store');
        Route::get('edit/{id}',[DoctorController::class,'edit'])->name('doctors.edit');
        Route::post('update',[DoctorController::class,'update'])->name('doctors.update');

        Route::get('get_data',[DoctorController::class,'data'])->name('doctors.get-data'); 
        Route::post('delete',[DoctorController::class,'delete'])->name('doctors.delete');
    });

});
require __DIR__.'/auth.php';
