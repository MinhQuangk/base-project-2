<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Notice extends Model
{
    use HasFactory;
    protected $table = 'notice';
    protected $fillable = [
        'notice_id    ',
        'post_by',
        'title',
        'detail_notice',
        'created_at'
    ];
    public function getAllNotice(){
        $Notice = DB::select('SELECT * from notice' );

        return $Notice;
    }
    // public function addNotice($data){
    //     $add_Notice = DB::insert('INSERT INTO notice (post_by,title,detail_notice) VALUES (?,?,?)',$data);

    //     return $add_Notice;
    // }
    // public function Search($key){
    //    $search_Notice = DB::select(' SELECT mark.m_id  ,student.s_name,student.s_id,mark.s_class,subject.sbj_name,mark.type,mark.mark,mark.created_at FROM student,subject,mark WHERE mark.s_id=student.s_id AND mark.sbj_id=subject.sbj_id and student.s_id = '.$key.' ORDER BY s_name');
    //    return $search_Notice;
    // }
    // public function deleteNotice($id){
    //     $delete_Notice=DB::table('mark')->where('m_id','=',$id)->delete();
    //     return $delete_Notice;
    // }
}
