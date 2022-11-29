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
    public function getAllClass($key=null,$perPage=null){
        $Class = DB::table('class')->select('*')->orderBy('class_id');
        if(!empty($key)){
            $Class = $Class->where(function($query) use ($key){
             $query->orWhere('class_id','like','%'.$key.'%');
             $query->orWhere('class_name','like','%'.$key.'%');
             $query->orWhere('form_teacher','like','%'.$key.'%');
            });
         }
         
            $Class=$Class->get();
           
        return $Class;
    }
    public function addClass($data){
        $add_Class = DB::insert('INSERT INTO class (class_id ,class_name,quantity,form_teacher,monitor) VALUES (?,?,?,?,?)',$data);

        return $add_Class;
    }
    // public function Search($key){
    //    $search_Class = DB::table('class')->select('*')->where('class_id','like',
    //    '%'.$key.'%')->get();
    //    return $search_Class;
    // }
    public function deleteClass($id){
        $delete_Class=DB::table('class')->where('class_id','=',$id)->delete();
        return $delete_Class;
    }
    public function updateClass($data,$id){
        $data = array_merge($data,[$id]);
        $update_Class=DB::insert('UPDATE class set quantity=?,form_teacher=?,monitor=? where class_id =? ',$data);
        return $update_Class;
    }
    public function getDetail($id){
        return DB::select('SELECT * FROM class WHERE class_id = ? ',[$id]);    
    }
}
