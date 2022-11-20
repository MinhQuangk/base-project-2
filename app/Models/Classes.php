<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Classes extends Model
{
    use HasFactory;
    protected $table = 'class';
    protected $fillable = [
        'class_id   ',
        'class_name',
        'quantity',
        'form_teacher',
        'monitor'
    ];
    public function getAllClass(){
        $Class = DB::select('SELECT * from class ORDER BY class_id');

        return $Class;
    }
    public function addClass($data){
        $add_Class = DB::insert('INSERT INTO class (class_id ,class_name,quantity,form_teacher,monitor) VALUES (?,?,?,?,?)',$data);

        return $add_Class;
    }
    public function Search($key){
       $search_Class = DB::table('class')->select('*')->where('class_id','like',
       '%'.$key.'%')->get();
       return $search_Class;
    }
    public function deleteClass($id){
        $delete_Class=DB::table('class')->where('class_id','=',$id)->delete();
        return $delete_Class;
    }
}
