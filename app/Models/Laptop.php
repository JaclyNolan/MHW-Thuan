<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Laptop extends Model
{
    use HasFactory;
    public $table = 'laptop';
    public $primaryKey = 'laptopID';
    // public $fillable = [
    //     'lName', 'lPrice', 'lDescription', 'brandID', 'screensizeID', 'processorID', 'vgaID', 'ramID', 'colorID',
    //     'ssdID', 'hddID', 'providerID'
    // ];
    public function showAllLaptop() {
        $laptop = DB::table($this->table)
        ->select('laptop.laptopID as laptopID','laptop.name as laptopName', 'laptop.price as laptopPrice',
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
    public function getBrand() {
        $brand = DB::table($this->table)
        ->select('brand.*');
        return $brand;
    }
    public function getProcessor() {
        $processor = DB::table($this->table)
        ->select('processor.*');
        return $processor;
    }
    public function getScreensize() {
        $screensize = DB::table($this->table)
        ->select('screensize.*');
        return $screensize;
    }
    public function getVGA() {
        $vga = DB::table($this->table)
        ->select('vga.*');
        return $vga;
    }
    public function getRAM() {
        $ram = DB::table($this->table)
        ->select('ram.*');
        return $ram;
    }
    public function getColor() {
        $color = DB::table($this->table)
        ->select('color.*');
        return $color;
    }
    public function getSSD() {
        $ssd = DB::table($this->table)
        ->select('ssd.*');
        return $ssd;
    }
    public function getHDD() {
        $hdd = DB::table($this->table)
        ->select('hdd.*');
        return $hdd;
    }
    public function getProvider() {
        $provider = DB::table($this->table)
        ->select('provider.*');
        return $provider;
    }
}
