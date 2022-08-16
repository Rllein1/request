<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class test extends Controller
{
    public function test(){
        return Auth::user()->role_id;
    }

}
