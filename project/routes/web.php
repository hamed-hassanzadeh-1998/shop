<?php

use App\Http\Controllers\Admin\AdminDashboardController;
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

/*
|--------------------------------------------------------------------------
| admin
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->namespace('Admin')->group(function (){
    Route::get('/',[AdminDashboardController::class,'index'])->name('admin.home');
});
