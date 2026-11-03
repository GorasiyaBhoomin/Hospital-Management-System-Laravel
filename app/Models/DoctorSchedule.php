<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    use HasFactory;

    protected $table = 'doctor_schedules';

    protected $fillable = [
        'doctor_id',
        'day_name',
        'morning_start',
        'morning_end',
        'evening_start',
        'evening_end',
        'is_day_off',
        'notes',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctors::class, 'doctor_id');
    }
}

