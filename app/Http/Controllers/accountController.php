<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class accountController extends Controller
{
    public function __construct()
    {
        
    }
    public function login(){
        return view('Account.login');
    }
    public function signUp(){
        return view('Account.signUp');
    }
    public function Index(){
        return view('layout.index');
    }
}
