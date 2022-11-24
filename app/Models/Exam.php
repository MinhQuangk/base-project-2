<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Exam extends Model
{
    use HasFactory;
    protected $table = 'exam';
    protected $fillable = [
        'exam_id    ',
        'sbj_id',
        'years',
        'type',
        'times',
        'exam_date',
        'exam_time',
        's_class',
        
    ];
    public function getAllExam($perPage=null){
        // $Exam = DB::select('SELECT exam.exam_id,subject.sbj_name,exam.type,exam.s_class,exam.exam_date,exam.exam_time,exam.times FROM exam,s
        // ubject WHERE exam.sbj_id=subject.sbj_id ORDER By exam.exam_id ');
        $Exam=DB::table('exam')
        ->join('subject','exam.sbj_id','=','subject.sbj_id')
        ->select('exam.exam_id','subject.sbj_name','exam.type','exam.s_class','exam.exam_date','exam.exam_time','exam.times')
        ->orderBy('exam.exam_id');

        if(!empty($perPage)){
            $Exam=$Exam->paginate($perPage);
           }else{
            $Exam=$Exam->get();
           }
        return $Exam;
    }
    public function addExam($data){
        $add_Exam = DB::insert('INSERT INTO exam (sbj_id ,years,type,times,exam_date,exam_time,s_class) VALUES (?,?,?,?,?,?,?)',$data);

        return $add_Exam;
    }
    public function Search($key){
       $search_Exam = DB::select("SELECT exam.exam_id,subject.sbj_name,exam.type,exam.s_class,exam.exam_date,exam.exam_time,exam.times FROM exam,subject WHERE exam.sbj_id=subject.sbj_id and subject.sbj_name LIKE '%".$key."%' ORDER BY exam.exam_id");
       return $search_Exam;
    }
    public function deleteExam($id){
        $delete_Exam=DB::table('exam')->where('exam_id','=',$id)->delete();
        return $delete_Exam;
    }
}
