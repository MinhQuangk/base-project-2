<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Students extends Model
{
    use HasFactory;
    protected $table = 'student';

    protected $fillable = [
        's_id   ',
        's_name',
        'S_email',
        's_class',
        's_phone'
    ];
    public function getAllStudent(){
        $student = DB::select('SELECT * FROM student ORDER BY s_name ');

        return $student;
    }
    public function addStudent($data){
        $add_student = DB::insert('INSERT INTO student (s_name,birthday,s_address,department,s_class,s_gender,s_phone,S_email) VALUES (?,?,?,?,?,?,?,?)',$data);

        return $add_student;
    }
    public function Search($key){
       $search_student = DB::table('student')->select('*')->where('s_name','like',
       '%'.$key.'%')->get();
       return $search_student;
    }
    public function deleteStudent($id){
        $delete_student=DB::table('student')->where('s_id','=',$id)->delete();
        return $delete_student;
    }
    public function updateStudent($data,$id){
        $data = array_merge($data,[$id]);
        $update_student=DB::insert('UPDATE student set s_name = ?,s_address=?,department=?,s_class=?,s_phone=?,S_email=? where s_id =? ',$data);
        return $update_student;
    }
    public function getDetail($id){
        return DB::select('SELECT * FROM student WHERE s_id = ? ',[$id]);
        
        
    }
}
