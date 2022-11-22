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
      $admins = new User();
      $admins ->username = $request->username;
      $admins ->email = $request->email;
      $admins ->role =$request->role;
      $admins ->password = Hash::make($request->password);
      $admins ->save();
      return redirect()->back()->with('Successful', 'Successfully created');
    }
}
