<?php

use App\Http\Controllers\accountController;
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

    // Route::get('index',[accountController::class,'index'])->name('admin.index');

    // đăng nhập
    Route::get('login',[accountController::class,'showLogin'])->name('admin.showLogin');

    Route::post('login',[accountController::class,'login'])->name('admin.login');

    //đăng ký
    Route::get('signUp',[accountController::class,'signUp'])->name('admin.signUp');

    Route::post('signUp',[accountController::class,'storeUser'])->name('admin.store');
    });

