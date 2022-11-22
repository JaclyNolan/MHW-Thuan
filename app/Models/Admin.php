<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Admin as Authenticatable;
class Admin extends Authenticatable
{
    use HasFactory;
    public $table = 'admin';
    public $primaryKey = 'aID';
    public $timestamps=false;

}
