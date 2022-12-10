<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Front_end\LaptopModel;
use App\Models\Front_end\ImageModel;
use DB;

class CartController extends Controller
{
    public function cart()
    {
        return view('front_end.contents.cart');
    }
    public function addtocart($id) 
    {
        $product = LaptopModel::find($id); 
        $product01 = ImageModel::find($id); 

        if(!$product) 
        {
            abort(404); 
        } 

        $cart = session()->get('cart');
        // if cart is empty then this the first product 
        if(!$cart) 
        { 

            $cart = 
            [ 
                $id => 
                [ 
                    "name" => $product->name, 
                    "Stock" => 1, 
                    "price" => $product->price, 
                    "name" => $product01->name
                ] 
            ]; 

            session()->put('cart', $cart); 

            return view('front_end.contents.cart');
        } 

        // if cart not empty then check if this product exist then increment quantity 
        if(isset($cart[$id])) 
        { 
            $cart[$id]['Stock']++; 

            session()->put('cart', $cart); 

            return view('front_end.contents.cart', ['msg' => 'Product added to cart successfully!']); 
        } 
        // if item not exist in cart then add to cart with quantity = 1 
        $cart[$id] = 
        [ 
            "name" => $product->name, 
            "Stock" => 1, 
            "price" => $product->price, 
            // "name" => $product01->name
        ]; 

        session()->put('cart', $cart); 

        return view('front_end.contents.cart', ['msg' => 'Product added to cart successfully!']); 
    }

    // public function delete(Request $request)
    // {
    //     if ($request->id) 
    //     {
    //         $cart = session()->get('cart');

    //         if (isset($cart[$request->id])) 
    //         {
    //             unset($cart[$request->id]);

    //             session()->put('cart', $cart); 
    //         }
    //         return view('front_end.contents.cart', ['msg' => 'Delete successfully!']);
    //     }
    // }

    // public function updatecart(Request $request)
    // {
    //     if ($request->id and $request->id) 
    //     {
    //         $cart = session()->get('cart');

    //         $cart[$request->id]["pQuantity"] = $request->pQuantity;

    //         session()->put('cart', $cart);

    //         $subTotal = $cart[$request->id]['pQuantity'] * $cart[$request->id]['pPrice'];

    //         $total = $this->getCartTotal();

    //         dd($cart);

    //         return view('Font_end.content.shoppingcart', ['msg' => 'Cart updated successfully!', 'total' => $total, '$subTotal' => $subTotal]);
    //     }
    // }
}
