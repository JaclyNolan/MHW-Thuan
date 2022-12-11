<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // View File To Upload Image
    public function index()
    {
        $order = Order::all()->toArray();
        foreach ($order as &$item) {
            $laptop = Laptop::find($item['laptop_id']);
            if ($laptop) {
                $item['laptop_id'] = $laptop->name;
            }
        }
        unset($item);
        return view('admin.order.index', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $laptop = Laptop::all()->toArray();
        return view('admin.order.create', compact('laptop'));
    }

    // Store Image
    public function store(Request $request)
    {
        $request->validate([
            'laptop_id' => 'required',
            'customer_name' => 'required',
            'customer_address' => 'required',
            'customer_phonenumber' => 'required|numeric',
            'old_price' => 'required|numeric',
            'quanity' => 'required|numeric',
        ]);

        // //Store in Storage Folder
        // $request->image->storeAs('images', $imageName);

        // // Store in S3
        // $request->image->storeAs('images', $imageName, 's3');

        //Store Image in DB

        $order = new Order();
        $order->laptop_id = $request->laptop_id;
        $order->customer_name = $request->customer_name;
        $order->customer_address = $request->customer_address;
        $order->customer_phonenumber = $request->customer_phonenumber;
        $order->old_price = $request->old_price;
        $order->quanity = $request->quanity;
        $order->total = $order->old_price * $order->quanity;

        $order->save();

        return redirect()->route('admin.order.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id)->toArray();
        $laptop = Laptop::all()->toArray();
        return view('admin.order.edit', compact('order', 'laptop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'laptop_id' => 'required',
            'customer_name' => 'required',
            'customer_address' => 'required',
            'customer_phonenumber' => 'required|numeric',
            'old_price' => 'required|numeric',
            'quanity' => 'required|numeric',
        ]);

        // //Store in Storage Folder
        // $request->image->storeAs('images', $imageName);

        // // Store in S3
        // $request->image->storeAs('images', $imageName, 's3');

        //Store Image in DB

        $order = Order::find($id);
        $order->laptop_id = $request->laptop_id;
        $order->customer_name = $request->customer_name;
        $order->customer_address = $request->customer_address;
        $order->customer_phonenumber = $request->customer_phonenumber;
        $order->old_price = $request->old_price;
        $order->quanity = $request->quanity;
        $order->total = $order->old_price * $order->quanity;

        $order->save();

        return redirect()->route('admin.order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return back();
    }
    ///////////////////////////////////////////////////////////
    //User Side

    public function getFind()
    {
        return view('front_end.contents.order');
    }
    public function postFind(Request $request)
    {
        $request->validate([
            'customer_phonenumber' => 'required|numeric',
        ]);

        $customer_phonenumber = $request->customer_phonenumber;
        $order = Order::where("customer_phonenumber", "=", $request->customer_phonenumber)->get();
        if ($order->isEmpty()) {
            //is empty -> phonenumber is invalid
            return redirect('order')->with('failure', 'Phonenumber is invalid');
        } else {
            //is not empty -> phonenumber is valid
            return view('front_end.contents.orderResult', compact('order', 'customer_phonenumber'));
        }
    }
}
