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
    // public $fillable = [
    //     'lName', 'lPrice', 'lDescription', 'brandID', 'screensizeID', 'processorID', 'vgaID', 'ramID', 'colorID',
    //     'ssdID', 'hddID', 'providerID'
    // ];

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class, 'brandID');
    }
    public function screensize() {
        return $this->belongsTo(Screensize::class, 'screensizeID');
    }
    public function processor() {
        return $this->belongsTo(Processor::class, 'processorID');
    }
    public function vga() {
        return $this->belongsTo(VGA::class, 'vgaID');
    }
    public function ram() {
        return $this->belongsTo(RAM::class, 'ramID');
    }
    public function color() {
        return $this->belongsTo(Color::class, 'colorID');
    }
    public function ssd() {
        return $this->belongsTo(SSD::class, 'ssdID');
    }
    public function provider() {
        return $this->belongsTo(Provider::class, 'providerID');
    }
    public function hdd() {
        return $this->belongsTo(HDD::class, 'hddID');
    }

    public function showAllLaptop() {
        $laptop = DB::table($this->table)
        ->select('laptop.id as laptopID','laptop.name as laptopName', 'laptop.stock as laptopStock', 'laptop.price as laptopPrice',
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

    /**
     * Get all of the necessary info of laptop for index page
     *
     * @var array<int, string>
     */

    public function showLaptop($id) {
        $laptop = DB::table($this->table)
        ->select('id' ,'name as name', 'price as price', 'description as description',
         'brandID as brand', 'screensizeID as screensize', 'processorID as processor',
         'vgaID as vga', 'ramID as ram', 'colorID as color', 'ssdID as ssd',
         'hddID as hdd', 'providerID as provider')
        ->where('id', '=', $id)
        ->get();

        return $laptop;
    }
    public function getImage()
    {
        $image = DB::table('image')
        ->select('*')
        ->get();
        return $image;
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
