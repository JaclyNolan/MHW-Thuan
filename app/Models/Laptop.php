<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Laptop extends Model
{
    use HasFactory;
    public $table = 'laptop';
    public $primaryKey = 'id';

    /**
     * Get all of images that belong to all laptops
     *
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, Model>
     * The Images Model belong to the laptop
     */

    /**
     * Get all of images that belong to the laptop
     *
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, Model>
     * The Images Model belong to the laptop
     */

    public function getImageInfoOfLaptop() {
        $laptopImage_models = LaptopImage::all()
        ->where('laptop_id', '=', $this->id);
        $return = array();
        foreach ($laptopImage_models as $laptopImage_model) {
            array_push($return, $laptopImage_model->image);
        }
        return $return;
    }

    /**
     * Get all of images that belong to the laptop
     *
     *
     * @return array<string> A list of image's urls belong to the laptop
     */

    public function getImageURLOfLaptop()
    {
        $laptopImage_models = LaptopImage::all()
        ->where('laptop_id', '=', $this->id);
        $return = array();
        foreach ($laptopImage_models as $laptopImage_model) {
            array_push($return, $laptopImage_model->image->getImage());
        }
        return $return;
    }

    public function showAllLaptop() {
        $laptop = DB::table($this->table)
        ->select('laptop.id as laptopID','laptop.name as laptopName', 'laptop.price as laptopPrice',
         'brand.name as brandName', 'screensize.size as screenSize', 'processor.name as processorName',
         'vga.name as vgaName', 'ram.size as ramSize', 'color.name as colorName', 'ssd.size as ssdSize',
         'hdd.size as hddSize', 'provider.name as providerName')
        ->join('brand', 'laptop.brandID', '=', 'brand.id')
        ->join('screensize', 'laptop.screensizeID', '=', 'screensize.id')
        ->join('processor', 'laptop.processorID', '=', 'processor.id')
        ->join('vga', 'laptop.vgaID', '=', 'vga.id')
        ->join('ram', 'laptop.ramID', '=', 'ram.id')
        ->join('color', 'laptop.colorID', '=', 'color.id')
        ->join('ssd', 'laptop.ssdID', '=', 'ssd.id')
        ->join('hdd', 'laptop.hddID', '=', 'hdd.id')
        ->join('provider', 'laptop.providerID', '=', 'provider.id')
        ->get();

        return $laptop;
    }
    public function findLaptop($id) {
        $laptop = DB::table($this->table)
        ->select('id' ,'name as name', 'price as price', 'description as description',
         'brandID as brand', 'screensizeID as screensize', 'processorID as processor',
         'vgaID as vga', 'ramID as ram', 'colorID as color', 'ssdID as ssd',
         'hddID as hdd', 'providerID as provider')
        ->where('id', '=', $id)
        ->get();

        return $laptop;
    }
    public function getLaptopSpec() {
        $data['brand'] = DB::table('brand')
        ->select('brand.*')->get();
        $data['processor'] = DB::table('processor')
        ->select('processor.*')->get();
        $data['screensize'] = DB::table('screensize')
        ->select('screensize.*')->get();
        $data['vga'] = DB::table('vga')
        ->select('vga.*')->get();
        $data['ram'] = DB::table('ram')
        ->select('ram.*')->get();
        $data['color'] = DB::table('color')
        ->select('color.*')->get();
        $data['ssd'] = DB::table('ssd')
        ->select('ssd.*')->get();
        $data['hdd'] = DB::table('hdd')
        ->select('hdd.*')->get();
        $data['provider'] = DB::table('provider')
        ->select('provider.*')->get();

        return $data;
    }
}
