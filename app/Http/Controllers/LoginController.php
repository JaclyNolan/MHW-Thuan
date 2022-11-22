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
        $arr = ['username' =>$request->username, 'password'=>$request->password];
        if(Auth::attempt($arr))
        {
            dd('Successful');
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
