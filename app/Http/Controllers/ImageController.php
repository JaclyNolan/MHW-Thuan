<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Laptop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ImageController extends Controller
{
    // View File To Upload Image
    public function index()
    {
        $image = Image::all()->toArray();
        foreach ($image as &$item) {
            if ($item['url'] == '') {
                $item['url'] = asset('img/' . $item['name']);
            }
            if ($item['name'] == '') {
                $item['name'] = "Using URL";
            }
            $laptop = Laptop::find($item['laptop_id']);
            if ($laptop) {
                $item['laptop_id'] = $laptop->name;
            }
        }
        unset($item);
        return view('admin.image.index', compact('image'));
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
        return view('admin.image.create', compact('laptop'));
    }

    // Store Image
    public function store(Request $request)
    {
        dump($request->image, $request->url);
        $request->validate([
            'laptop_id' => 'required',
            'url' => 'nullable|required_without_all:image|url|max:256',
            'image' => 'nullable|required_without_all:url|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = time() . '.' . $request->image->extension();



        // //Store in Storage Folder
        // $request->image->storeAs('images', $imageName);

        // // Store in S3
        // $request->image->storeAs('images', $imageName, 's3');

        //Store Image in DB

        $image = new Image();
        $image->laptop_id = $request->laptop_id;
        if ($request->url == null) {
            $image->name = $imageName;
            $image->url = null;
        } else {
            $image->url = $request->url;
            $image->name = null;
        }

        $image->save();

        // Public Folder
        $request->image->move(public_path('img'), $imageName);

        return redirect()->route('admin.image.index');
    }




    // public function store(Request $request, $table_name)
    // {
    //     $rules = $this -> rule[$table_name];
    //     $validator = Validator::make($request->all(), $rules);
    //     if ($validator->fails()) {
    //         return redirect()->back()
    //             ->withErrors($validator)
    //             ->withInput($request->input());
    //     }
    //     $model = $this -> model[$table_name];
    //     foreach ($request->except('_token') as $column_name => $column_value) {
    //         $model[$column_name] = $column_value;
    //     }
    //     $model->save();

    //     return redirect()->route('admin.simple.index', $table_name);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($table_name, $id)
    {
        if ($this->model->get($table_name)) {
            $array = $this->model[$table_name]::find($id)->toArray();
            return view('admin.simple.edit', compact('array', 'table_name'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $table_name, $id)
    {
        $rules = $this->rule[$table_name];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }
        $model = $this->model[$table_name]::find($id);
        foreach ($request->except('_token') as $column_name => $column_value) {
            $model[$column_name] = $column_value;
        }
        $model->save();

        return redirect()->route('admin.simple.index', $table_name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($table_name, $id)
    {
        $model = $this->model[$table_name]::find($id);
        $model->delete();
        return back();
    }
}
