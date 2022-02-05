<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm(){
        return view('admin.auth.login');
    }
    public function registrationForm(){
        return view('admin.auth.registration');
    }
}
