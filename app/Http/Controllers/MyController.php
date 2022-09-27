<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function index()
    {
        return view('admin.layout.index');
    }

    public function demo()
    {
        return view('demo');
    }

    public function postForm(Request $request)
    {
        echo $request ->username;
        echo $request ->password;
    }
    public function getData()
    {
        $data['user'] = ['Jacly', 'Viola', 'Nak', 'Tom', 'Ryn'];
        return view('home', $data);
    }
}
