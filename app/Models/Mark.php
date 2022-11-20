<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Mark extends Model
{
    use HasFactory;
    protected $table = 'mark';
    protected $fillable = [
        'sbj_id   ',
        's_class',
        's_id',
        'mark',
        'type',
        'department'
    ];
    public function getAllScore(){
        $Score = DB::select(' SELECT mark.m_id  ,student.s_name,student.s_id,mark.s_class,subject.sbj_name,mark.type,mark.mark,mark.created_at FROM student,subject,mark WHERE mark.s_id=student.s_id AND mark.sbj_id=subject.sbj_id ORDER BY s_name' );

        return $Score;
    }
    public function addScore($data){
        $add_Score = DB::insert('INSERT INTO mark (sbj_id ,s_class,s_id,department,mark,type) VALUES (?,?,?,?,?,?)',$data);

        return $add_Score;
    }
    public function Search($key){
       $search_Score = DB::select(' SELECT mark.m_id  ,student.s_name,student.s_id,mark.s_class,subject.sbj_name,mark.type,mark.mark,mark.created_at FROM student,subject,mark WHERE mark.s_id=student.s_id AND mark.sbj_id=subject.sbj_id and student.s_id = '.$key.' ORDER BY s_name');
       return $search_Score;
    }
    public function deleteScore($id){
        $delete_Score=DB::table('mark')->where('m_id','=',$id)->delete();
        return $delete_Score;
    }
}
