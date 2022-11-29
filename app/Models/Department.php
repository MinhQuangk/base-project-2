<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Department extends Model
{
    use HasFactory;
    public function getAllDepartment($key=null){
        DB::enableQueryLog();
        $Department = DB::table('department')->select('*');
        if(!empty($key)){
           $Department = $Department->where(function($query) use ($key){
           
            $query->orWhere('department_name','like','%'.$key.'%');
            $query->orWhere('department_id','=',$key);
           });
        }
        
        
        
            $Department=$Department->get();
           
        // $sql=DB::getQueryLog();
        // dd($sql);
        return $Department;
    }
    public function addDepartment($data){
        $add_Department = DB::insert('INSERT INTO department (department_id,department_name,Dean) VALUES (?,?,?)',$data);

        return $add_Department;
    }
    // public function Search($key1=null,$key2=null){
    //    $search_Department = DB::table('Department')->select('*')->where('sbj_name','like',
    //    '%'.$key1.'%')->get();
    //    if(!empty($key2)){
    //     $search_Department=$search_Department->where('sbj_id','=',
    //     '%'.$key2.'%');
    //    }
    //    return $search_Department;
    // }
    public function deleteDepartment($id){
        $delete_Department=DB::table('department')->where('department_id','=',$id)->delete();
        return $delete_Department;
    }
}
