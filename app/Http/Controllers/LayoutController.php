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
    public function admin(){
        return view('Account.admin');
    }
    public function expenses(){
        return view('layout.assets.expenses');
    }
    public function class(){
        return view('layout.assets.class');
    }
    public function scores(){
        return view('layout.assets.scores');
    }
    public function subjects(){
        return view('layout.assets.subjects');
    }
}
