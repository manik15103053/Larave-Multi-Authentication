<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Sentinel;
use Session;
use Illuminate\Http\Request;
class AuthController extends Controller
{
    public function loginForm(){
        return view('admin.auth.login');
    }
    public function registrationForm(){
        return view('admin.auth.registration');
    }
    public function store(Request $request){
        $request->validate([
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'email' => 'required|unique:users',
            'mobile' => 'required|min:11|numeric',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
        ]);
//        dd($request->all());
        $user = Sentinel::registerAndActivate($request->all());
        $role= Sentinel::findRoleByslug('manager');
        $role->users()->attach($user);
        return redirect('/')->with(['message' => 'Registration Successfully']);
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
       try{
           $user = Sentinel::authenticate($request->all());
           if($user == Sentinel::check()){
               $user_type = Sentinel::getUser()->roles()->first()->slug;
               if($user_type == 'admin'){
                   return redirect()->route('dashboard');
               }elseif ($user_type == 'manager'){
                   return redirect()->route('registration.form');
               }
           }else{
               return back()->with(['message' => 'Oops! Email or password not match']);
           }
       }catch (ThrottlingException $e){
           $delay = $e->getDelay();
           $min = floor($delay/60);
           return back()->with(['message' => 'You are a suspend for ' .$min. ' minutes' ]);
       }
    }
    public function logout(){
        Sentinel::logout();
        return redirect()->route('login.form');
    }
}
