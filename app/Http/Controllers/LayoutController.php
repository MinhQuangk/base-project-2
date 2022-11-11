<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutController extends Controller
{
    //
    public function dashboard(){
        return view('layout.assets.dashboard');
    }
    public function exam(){
        return view('layout.assets.exam');
    }
    public function teacher(){
        return view('layout.assets.teachers');
    }
    public function student(){
        return view('layout.assets.students');
    }
    public function schedule(){
        return view('layout.assets.schedule');
    }
    public function noctices(){
        return view('layout.assets.noctices');
    }
}
