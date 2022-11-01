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
        $brand = $this -> laptop -> getBrand();
        $screensize = $this -> laptop -> getScreensize();
        $processor = $this -> laptop -> getProcessor();
        $vga = $this -> laptop -> getVGA();
        $ram = $this -> laptop -> getRAM();
        $color = $this -> laptop -> getColor();
        $ssd = $this -> laptop -> getSSD();
        $hdd = $this -> laptop -> getHDD();
        $provider = $this -> laptop -> getProvider();
        return view('admin.laptop.create', compact('brand','screensize', 'processor', 'vga', 'ram', 'color', 'ssd', 'hdd', 'provider'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        $data['laptop'] = Laptop::find($id);
        return view('admin.laptop.edit', $data);
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
            "fullname" => 'required',
            "email" => 'required|email',
            "password" => 'required|confirmed|min:6',
            "phone_number" => 'required|min:8|max:11',
            "gender" => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }
        // $admin = new Admin;
        // $admin->aFullname = $request->fullname;
        // $admin->aEmail = $request->email;
        // $admin->aPassword = Hash::make($request->password);
        // $admin->aPhoneNumber = $request->phone_number;
        // $admin->aGender = $request->gender;
        // $admin->save();

        return redirect()->route('admin.admin.index');
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
            "fullname" => 'required',
            "email" => 'required|email',
            "password" => 'confirmed|min:6',
            "phone_number" => 'required|min:8|max:11',
            "gender" => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }
        // $admin = Admin::find($id);
        // $admin->aFullname = $request->fullname;
        // $admin->aEmail = $request->email;
        // if ($request->password == null or $request->password == "") $admin->aPassword = Hash::make($request->password);
        // $admin->aPhoneNumber = $request->phone_number;
        // $admin->aGender = $request->gender;
        // $admin->save();

        return redirect()->route('admin.admin.index');
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
        // $admin = Admin::find($id);
        // $admin->delete();
        // return back();
    }
}
