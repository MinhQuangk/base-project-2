<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayoutController extends Controller
{
    
    
    public function dashboard(){
        // bảng thông kê
        $classlist = DB::select('SELECT COUNT(*) as class from class');
        $subject = DB::select("SELECT COUNT(*) as subject from subject" );
        $notice = DB::select('SELECT COUNT(*) as notice from notice');
        $exam = DB::select('SELECT COUNT(*) as exam from exam');
        $mark = DB::select('SELECT COUNT(*) as mark from mark');
        $department = DB::select('SELECT COUNT(*) as department from department');

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
       $statusStudent=DB::table('student')
       ->selectRaw("COUNT(CASE WHEN status = 'Nguy cơ nghỉ học' THEN 1 END) AS status1")
       ->selectRaw("COUNT(CASE WHEN status = 'cảnh báo học vụ' THEN 1 END) AS status2")
       ->selectRaw("COUNT(CASE WHEN status = 'thiếu tín chỉ' THEN 1 END) AS status3")
       ->selectRaw("COUNT(CASE WHEN status = 'thiếu học phí' THEN 1 END) AS status4")
       ->selectRaw("COUNT(CASE WHEN status = 'khen thưởng' THEN 1 END) AS status5")
       ->selectRaw("COUNT(CASE WHEN status = 'rèn luyện học tập tốt' THEN 1 END) AS status6")
       ->get();
       ;
       $GPAStudent=DB::table('student')
       ->selectRaw("COUNT(CASE WHEN GPA < 2.0 THEN 1 END) AS GPA1")
       ->selectRaw("COUNT(CASE WHEN 2.49> GPA and GPA>=2.0    THEN 1 END) AS GPA2")
       ->selectRaw("COUNT(CASE WHEN 3.19> GPA and GPA>=2.5  THEN 1 END) AS GPA3")
       ->selectRaw("COUNT(CASE WHEN 3.59> GPA and GPA>=3.2   THEN 1 END) AS GPA4")
       ->selectRaw("COUNT(CASE WHEN 4.00> GPA and GPA>=3.6 THEN 1 END) AS GPA5")
        ->get();
    //    dd($statusStudent);
      $jsonT1 = [];
      $jsonT2 = [];
      $status=[];
      $GPA=[];
      foreach($GPAStudent as $item ) {
        $GPA[]=$item->GPA1;
        $GPA[]=$item->GPA2;
        $GPA[]=$item->GPA3;
        $GPA[]=$item->GPA4;
        $GPA[]=$item->GPA5;
       
    }
        foreach($statusStudent as $item ) {
            $status[]=$item->status1;
            $status[]=$item->status2;
            $status[]=$item->status3;
            $status[]=$item->status4;
            $status[]=$item->status5;
            $status[]=$item->status6;
        }
        // dd($status);
       foreach($teacherListMale as $item ) {
           $jsonT1[] = $item->Male;
       }
       foreach($teacherListFemale  as $item ) {
            $jsonT2[] = $item->Female;
       }
       $data2 =array_merge($jsonT1,$jsonT2);
    //    dd($data2);
        return view('layout.assets.dashboard',compact('data1','data2','studentnumber','teachernumber',
        'subject','classlist','teacherListMale','teacherListFemale','studentListMale','studentListFemale',
        'notice','mark','exam','status','GPA','department'));
    }
    
    public function schedule(){
        return view('layout.assets.schedule');
    }
    public function admin(){
        return view('Account.admin');
    }
    public function expenses(){
        return view('layout.assets.expenses');
    }
}
