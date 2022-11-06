<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    public function addUsers(){
        $user=DB::insert('INSERT INTO users(username,password,phone,email)');
        return $user;
    }
}
