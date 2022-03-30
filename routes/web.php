<?php

use App\Http\Controllers\User\UserController;
Use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\FrontendController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware' =>['admin','auth'],'namespace'=>'Admin'], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
});

Route::group(['prefix'=>'user','middleware' =>['user','auth'],'namespace'=>'User'], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('deposit',[DepositController::class,'index'])->name('deposit-dashboard');
});

//=======================Frontend=======================
Route::get('about-us',[FrontendController::class,'about']);
Route::get('legal-docs',[FrontendController::class,'docs']);
Route::post('/contact/store', [ContactUsController::class, 'storeContact'])->name('contact-store');
