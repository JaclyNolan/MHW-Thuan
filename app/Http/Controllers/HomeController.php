<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Models\Image;
use App\Models\Brand;
use Illuminate\Http\Request;
use SNMP;
use App\Models\Front_end\LaptopModel;
use App\Models\Front_end\ImageModel;

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

    public function checkout(Request $request)
    {
        
        $ProductDetail = LaptopModel::WHERE('id',$request->id)->first();
        return view('front_end.contents.checkout',  compact('ProductDetail'));
    }

    public function shopdetails(Request $request)
    {
        // $laptop = $this -> laptop -> showAllLaptop();
        // $image = $this->laptop->getImage();
        // return view('front_end.contents.shopdetails', compact('laptop', 'image'));

        $ProductDetail = LaptopModel::WHERE('id',$request->id)->first();
        $ProductDetailimg = Image::WHERE('laptop_id',$request->id)->first();
        // $ProductDetailBrand = Brand::WHERE('id',$request->id)->first();
        

        return view('front_end.contents.shopdetails', compact('ProductDetail','ProductDetailimg'));
    }
}
