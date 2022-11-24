<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\Notice;
use App\Models\Students;
use App\Models\Teacher;
use App\Models\Subject;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use League\CommonMark\Extension\Table\Table;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class DBcontroller extends Controller
{
    //student 
    const _perPage=6;
    public function showStudent(Request $request){
        
        $student = new Students();

        
        $key=null;
        if(!empty($request->key)){
            $key=$request->key;
         }
         $studentList = $student->getAllStudent($key,self::_perPage);
        return view('layout.assets.students',compact('studentList'));
    }
    public function addStudent(Request $request){
        $student = new Students();
        // if($request->isMethod('Post')){
        //     $validator = FacadesValidator ::make($request->all(),[
        //         's_name'=>'required',
        //         'birthday'=>'required|after_or_equal:'.date('Y-m-d H:i:s'),
        //         's_address'=>'required',
        //         'department'=>'required',
        //         's_class'=>'required|email',
        //         's_gender'=>'required|in:Nam,Nữ',
        //         'S_email'=>'required|email',

        //     ],['s_name.required'=>'họ và tên bắt buộc phải nhập',
        //         'birthday.required'=>'sinh nhật bắt buộc phải nhập',
        //         'department.required'=>'mã khoa bắt buộc phải nhập',
        //         's_class.required'=>'lớp buộc phải nhập',
        //         's_gender.required'=>'giới tích bắt buộc phải chọn',
        //         'S_email.required'=>'email bắt buộc phải nhập'
                
        //         ]);
        // }  
        // if($validator->fails()){
        //     return redirect()->back()->with('student_tabcontent', true)->withErrors($validator)->withInput(); 
        // }
        $dataInsert =[             
            $request->s_name,
            $request->birthday,
            $request->s_address,
            $request->department,
            $request->s_class,
            $request->s_gender,
            $request->s_phone,
            $request->S_email,
        ];
        // $student->s_name = $request->s_name;
        // $student->birthday = $request->birthday;
        // $student->s_address =$request->s_address;
        // $student->department =$request->department;
        // $student->s_class =$request->s_class;
        // $student->s_gender =$request->s_gender;
        // $student->s_phone =$request->s_phone;
        // $student->S_email =$request->S_email;
        // $student->save();
        
        $student->addStudent($dataInsert);
        if( $student){
            Toastr::success('Thêm sinh viên thành công ', 'Success');
        }else{
            Toastr::error('Thêm sinh viên thất bại', 'Fail');
        }
     
        
        return Redirect()->route('admin.showStudent');
    }
    public function deleteStudent($id=0){
        $student = new Students();

        $studentList = $student->deleteStudent($id);
        if( $studentList){
            Toastr::success('Xóa thành công ', 'Success');
        }else{
            Toastr::error('Xóa thất bại', 'Fail');
        }
        return redirect()->route('admin.showStudent');
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
            
        $student=$student->updateStudent($dataInsert,$id);
        if( $student){
            Toastr::success('Cập nhật thành công ', 'Success');
        }else{
            Toastr::error('Cập nhật thất bại', 'Fail');
        }

    //  
        return redirect()->route('admin.showStudent');
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
        if( $student){
            Toastr::success('Cập nhật tình trạng sinh viên thành công ', 'Success');
        }else{
            Toastr::error('Cập nhật tình trạng sinh viên thất bại', 'Fail');
        }
        return redirect()->route('admin.showStudent');
    }

    //teacher 

    // insert teacher
    public function showTeacher(){
        
        $teacher = new Teacher();
        $teacherlist=$teacher->getAllTeacher(self::_perPage);
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
        
       if( $teacher){
        Toastr::success('Thêm giáo viên mới thành công ', 'Success');
    }else{
        Toastr::error('Thêm giáo viên mới thất bại', 'Fail');
    }
        return Redirect()->route('admin.teacher');
    }
    public function deleteTeacher($t_id=0){
        $teacher = new Teacher();

        $teacherList = $teacher->deleteTeacher($t_id);
        if( $teacherList){
            Toastr::success('Xóa thành công ', 'Success');
        }else{
            Toastr::error('Xóa thất bại', 'Fail');
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
       if( $teacher){
        Toastr::success('Cập nhật giáo viên thành công ', 'Success');
    }else{
        Toastr::error('Cập nhật giáo viên thất bại', 'Fail');
    }
        return redirect()->route('admin.teacher');
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
    public function showSubject(Request $request){
        $subject = new Subject();
         $key=null;
       if(!empty($request->key)){
          $key=$request->key;
       }
        $subjectList = $subject->getAllSubject($key,self::_perPage);
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
       if( $subject){
        Toastr::success('Thêm môn học mới thành công ', 'Success');
    }else{
        Toastr::error('Thêm môn học mới thất bại', 'Fail');
    }
        return Redirect()->route('admin.Subject');
    }
    public function deleteSubject($id=0){
        $subject = new Subject();

        
        $subjectList = $subject->deleteSubject($id);
        if( $subjectList){
            Toastr::success('Xóa thành công ', 'Success');
        }else{
            Toastr::error('Xóa thất bại', 'Fail');
        }
        return redirect()->route('admin.Subject');
    }


    // Mark
    public function showMark(Request $request){
        $Mark = new Mark();

        $MarkList = $Mark->getAllScore();
        // $classes = DB::table('class')->select('class_id')->get();
        $key=null;
        $selected=[];
        if(!empty($request->type_scores)){
            $type=$request->type_scores;
            $selected[]=['mark.type','=',$type];
        }
        if(!empty($request->key)){
           $key=$request->key;
        }
        $MarkList = $Mark->getAllScore($key,$selected,self::_perPage);
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
        if( $Mark){
            Toastr::success('Nhập điểm thành công ', 'Success');
        }else{
            Toastr::error('Nhập điểm thất bại', 'Fail');
        }
        return Redirect()->route('admin.Mark');
    }
    public function deleteMark($id=0){
        $Mark = new Mark();

        $MarkList = $Mark->deleteScore($id);
        if( $MarkList){
            Toastr::success('Xóa thành công ', 'Success');
        }else{
            Toastr::error('Xóa thất bại', 'Fail');
        }
        return redirect()->route('admin.Mark');
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
        if( $mark){
            Toastr::success('Cập nhật thành công ', 'Success');
        }else{
            Toastr::error('Cập nhật thất bại', 'Fail');
        }
        return redirect()->route('admin.Mark');
    }


    // Class
    public function showCLass(Request $request){
        $class = new Classes();

       
        
        $key=null;
        if(!empty($request->key)){
           $key=$request->key;
        }
        $classList = $class->getAllClass($key,self::_perPage);
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
       if( $class){
        Toastr::success('Thêm lớp mới thành công ', 'Success');
    }else{
        Toastr::error('Thêm lớp mới thất bại', 'Fail');
    }
        return Redirect()->route('admin.Class');
    }
    public function deleteClass($id=0){
        $class = new Classes();

        
        $classList = $class->deleteClass($id);
        if( $classList){
            Toastr::success('Xóa thành công ', 'Success');
        }else{
            Toastr::error('Xóa thất bại', 'Fail');
        }
        return redirect()->route('admin.Class');
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
        if( $class){
            Toastr::success('Cập nhật thành công ', 'Success');
        }else{
            Toastr::error('Cập nhật thất bại', 'Fail');
        }
        return redirect()->route('admin.Class');
    }

    //Exam
    public function showExam(){
        $exam = new Exam();
        $examList = $exam->getAllExam(self::_perPage);
        
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
       if($exam){
        Toastr::success('Thêm lịch thi mới thành công ', 'Success');
    }else{
        Toastr::error('Thêm lịch thi mới thất bại', 'Fail');
    }
        return Redirect()->route('admin.Exam');
    }
    public function deleteExam($id=0){
        $exam = new Exam();
        
        $examList = $exam->deleteExam($id);
        if( $examList){
            Toastr::success('Xóa thành công ', 'Success');
        }else{
            Toastr::error('Xóa thất bại', 'Fail');
        }
        return redirect()->route('admin.Exam');
    }

    //thông báo 

    public function  showNotice(Request $request){
        $Notice = new Notice();
       
        
        $key=null;
        if(!empty($request->key)){
           $key=$request->key;
        }
        $NoticeList = $Notice->getAllNotice($key,self::_perPage);
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
    if( $Notice){
        Toastr::success('Thêm thông báo mới thành công ', 'Success');
    }else{
        Toastr::error('Thêm thông báo mới thất bại', 'Fail');
    }
        return Redirect()->route('admin.Notices');
    }
    public function deleteNotice($id=0){
        $Notice = new Notice();
        
        $NoticeList = $Notice->deleteNotice($id);
        if( $NoticeList){
            Toastr::success('Xóa thành công ', 'Success');
        }else{
            Toastr::error('Xóa thất bại', 'Fail');
        }
        return redirect()->route('admin.Notices');
    }
}

