<?php

namespace App\Models\Front_end;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ImageModel extends Model
{
    use HasFactory;
    public $table = 'image';
    public $primaryKey = 'id';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'url'
    ];

    public function laptop() {
        return $this->belongsTo(Laptop::class, 'laptop_id');
    }

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function getImage() {
        if ($this->url == "") {
            return asset('images/' . $this->name);
        }
        elseif ($this->name == "") {
            return $this->url;
        }
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

    ];
}
