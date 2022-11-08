<?php

use App\Http\Controllers\accountController;
use App\Http\Controllers\DBcontroller;
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
    
    Route::get('index',[DBcontroller::class,'showStudent'])->name('admin.showStudent');
    // đăng nhập
    
    Route::get('login',[accountController::class,'showLogin'])->name('admin.showLogin');

    Route::post('login',[accountController::class,'login'])->name('admin.login');

    //đăng ký
    Route::get('signUp',[accountController::class,'signUp'])->name('admin.signUp');

    Route::post('signUp',[accountController::class,'storeUser'])->name('admin.store');

    //đăng xuất

    Route::get('logout',[accountController::class,'logout'])->name('admin.logout');

    //thêm thông tin sinh viên
    Route::post('index',[DBcontroller::class,'addStudent'])->name('admin.addS');
    });

