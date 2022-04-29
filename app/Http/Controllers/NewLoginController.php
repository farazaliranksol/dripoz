<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewLoginController extends Controller
{
    public function logout(){
        dd('hello ');
                Auth::logout();
        return view('auth.login')->with('error','Your account is inactive.');
    }
}
