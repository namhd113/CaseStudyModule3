<?php

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
//frontend
Route::get('/', function () {
    return view('layout');
});
Route::get('/home',[\App\Http\Controllers\HomeController::class,'index']);


//backend
Route::get('/admin',[\App\Http\Controllers\AdminController::class,'index'])->name('admin-login');
Route::get('/dashboard',[\App\Http\Controllers\AdminController::class,'show_dashboard'])->name('admin.showDashboard');
Route::get('/logout',[\App\Http\Controllers\AdminController::class,'logout'])->name('admin-logout');
Route::post('/admin-dashboard',[\App\Http\Controllers\AdminController::class,'dashboard'])->name('admin-dashboard');

