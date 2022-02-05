<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DashboardController;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',[AuthController::class,'loginForm'])->name('login.form');
Route::get('registration/form',[AuthController::class,'registrationForm'])->name('registration.form');
Route::prefix('admin')->group(function(){
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');

});
