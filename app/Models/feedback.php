<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;
    public $table="feedback";

    // protected $fillable = [
    //     'pressimage',
    //     'description',
        
    // ];
    public $timestamp=false;

}
