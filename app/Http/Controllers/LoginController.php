<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            if(Auth::user()->role_id==1){
                return redirect()->route('form.index');
            };
            if(Auth::user()->role_id==2){
                return redirect()->route('form-head.index');
            };
           return redirect()->route('form-office.index');
        }
        return redirect()->route('loginpage');

    }
}
