<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LaptopImage extends Model
{
    use HasFactory;
    public $table = 'laptopimage';
    public $timestamps = false;
    public $primaryKey = ['laptop_id', 'image_id'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'laptop_id',
        'image_id'
    ];

    public function laptop() {
        return $this->belongsTo(Laptop::class, 'laptop_id');
    }

    public function image() {
        return $this->belongsTo(Image::class, 'image_id');
    }

    public function getTableColumns()
    {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];
}
