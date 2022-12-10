<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Models\Image;
use Illuminate\Http\Request;
use SNMP;

class HomeController extends Controller
{
    public function __construct()
    {
        $this ->laptop = new Laptop();
    }
    public function index()
    {
        $laptop = $this -> laptop -> showAllLaptop();
        $image = $this->laptop->getImage();
       
        return view('front_end.contents.index', compact('laptop', 'image'));
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

    public function shopdetails(Request $request)
    {
        // $laptop = $this -> laptop -> showAllLaptop();
        // $image = $this->laptop->getImage();
        // return view('front_end.contents.shopdetails', compact('laptop', 'image'));

        $ProductDetail = Laptop::WHERE('id',$request->id)->first();
        $ProductDetailimg = Image::WHERE('id',$request->id)->first();


        return view('front_end.contents.shopdetails', compact('ProductDetail','ProductDetailimg'));
    }
}
