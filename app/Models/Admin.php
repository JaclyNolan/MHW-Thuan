<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public $table = 'admin';
    public $primaryKey = 'aID';
    public $fillable = [
        'aFullname', 'aEmail', 'aPassword', 'aPhoneNumber', 'aGender'
    ];
}
