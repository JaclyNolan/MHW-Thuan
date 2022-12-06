<?php

namespace App\Http\Controllers\front_end;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('front_end.contents.index');
    }

    public function shop()
    {
        return view('front_end.contents.shop');
    }

    public function cart()
    {
        return view('front_end.contents.cart');
    }

    public function checkout()
    {
        return view('front_end.contents.checkout');
    }

    public function shopdetails()
    {
        return view('front_end.contents.shopdetails');
    }
}
