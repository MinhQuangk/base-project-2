<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Students extends Model
{
    use HasFactory;
    protected $table = 'student';

    public function getAllStudent(){
        $student = DB::select('SELECT * FROM student ');

        return $student;
    }
    public function addStudent($data){
        $add_student = DB::insert('INSERT INTO student (s_name,birthday,s_address,department,s_class,s_gender,s_phone,S_email) VALUES (?,?,?,?,?,?,?,?)',$data);

        return $add_student;
    }
}
