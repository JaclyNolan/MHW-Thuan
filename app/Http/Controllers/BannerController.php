<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    // View File To Upload Image
    public function index()
    {
        $banner = Banner::all()->toArray();
        foreach ($banner as &$item) {
            if ($item['url'] == '') {
                $item['url'] = asset('img/' . $item['name']);
            }
            if ($item['name'] == '') {
                $item['name'] = "Using URL";
            }
        }
        unset($item);
        return view('admin.banner.index', compact('banner'));
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
        return view('admin.banner.create');
    }

    // Store Image
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'nullable|required_without_all:image|url|max:256',
            'image' => 'nullable|required_without_all:url|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        // //Store in Storage Folder
        // $request->image->storeAs('images', $imageName);

        // // Store in S3
        // $request->image->storeAs('images', $imageName, 's3');

        //Store Image in DB

        $banner = new Banner();
        $banner->is_actived = $request->boolean('is_actived');
        if ($request->url == null) {
            $imageName = time() . '.' . $request->image->extension();
            $banner->name = $imageName;
            $banner->url = null;
            // Public Folder
            $request->image->move(public_path('img'), $imageName);
        } else {
            $banner->url = $request->url;
            $banner->name = null;
        }

        $banner->save();

        return redirect()->route('admin.banner.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::find($id)->toArray();
        if ($banner['url'] == null) {
            $banner['name'] = asset('img/' . $banner['name']);
            //this is coded in such a scumy way but
            //I am out of brain juice so I'm gonna leave this as it
        } else {
            $banner['name'] = $banner['url'];
        }
        return view('admin.banner.edit', compact('banner'));
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
            'url' => 'string|url|max:256',
        ]);

        // //Store in Storage Folder
        // $request->image->storeAs('images', $imageName);

        // // Store in S3
        // $request->image->storeAs('images', $imageName, 's3');

        //Store Image in DB

        $banner = Banner::find($id);
        $banner->is_actived = $request->boolean('is_actived');
        $banner->url = $request->url;

        $banner->save();

        return redirect()->route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        if (!empty($banner->name)) {
            File::delete(public_path('img/' . $banner->name));
            if (!File::exists(public_path('img/' . $banner->name))) {
                $banner->delete();
                return back()->with('success', 'Banner sucessfully deleted');
            } else {
                return back()->with('success', 'Banner unsucessfully deleted');
            }
        } else {
            $banner->delete();
            return back()->with('success', 'Banner sucessfully deleted');
        }
    }
}
