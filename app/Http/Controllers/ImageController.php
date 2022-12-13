<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Laptop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $request->validate([
            'laptop_id' => 'required',
            'url' => 'nullable|required_without_all:image|url|max:256',
            'image' => 'nullable|required_without_all:url|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        // //Store in Storage Folder
        // $request->image->storeAs('images', $imageName);

        // // Store in S3
        // $request->image->storeAs('images', $imageName, 's3');

        //Store Image in DB

        $image = new Image();
        $image->laptop_id = $request->laptop_id;
        if ($request->url == null) {
            $imageName = time() . '.' . $request->image->extension();
            $image->name = $imageName;
            $image->url = null;
            // Public Folder
            $request->image->move(public_path('img'), $imageName);
        } else {
            $image->url = $request->url;
            $image->name = null;
        }

        $image->save();

        return redirect()->route('admin.image.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::find($id)->toArray();
        if ($image['url'] == null) {
            $image['name'] = asset('img/' . $image['name']);
            //this is coded in such a scumy way but
            //I am out of brain juice so I'm gonna leave this as it
        } else {
            $image['name'] = $image['url'];
        }
        $laptop = Laptop::all()->toArray();
        return view('admin.image.edit', compact('image', 'laptop'));
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
            'url' => 'string|url|max:256',
        ]);

        // //Store in Storage Folder
        // $request->image->storeAs('images', $imageName);

        // // Store in S3
        // $request->image->storeAs('images', $imageName, 's3');

        //Store Image in DB

        $image = Image::find($id);
        $image->laptop_id = $request->laptop_id;
        $image->url = $request->url;

        $image->save();

        return redirect()->route('admin.image.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        if (!empty($image->name)) {
            File::delete(public_path('img/' . $image->name));
            if (!File::exists(public_path('img/' . $image->name))) {
                $image->delete();
                return back()->with('success', 'Image sucessfully deleted');
            } else {
                return back()->with('failure', 'Image unsucessfully deleted');
            }
        } else {
            $image->delete();
            return back()->with('success', 'Image sucessfully deleted');
        }
    }
}
