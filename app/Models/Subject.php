<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Subject extends Model
{
    use HasFactory;

    public function getAllSubject(){
        $subject = DB::select('SELECT * FROM subject ');

        return $subject;
    }
    public function addSubject($data){
        $add_subject = DB::insert('INSERT INTO subject (sbj_id ,sbj_name,credit_quantity,department) VALUES (?,?,?,?)',$data);

        return $add_subject;
    }
    public function Search($key){
       $search_subject = DB::table('subject')->select('*')->where('sbj_name','like',
       '%'.$key.'%')->get();
       return $search_subject;
    }
    public function deleteSubject($id){
        $delete_subject=DB::table('subject')->where('sbj_id','=',$id)->delete();
        return $delete_subject;
    }
}
