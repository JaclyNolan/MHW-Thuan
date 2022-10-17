<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::all();
        return view('admin.admin.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return view('admin.admin.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        $data['admin'] = Admin::find($id);
        return view('admin.admin.edit', $data);
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
        $admin = new Admin;
        $admin->aFullname = $request->fullname;
        $admin->aEmail = $request->email;
        $admin->aPassword = Hash::make($request->password);
        $admin->aPhoneNumber = $request->phone_number;
        $admin->aGender = $request->gender;
        $admin->save();

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
        $admin = Admin::find($id);
        $admin->aFullname = $request->fullname;
        $admin->aEmail = $request->email;
        if ($request->password == null or $request->password == "") $admin->aPassword = Hash::make($request->password);
        $admin->aPhoneNumber = $request->phone_number;
        $admin->aGender = $request->gender;
        $admin->save();

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
        $admin = Admin::find($id);
        $admin->delete();
        return back();
    }
}
