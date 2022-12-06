<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this ->laptop = new Laptop();
    }

    public function index()
    {
        $laptop = $this -> laptop -> showAllLaptop();
        return view('admin.laptop.index', compact('laptop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        $laptop_specs = $this -> laptop -> getLaptopSpec();
        return view('admin.laptop.create', compact('laptop_specs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        $laptop_specs = $this -> laptop -> getLaptopSpec();
        $laptop_info = Laptop::find($id); //all of ids from laptop found using $id
        return view('admin.laptop.edit', compact('laptop_specs', 'laptop_info'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function postCreate(Request $request)
    {
        $rules = array(
            "name" => 'required',
            "price" => 'required|numeric',
            "description" => 'required',
            "*" => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }
        $laptop = new Laptop;
        $laptop->name = $request->name;
        $laptop->price = $request->price;
        $laptop->description = $request->description;
        foreach ($request->except('_token','name','price','description') as $laptop_spec_name => $laptop_spec_id) {
            $laptop[$laptop_spec_name . "ID"] = $laptop_spec_id;
        }
        $laptop->timestamps = false;
        $laptop->save();

        return redirect()->route('admin.laptop.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEdit(Request $request, $id)
    {
        $rules = array(
            "name" => 'required',
            "price" => 'required|numeric',
            "description" => 'required',
            "*" => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }
        $laptop = Laptop::find($id);
        $laptop->name = $request->name;
        $laptop->price = $request->price;
        $laptop->description = $request->description;
        foreach ($request->except('_token','name','price','description') as $laptop_spec_name => $laptop_spec_id) {
            $laptop[$laptop_spec_name . "ID"] = $laptop_spec_id;
        }
        $laptop->timestamps = false;
        $laptop->save();

        return redirect()->route('admin.laptop.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laptop = Laptop::find($id);
        $laptop->delete();
        return back();
    }
}
