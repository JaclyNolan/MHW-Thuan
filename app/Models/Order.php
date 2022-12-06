<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $table = 'orders';
    public $primaryKey = 'id';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'customer_name',
        'customer_address',
        'customer_phonenumber',
        'old_price',
        'quanity',
        'total'
    ];

    public function laptop() {
        return $this->belongsTo(Laptop::class, 'laptop_id');
    }
}
