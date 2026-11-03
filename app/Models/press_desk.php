<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class press_desk extends Model
{
    use HasFactory;
    public $table="press_desk";

    protected $fillable = [
        'pressimage',
        'description',
        
    ];
    public $timestamp=false;

}
