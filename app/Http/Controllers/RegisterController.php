<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('admin.register');
    }
    public function postRegister(Request $request)
    {
      $admins = new Admin();
      $admins ->aFullname = $request->username;
      $admins ->aEmail = $request->email;
      $admins ->aGender =$request->gender;
      $admins ->aPassword = Hash::make($request->password);
      $admins ->aPhonenumber = $request->phone_number;
      $admins ->save();
      return redirect()->route('admin.login')->with('Successful', 'Successfully created');
    }
}
