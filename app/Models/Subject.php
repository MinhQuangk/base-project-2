<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Subject extends Model
{
    use HasFactory;

    public function getAllSubject($key=null){
        DB::enableQueryLog();
        $subject = DB::table('subject')->select('*');
        if(!empty($key)){
           $subject = $subject->where(function($query) use ($key){
            $query->orWhere('sbj_name','like','%'.$key.'%');
            $query->orWhere('sbj_id','like','%'.$key.'%');
            
           });
        }
        
        
        $subject=$subject->get();
        $sql=DB::getQueryLog();
        // dd($sql);
        return $subject;
    }
    public function addSubject($data){
        $add_subject = DB::insert('INSERT INTO subject (sbj_id ,sbj_name,credit_quantity,department) VALUES (?,?,?,?)',$data);

        return $add_subject;
    }
    // public function Search($key1=null,$key2=null){
    //    $search_subject = DB::table('subject')->select('*')->where('sbj_name','like',
    //    '%'.$key1.'%')->get();
    //    if(!empty($key2)){
    //     $search_subject=$search_subject->where('sbj_id','=',
    //     '%'.$key2.'%');
    //    }
    //    return $search_subject;
    // }
    public function deleteSubject($id){
        $delete_subject=DB::table('subject')->where('sbj_id','=',$id)->delete();
        return $delete_subject;
    }
}
