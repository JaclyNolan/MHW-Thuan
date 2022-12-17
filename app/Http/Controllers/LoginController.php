<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('admin.login');
    }
    public function postLogin(Request $request)
    {
        $arr = ['email' =>$request->email, 'aPassword'=>$request->password];
        if(Auth::attempt($arr))
        {
            return redirect()->route('ListUser');
        }
        else{
            dd('Failed');
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->intended('login');
    }
}
