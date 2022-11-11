<?php

use App\Http\Controllers\accountController;
use App\Http\Controllers\DBcontroller;
use App\Http\Controllers\LayoutController;
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
    
    Route::prefix('admin')->group(function(){
    
    //Route::get('index',[DBcontroller::class,'showStudent'])->name('admin.showStudent');
    
   Route::get('dashboard',[LayoutController::class,'dashboard'],)->name('admin.dashboard');

   Route::get('student',[DBcontroller::class,'showStudent'],)->name('admin.showStudent');

   Route::get('teacher',[DBController::class,'showTeacher'])->name('admin.teacher');

   Route::post('teacher',[DBController::class,'addTeacher'])->name('admin.addT');

   Route::get('exam',[LayoutController::class,'exam'])->name('admin.exam');

   Route::get('schedule',[LayoutController::class,'schedule'])->name('admin.schedule');

   Route::get('noctices',[LayoutController::class,'noctices'])->name('admin.noctices');

   Route::get('admin',[LayoutController::class,'admin'])->name('admin.edit');
    //đăng xuất

    Route::get('logout',[accountController::class,'logout'])->name('admin.logout');

    //thêm thông tin sinh viên
    Route::post('student',[DBcontroller::class,'addStudent'])->name('admin.addS');
  
    Route::get('delete/{s_id}',[DBcontroller::class,'deleteStudent'])->name('admin.deleteS');
    
    Route::get('update/{s_id}',[DBcontroller::class,'getUpdateStudent'])->name('admin.updateS');

    Route::post('update',[DBcontroller::class,'postUpdateStudent'])->name('admin.addUpdateS');

    });

    Route::prefix('account')->group(function(){

        // đăng nhập
        Route::get('login',[accountController::class,'showLogin'])->name('account.showLogin');

        Route::post('login',[accountController::class,'login'])->name('account.login');
    
        //đăng ký
        Route::get('signUp',[accountController::class,'signUp'])->name('account.signUp');
    
        Route::post('signUp',[accountController::class,'storeUser'])->name('account.store');    
    

    });