<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use League\CommonMark\Extension\Table\Table;

class DBcontroller extends Controller
{
    //student 
    public function showStudent(){
        $student = new Students();

        $studentList = $student->getAllStudent();
        
        if($key=Request()->key){

            $studentList= $student->Search($key);
            return view('layout.assets.students',compact('studentList'));
        }

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
    // public function searchStudent(Request $request){
    //     $key=$request->key;
    //     if(!empty($key)){

    //         $data=Students::orderBy('id')->where('s_id   ',
    //         's_name',
    //         'S_email',
    //         's_class',
    //         's_phone',
    //         '%'.$key.'%'
    //         );
    //     }
    //     return view()
    // }
}
