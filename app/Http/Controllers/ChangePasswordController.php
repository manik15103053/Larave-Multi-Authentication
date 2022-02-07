<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;
use App\Models\User;

class ChangePasswordController extends Controller
{
    public function passwordChanger(){
        return view('admin.pages.settings.change-password');
    }
    public function updatePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required'
        ]);
        $hasher = Sentinel::getHasher();
        $old_password = $request->old_password;
        $password = $request->password;
        $confirm_password = $request->confirm_password;
        $user = Sentinel::getUser();
        if(!$hasher->check($old_password , $user->password)){
            return back()->with('error','Old Password Not match');
        }elseif ($password != $confirm_password){
            return back()->with('error','New Password and Confirm Password not match');
        }else {
            Sentinel::update($user,array('password' => $password));
            return back()->with('success','Password Change Successfully.');
        }
    }
    public function forgetPassword(){
        return view('admin.auth.forget-password');
    }
    public function reset(){
        return view('admin.auth.reset-password');
    }
    public function resetPassword(Request $request){
        $user = User::whereEmail($request->email)->get();
        if($user->count() == 0){
            return redirect()->back()->with('error','email not fount');
        }else{
            return redirect()->route('reset');
//            return "ok";
        }
    }
}
