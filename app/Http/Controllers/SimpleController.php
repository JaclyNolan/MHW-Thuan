<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Color;
use App\Models\HDD;
use App\Models\Processor;
use App\Models\Provider;
use App\Models\RAM;
use App\Models\Screensize;
use App\Models\SSD;
use App\Models\VGA;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class SimpleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->model = new Collection([
            "brand" => new Brand,
            "color" => new Color,
            "processor" => new Processor,
            "provider" => new Provider,
            "ram" => new RAM,
            "screensize" => new Screensize,
            "hdd" => new HDD,
            "ssd" => new SSD,
            "vga" => new VGA
        ]);

        $this->rule = new Collection([
            "brand" => array(
                "*" => 'required'
            ),
            "color" => array(
                "hex_value" => 'min:6|max:6',
                "*" => 'required'
            ),
            "processor" => array(
                "*" => 'required'
            ),
            "provider" => array(
                "*" => 'required'
            ),
            "ram" => array(
                "*" => 'required'
            ),
            "screensize" => array(
                "*" => 'required'
            ),
            "hdd" => array(
                "*" => 'required'
            ),
            "ssd" => array(
                "*" => 'required'
            ),
            "vga" => array(
                "*" => 'required'
            )
        ]);
    }

    public function index($table_name)
    {
        if ($this->model->get($table_name)) {
            $array = $this->model[$table_name]->select("*")->get()->toArray();

            return view('admin.simple.index', compact('array', 'table_name'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($table_name)
    {
        if ($this->model->get($table_name)) {
            $array = $this->model[$table_name]->getTableColumns();

            return view('admin.simple.create', compact('array', 'table_name'));
        } else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $table_name)
    {
        $rules = $this -> rule[$table_name];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }
        $model = $this -> model[$table_name];
        foreach ($request->except('_token') as $column_name => $column_value) {
            $model[$column_name] = $column_value;
        }
        $model->save();

        return redirect()->route('admin.simple.index', $table_name);
    }

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
        $rules = $this -> rule[$table_name];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }
        $model = $this -> model[$table_name]::find($id);
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
        $model = $this -> model[$table_name]::find($id);
        $model->delete();
        return back();
    }
}
