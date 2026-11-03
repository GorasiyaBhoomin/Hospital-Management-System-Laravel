<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;
    public $table="doctors";

    protected $fillable = [
        'username',
        'email',
        'dob',
        'gender',
        'address',
        'departmentname',
        'city',
        'postal_code',
        'CV',
        'phone',
        'Avatar',
        'Bio',
    ];
    public $timestamp=false;
}
