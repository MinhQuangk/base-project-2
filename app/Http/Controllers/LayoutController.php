<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayoutController extends Controller
{
    
    
    public function dashboard(){
        //Chart thông tin sinh viên
        $studentListMale =DB::select("SELECT COUNT(s_gender) as Male  FROM student WHERE s_gender = 'Nam' " );
        $studentListFemale =DB::select("SELECT COUNT(s_gender) as Female  FROM student WHERE s_gender = N'Nữ' " );
        $studentnumber=DB::select("SELECT COUNT(*) as student from student ");
       $jsonS1 = [];
       $jsonS2 = [];
       $jsonS3=[];
        foreach($studentListMale as $item){
            $jsonS1[] = $item->Male;
        }
        foreach($studentListFemale  as $item){
             $jsonS2[] = $item->Female;
        }
        
        $data1 =array_merge($jsonS1,$jsonS2,$jsonS3);
       // Chart thông tin giảng viên
       $teacherListMale =DB::select("SELECT COUNT(gender) as Male  FROM teacher WHERE gender = 'male' " );
       $teacherListFemale =DB::select("SELECT COUNT(gender) as Female  FROM teacher WHERE gender = 'female' " );
       $teachernumber=DB::select("SELECT COUNT(*) as teacher from teacher ");   
      $jsonT1 = [];
      $jsonT2 = [];
       foreach($teacherListMale as $item ) {
           $jsonT1[] = $item->Male;
       }
       foreach($teacherListFemale  as $item ) {
            $jsonT2[] = $item->Female;
       }
        
       $data2 =array_merge($jsonT1,$jsonT2);
        return view('layout.assets.dashboard',compact('data1','data2','studentnumber','teachernumber'));
    }
    public function exam(){
        return view('layout.assets.exam');
    }
    public function teacher(){
        return view('layout.assets.teachers');
    }
    public function student(){
        return view('layout.assets.students');
    }
    public function schedule(){
        return view('layout.assets.schedule');
    }
    public function noctices(){
        return view('layout.assets.noctices');
    }
    public function admin(){
        return view('Account.admin');
    }
    public function expenses(){
        return view('layout.assets.expenses');
    }
    public function class(){
        return view('layout.assets.class');
    }
    public function scores(){
        return view('layout.assets.scores');
    }
    public function subjects(){
        return view('layout.assets.subjects');
    }
}
