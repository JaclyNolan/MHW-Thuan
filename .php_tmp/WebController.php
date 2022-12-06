<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blank(){
        return view('font_end.layout.index');
    }

    public function tracking() {
        return view('font_end.tracking.tracking');
    }
   
}