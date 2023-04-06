<?php

use App\Http\Controllers\Dashboard\HomeController;
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

Route::get('/',[HomeController::class,'index'])->name('dashboard');
Route::middleware(['auth'])->prefix('dashboard')->group(function(){});
require __DIR__.'/auth.php';
