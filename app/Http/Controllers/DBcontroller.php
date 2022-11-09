<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DBcontroller extends Controller
{
    //student 
    public function showStudent(){
        $student = new Students();

        $studentList = $student->getAllStudent();

        return view('layout.assets.students',compact('studentList'));
    }
    public function addStudent(Request $request){
        $student = new Students();
        
        $dataInsert =[     
            $request->s_name,
            $request->birthday,
            $request->s_address,
            $request->department,
            $request->s_class,
            $request->s_gender,
            $request->s_phone,
            $request->S_email
        ];
       $student->addStudent($dataInsert);
        
        return Redirect()->route('admin.showStudent')->with('msg','thêm người dùng thành công');
    }
}
