<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use Exception;
// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\MockObject\DuplicateMethodException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use File;

class SlideController extends Controller
{

    protected function Validator()
    {
        return
            [
                'slide_image' => ['required|image'],
            ];
    }
    public function index()

    {

        $slide = slide::paginate(10);

        return view('admin.slide.index', compact("slide"));
    }

    public function getCreate()

    {
        return view('admin.slide.Create');
    }

    //Hàm store để thêm dữ liệu

    public function postCreate(Request $request)

    {
        try {


            $slides = new Slide;

            $slides->silde_name = $request->slide_name;
            $name = $request->slide_name;
            if ($request->hasFile('slide_image')) {
                $file = $request->slide_image;
                $ext = $file->Extension();
                $file_name = $name . '_1' . '_' . rand() . time() . '.' . $ext;
                $file->move(public_path('storage\slides'), $file_name);
            }
            $slides->slide_image = $file_name;
            $slides->save();
            return redirect()->route('admin.slide.index')->with('status', 'Slide created successfully.');
        } catch (DuplicateMethodException) {
            throw new Exception("This Slide is already existed");
        }
    }



    public function getEditCate($sildeID)

    {

        $data['cate'] = Slide::find($sildeID);

        return view('admin.slide.edit', $data);
    }

    public function postEditCate(Request $request, $sildeID)

    {
        

        $slides = new Slide;

        $slides->slide_name = $request->slide_name;
        $name = $request->slide_name;
        if ($request->has('slide_image')) {
            $file = $request->slide_image;
            $ext = $file->Extension();
            $file_name = $name . '_1' . '_' . rand() . time() . '.' . $ext;
            $file->move(public_path('storage\slides'), $file_name);
        }
        $slides->slide_image = $file_name;
        $slides->save();
        return redirect()->route('admin.slide.index');
    }

    public function delete($sildeID)

    {

        $slides = Slide::find($sildeID);
        $slide_image=$slides->slide_image;
        $path=public_path('storage\slides/');
        unlink($path.$slide_image);
        $slides->delete();
        return back();
    }
}


