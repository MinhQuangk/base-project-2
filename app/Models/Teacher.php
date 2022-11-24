<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teacher';

    protected $fillable = [
        't_id   ',
        'f_name',
        'l_name',
        't_email',
        'academic',
        't_phone'
    ];

    public function addTeacher($data){
        $add_teacher = DB::insert('INSERT INTO teacher (f_name,l_name,academic,gender,department,t_phone,t_email,yearOfBirth,avatar) VALUES (?,?,?,?,?,?,?,?,?)',$data);

        return $add_teacher;
    }

    public function getAllTeacher($perPage=null){
        // $teacher = DB::select('SELECT * FROM teacher ORDER by l_name');
        $teacher=DB::table('teacher')->select('*')->orderBy('l_name');


        if(!empty($perPage)){
            $teacher=$teacher->paginate($perPage);
           }else{
            $teacher=$teacher->get();
           }
        return $teacher;
    }
    public function Search($key){
        $search_teacher = DB::table('teacher')->select('*')->where('l_name','like',
        '%'.$key.'%')->get();
        return $search_teacher;
     }
     public function deleteTeacher($id){
         $delete_teacher=DB::table('teacher')->where('t_id','=',$id)->delete();
         return $delete_teacher;
     }
     public function updateTeacher($data,$id){
         $data = array_merge($data,[$id]);
         $update_teacher=DB::insert('UPDATE teacher set f_name = ?,l_name=?,academic=?,gender=?,department=?,t_phone=?,t_email=?,yearOfBirth=? where t_id =? ',$data);
         return $update_teacher;
     }
     public function getDetail($id){
         return DB::select('SELECT * FROM teacher WHERE t_id = ? ',[$id]);
         
         
     }
}
