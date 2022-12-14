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


    
    Route::prefix('admin')->group(function(){
    
    //Route::get('index',[DBcontroller::class,'showStudent'])->name('admin.showStudent');
    
   Route::get('dashboard',[LayoutController::class,'dashboard'],)->name('admin.dashboard');

   Route::get('schedule',[LayoutController::class,'schedule'])->name('admin.schedule');
    
   Route::get('admin',[LayoutController::class,'admin'])->name('admin.edit');
    //đăng xuất

    Route::get('logout',[accountController::class,'logout'])->name('admin.logout');

    // thông tin sinh viên
    Route::get('student',[DBcontroller::class,'showStudent'],)->name('admin.showStudent');

    Route::post('student',[DBcontroller::class,'addStudent'])->name('admin.addS');
  
    Route::get('deleteS/{s_id}',[DBcontroller::class,'deleteStudent'])->name('admin.deleteS');
    
    Route::get('updateS/{s_id}',[DBcontroller::class,'getUpdateStudent'])->name('admin.updateS');

    Route::post('updateS',[DBcontroller::class,'postUpdateStudent'])->name('admin.addUpdateS');

    Route::get('detailS/s_id={s_id}',[DBcontroller::class,'detailStudent'])->name('admin.detailS');

    Route::post('updateStatusStudent',[DBcontroller::class,'updateStatusStudent'])->name('admin.updateStatusStudent');

    //thông tin giáo viên
    
    Route::get('teacher',[DBController::class,'showTeacher'])->name('admin.teacher');

    Route::post('teacher',[DBController::class,'addTeacher'])->name('admin.addT');

    Route::get('deleteT/{t_id}',[DBcontroller::class,'deleteTeacher'])->name('admin.deleteT');
    
    Route::get('updateT/{t_id}',[DBcontroller::class,'getUpdateTeacher'])->name('admin.updateT');

    Route::post('updateT',[DBcontroller::class,'postUpdateTeacher'])->name('admin.addUpdateT');

    Route::get('detailT/t_id={t_id}',[DBcontroller::class,'detailTeacher'])->name('admin.detailT');

    // thông tin môn học
    Route::get('subject',[DBController::class,'showSubject'])->name('admin.Subject');

    Route::post('subject',[DBController::class,'addSubject'])->name('admin.addSubject');

    Route::get('deleteSbj/subjectID={sbj_id}',[DBcontroller::class,'deleteSubject'])->name('admin.deleteSubject');

    // thông tin điểm số 
    Route::get('mark',[DBController::class,'showMark'])->name('admin.Mark');

    Route::post('mark',[DBController::class,'addMark'])->name('admin.addMark');

    Route::get('deleteMark/markID={m_id}',[DBcontroller::class,'deleteMark'])->name('admin.deleteMark');

    Route::get('updateMark/m_id ={m_id}',[DBcontroller::class,'getUpdateMark'])->name('admin.updateMark');

    Route::post('updateMarks',[DBcontroller::class,'postUpdateMark'])->name('admin.addUpdateMark');


    // thông tin lớp học
    
    Route::get('class',[DBController::class,'showCLass'])->name('admin.Class');

    Route::post('class',[DBController::class,'addClass'])->name('admin.addClass');

    Route::get('deleteClass/classID={class_id}',[DBcontroller::class,'deleteClass'])->name('admin.deleteClass');

    Route::get('updateClass/{class_id}',[DBcontroller::class,'getUpdateClass'])->name('admin.updateClass');

    Route::post('updateClass',[DBcontroller::class,'postUpdateClass'])->name('admin.addUpdateClass');

    // thông tin kiểm tra 
    
    Route::get('exam',[DBController::class,'showExam'])->name('admin.Exam');

    Route::post('exam',[DBController::class,'addExam'])->name('admin.addExam');

    Route::get('deleteExam/examID={exam_id}',[DBcontroller::class,'deleteExam'])->name('admin.deleteExam');
    
    //thông báo 

    Route::get('notices',[DBController::class,'showNotice'])->name('admin.Notices');

    Route::post('notices',[DBController::class,'addNotice'])->name('admin.addNotices');

    Route::get('deleteNotice/notice_id ={notice_id}',[DBcontroller::class,'deleteNotice'])->name('admin.deleteNotices');

    // thông tin khoa
    Route::get('department',[DBController::class,'showDepartment'])->name('admin.Department');

    Route::post('department',[DBController::class,'addDepartment'])->name('admin.addDepartment');

    Route::get('deleteDepartment/Department_ID={department_id}',[DBcontroller::class,'deleteDepartment'])->name('admin.deleteDepartment');
    });

    Route::prefix('account')->group(function(){

        // đăng nhập
        Route::get('login',[accountController::class,'showLogin'])->name('account.showLogin');

        Route::post('login',[accountController::class,'login'])->name('account.login');
    
        //đăng ký
        Route::get('signUp',[accountController::class,'signUp'])->name('account.signUp');
    
        Route::post('signUp',[accountController::class,'storeUser'])->name('account.store');    
    
        
    });