<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Models\Order;
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

    public function checkout($id, $quantity)
    {
        
        $ProductDetail = Laptop::WHERE('id',$id)->first();
        return view('front_end.contents.checkout',  compact('ProductDetail', 'quantity'));
    }

    public function postCheckout(Request $request, $id, $quantity) {
        $request->validate([
            'customer_phonenumber' => 'required|numeric',
            'customer_name' => 'required',
            'customer_address' => 'required'
        ]);

        $laptop = Laptop::where('id', $request->id)->first();

        $laptop->stock = $laptop->stock - $quantity;

        $order = new Order();
        $order->laptop_id = $laptop->id;
        $order->customer_name = $request->customer_name;
        $order->customer_address = $request->customer_address;
        $order->customer_phonenumber = $request->customer_phonenumber;
        $order->old_price = $laptop->price;
        $order->quanity = $quantity;
        $order->total = $order->old_price * $order->quanity;

        $order->save();

        return (redirect('order')->with('success', 'Order has been successfully placed'));
    }

    public function postShopDetails(Request $request) {
        return redirect('FrontEnd/checkout/id=' . $request->id . '&quantity=' . $request->quantity);
    }

    public function shopdetails(Request $request)
    {
        // $laptop = $this -> laptop -> showAllLaptop();
        // $image = $this->laptop->getImage();
        // return view('front_end.contents.shopdetails', compact('laptop', 'image'));

        $ProductDetail = Laptop::WHERE('id',$request->id)->first();
        // $ProductDetailBrand = Brand::WHERE('id',$request->id)->first();
    

        return view('front_end.contents.shopdetails', compact('ProductDetail'));
    }
}
