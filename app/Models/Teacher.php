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

}
