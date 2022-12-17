<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    public $table ="slide";

    public $primaryKey = 'sildeID';

    public $incrementing = false;

    protected $keyType = 'string';
    
    public $fillable = [
    
    'silde_name','slide_image'
    
    ];
    
    public $timestamps=false;
}
