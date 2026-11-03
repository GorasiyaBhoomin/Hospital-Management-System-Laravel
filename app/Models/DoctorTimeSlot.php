<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorTimeSlot extends Model
{
    use HasFactory;

    protected $table = 'doctor_time_slots';

    protected $fillable = [
        'doctor_id',
        'day_of_week',
        'start_time',
        'end_time',
        'slot_display',
        'max_patients',
        'is_active',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctors::class, 'doctor_id');
    }
}

