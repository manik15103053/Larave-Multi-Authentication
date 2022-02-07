<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\ChangePasswordController;

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
Route::group(['middleware' => 'logout'],function(){
    Route::get('/',[AuthController::class,'loginForm'])->name('login.form');
    Route::get('registration/form',[AuthController::class,'registrationForm'])->name('registration.form');
    Route::post('registration/store',[AuthController::class,'store'])->name('registration.form.store');
    Route::post('submit/login',[AuthController::class,'login'])->name('login.submit');
    Route::get('forget-password',[ChangePasswordController::class,'forgetPassword'])->name('password.forget');
    Route::get('reset',[ChangePasswordController::class,'reset'])->name('reset');
    Route::post('reset-password',[ChangePasswordController::class,'resetPassword'])->name('reset.password');


});

Route::group(['middleware' => 'admin'] ,function(){
    Route::prefix('admins')->group(function(){
        Route::get('/',[DashboardController::class,'index'])->name('dashboard');
        Route::get('/change-password',[ChangePasswordController::class,'passwordChanger'])->name('password.change');
        Route::post('/password/update',[ChangePasswordController::class,'updatePassword'])->name('update.password');
        Route::get('logout',[AuthController::class,'logout'])->name('logout');
    });
});

