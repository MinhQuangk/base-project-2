<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\Notice;
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
        
        // $dataInsert =[     
            
        //     $student->s_name = $request->s_name,
        //     $request->birthday,
        //     $request->s_address,
        //     $request->department,
        //     $request->s_class,
        //     $request->s_gender,
        //     $request->s_phone,
        //     $request->S_email,

           
        // ];
        $student->s_name = $request->s_name;
        $student->birthday = $request->birthday;
        $student->s_address =$request->s_address;
        $student->department =$request->department;
        $student->s_class =$request->s_class;
        $student->s_gender =$request->s_gender;
        $student->s_phone =$request->s_phone;
        $student->S_email =$request->S_email;
        $student->save();
        
    //    $student->addStudent($dataInsert);
        
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
    public function detailStudent(Request $request,$id=0){
        $student = new Students();
        if(!empty($id)){
            $detail = $student->getDetail($id);
            if(!empty( $detail[0])){
                $request->session()->put('s_id',$id);
                $detail = $detail[0];
            }
        }
       
       
        return view('layout.assets.detailStudent',compact('detail'));
    }

    public function updateStatusStudent(Request $request){
        $student = new Students();
         $id =$request->s_id;
        $dataInsert =[  
              
            $request->credits,
            // $request->birthday,
            $request->point_training,
            $request->average,
            $request->GPA,
            
            $request->achievements,
            $request->status,
            
        ];
       
        $student->updateDetailStudent($dataInsert,$id);
        
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
        $teacher->save();
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


    // Mark
    public function showMark(){
        $Mark = new Mark();

        $MarkList = $Mark->getAllScore();
        // $classes = DB::table('class')->select('class_id')->get();
        if($key=Request()->key){

            $MarkList= $Mark->Search($key);
          
            return view('layout.assets.Scores',compact('MarkList'));
        }
        
        return view('layout.assets.Scores',compact('MarkList'));
    }
    public function addMark(Request $request){
        $Mark = new Mark();
        
    //     $dataInsert =[     
    //         $request->sbj_id ,
    //         $request->sbj_name,
    //         $request->credit_quantity,
    //         $request->department
    //     ];
    //    $Mark->addMark($dataInsert);

        $Mark->sbj_id=$request->sbj_id ;
        $Mark->s_class=$request->s_class;
        $Mark->s_id=$request->s_id;
        $Mark->mark=$request->mark;
        $Mark->type=$request->type;
        $Mark->department=$request->department;
        $Mark->save();
        return Redirect()->route('admin.Mark')->with('msg','nhập điểm thành công');
    }
    public function deleteMark($id=0){
        $Mark = new Mark();

        $MarkList = $Mark->deleteScore($id);
        if($MarkList){
            $msg = 'xóa thành công';
           
        }else{
            $msg = 'xóa không thành công';
        }
        return redirect()->route('admin.Mark')->with('msg',$msg);
    }

    public function getUpdateMark(Request $request,$id=0){
        $mark = new Mark();

        if(!empty($id)){
            $detail = $mark->getDetail($id);
            if(!empty( $detail[0])){
                $request->session()->put('m_id',$id);
                $detail = $detail[0];
            }
        }
       
       
        return view('layout.assets.editDbScores',compact('detail'));
    }
    public function postUpdateMark(Request $request){
       $mark = new Mark();
        $id =session('m_id');
        $dataInsert =[        
        $request->mark
        ];
        
       $mark->updateMark($dataInsert,$id);
        return redirect()->route('admin.Mark')->with('msg','Cập nhật thành công');
    }


    // Class
    public function showCLass(){
        $class = new Classes();

        $classList = $class->getAllClass();
        
        if($key=Request()->key){

            $classList= $class->Search($key);
            return view('layout.assets.class',compact('classList'));
        }

        return view('layout.assets.class',compact('classList'));
    }
    public function addClass(Request $request){
        $class = new Classes();
        
        $dataInsert =[     
            $request->class_id ,
            $request->class_name,
            $request->quantity,
            $request->form_teacher,
            $request->monitor
        ];
       $class->addClass($dataInsert);
        
        return Redirect()->route('admin.Class')->with('msg','thêm người dùng thành công');
    }
    public function deleteClass($id=0){
        $class = new Classes();

        
        $classList = $class->deleteClass($id);
        if($classList){
            $msg = 'xóa thành công';
           
        }else{
            $msg = 'xóa không thành công';
        }
        return redirect()->route('admin.Class')->with('msg',$msg);
    }
    public function getUpdateClass(Request $request,$id=0){
        $class = new Classes();

        if(!empty($id)){
            $detail = $class->getDetail($id);
            if(!empty( $detail[0])){
                $request->session()->put('class_id',$id);
                $detail = $detail[0];
            }
        }
       
       
        return view('layout.assets.editDbClass',compact('detail'));
    }
    public function postUpdateClass(Request $request){
        $class = new Classes();
        $id =session('class_id');
        $dataInsert =[     
            
            
            $request->quantity,
            $request->form_teacher,
            $request->monitor
          
        ];
        
       $class->updateClass($dataInsert,$id);
        return redirect()->route('admin.Class')->with('msg','Cập nhật thành công');
    }

    //Exam
    public function showExam(){
        $exam = new Exam();
        $examList = $exam->getAllExam();
        
        if($key=Request()->key){

            $examList= $exam->Search($key);
            return view('layout.assets.exam',compact('examList'));
        }

        return view('layout.assets.exam',compact('examList'));
    }
    public function addExam(Request $request){
        $exam = new Exam();
        
        $dataInsert =[     
            $request->sbj_id,
            $request->years,
            $request->type,
            $request->times,
            $request->exam_date,
            $request->exam_time,
            $request->s_class,
        ];
       $exam->addExam($dataInsert);
        
        return Redirect()->route('admin.Exam')->with('msg','thêm lịch thi mới thành công thành công');
    }
    public function deleteExam($id=0){
        $exam = new Exam();
        
        $examList = $exam->deleteExam($id);
        if($examList){
            $msg = 'xóa thành công';
           
        }else{
            $msg = 'xóa không thành công';
        }
        return redirect()->route('admin.Exam')->with('msg',$msg);
    }

    //thông báo 

    public function showNotice(){
        $Notice = new Notice();
        $NoticeList = $Notice->getAllNotice();
        
        if($key=Request()->key){

            $NoticeList= $Notice->Search($key);
            return view('layout.assets.Notice',compact('NoticeList'));
        }
        // dd($NoticeList);
        return view('layout.assets.notices',compact('NoticeList'));
    }
    public function addNotice(Request $request){
        $Notice = new Notice();
        
            
          if(!empty($request)){
            $Notice->post_by=$request->post_by;
            $Notice->title=$request->title;
            $Notice->detail_notice=$request->detail_notice;
           $Notice->save();
          }
    
    //    $Notice->addNotice($dataInsert);
        
        return Redirect()->route('admin.Notices')->with('msg','thêm thông báo mới thành công thành công');
    }
    public function deleteNotice($id=0){
        $Notice = new Notice();
        
        $NoticeList = $Notice->deleteNotice($id);
        if($NoticeList){
            $msg = 'xóa thành công';
           
        }else{
            $msg = 'xóa không thành công';
        }
        return redirect()->route('admin.Notice')->with('msg',$msg);
    }
}

