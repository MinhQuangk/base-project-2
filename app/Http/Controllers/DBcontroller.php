<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Teacher;
use App\Models\Subject;
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
    public function deleteStudent($id=0){
        $student = new Students();

        $studentList = $student->deleteStudent($id);
        if($studentList){
            $msg = 'xóa thành công';
           
        }else{
            $msg = 'xóa không thành công';
        }
        return redirect()->route('admin.showStudent')->with('msg',$msg);
    }
    public function getUpdateStudent(Request $request,$id=0){
        $student = new Students();

        if(!empty($id)){
            $detail = $student->getDetail($id);
            if(!empty( $detail[0])){
                $request->session()->put('s_id',$id);
                $detail = $detail[0];
            }
        }
       
       
        return view('layout.assets.editDbStudent',compact('detail'));
    }
    public function postUpdateStudent(Request $request){
        $student = new Students();
        $id =session('s_id');
        $dataInsert =[     
            $request->s_name,
            // $request->birthday,
            $request->s_address,
            $request->department,
            $request->s_class,
            
            $request->s_phone,
            $request->S_email
        ];
        $student->updateStudent($dataInsert,$id);
       
        return redirect()->route('admin.showStudent')->with('msg','Cập nhật thành công');
    }


    //teacher 

    // insert teacher
    public function showTeacher(){
        
        $teacher = new Teacher();
        $teacherlist=$teacher->getAllTeacher();
        if($key=Request()->key){

            $teacherlist= $teacher->Search($key);
            return view('layout.assets.teachers',compact('teacherlist'));}
        return view('layout.assets.teachers',compact('teacherlist'));
            
        }

    public function addTeacher(Request $request){
        $teacher = new Teacher();
        if($request->has('img')){
            $file = $request -> img;
            $ext =$request  ->img->extension();
            $file_name =time().'_'.'admin.'.$ext;
            $file->move(public_path('uploads'),$file_name);
           
        }
        $request->merge(['avatar'=>$file_name]);
      
        $dataInsert =[     
            $request->f_name,
            $request->l_name,
            $request->academic,
            $request->gender,
            $request->department,
            $request->t_phone,
            $request->t_email,
            $request->yearOfBirth,
            $request->avatar
        ];
       $teacher->addTeacher($dataInsert);
        
        return Redirect()->route('admin.teacher')->with('msg','thêm mới giảng viên thành công');
    }
    public function deleteTeacher($t_id=0){
        $teacher = new Teacher();

        $teacherList = $teacher->deleteTeacher($t_id);
        if($teacherList){
            $msg = 'xóa thành công';
           
        }else{
            $msg = 'xóa không thành công';
        }
        return redirect()->route('admin.teacher');
    }
    public function getUpdateTeacher(Request $request,$id=0){
        $teacher = new Teacher();

        if(!empty($id)){
            $detail = $teacher->getDetail($id);
            if(!empty( $detail[0])){
                $request->session()->put('t_id',$id);
                $detail = $detail[0];
            }
        }
       
       
        return view('layout.assets.editDbTeacher',compact('detail'));
    }
    public function postUpdateTeacher(Request $request){
        $teacher = new Teacher();
        $id =session('t_id');
        $dataInsert =[     
            $request->f_name,
            $request->l_name,
            $request->academic,
            $request->gender,
            $request->department,
            $request->t_phone,
            $request->t_email,
            $request->yearOfBirth,
          
        ];
        
       $teacher->updateTeacher($dataInsert,$id);
        return redirect()->route('admin.teacher')->with('msg','Cập nhật thành công');
    }
    public function detailTeacher(Request $request,$id=0){
        $teacher = new Teacher();

        if(!empty($id)){
            $detail = $teacher->getDetail($id);
            if(!empty( $detail[0])){
                $request->session()->put('t_id',$id);
                $detail = $detail[0];
            }
        }
       
       
        return view('layout.assets.detailTeacher',compact('detail'));
    }
    //Subject
    public function showSubject(){
        $subject = new Subject();

        $subjectList = $subject->getAllSubject();
        
        if($key=Request()->key){

            $subjectList= $subject->Search($key);
            return view('layout.assets.subjects',compact('subjectList'));
        }

        return view('layout.assets.subjects',compact('subjectList'));
    }
    public function addSubject(Request $request){
        $subject = new Subject();
        
        $dataInsert =[     
            $request->sbj_id ,
            $request->sbj_name,
            $request->credit_quantity,
            $request->department
        ];
       $subject->addSubject($dataInsert);
        
        return Redirect()->route('admin.Subject')->with('msg','thêm người dùng thành công');
    }
    public function deleteSubject($id=0){
        $subject = new Subject();

        $subjectList = $subject->deleteSubject($id);
        if($subjectList){
            $msg = 'xóa thành công';
           
        }else{
            $msg = 'xóa không thành công';
        }
        return redirect()->route('admin.Subject')->with('msg',$msg);
    }

}

