<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    public $table = "doctors";

    protected $fillable = [
        'username',
        'email',
        'password',
        'dob',
        'gender',
        'address',
        'departmentname',
        'qualification',
        'experience',
        'room_no',
        'consultation_fee',
        'is_available',
        'city',
        'postal_code',
        'CV',
        'phone',
        'Avatar',
        'Bio',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = true;

    /**
     * Relationship: Doctor's Time Slots
     */
    public function timeSlots()
    {
        return $this->hasMany(DoctorTimeSlot::class, 'doctor_id');
    }

    /**
     * Relationship: Doctor's Weekly Schedule
     */
    public function schedules()
    {
        return $this->hasMany(DoctorSchedule::class, 'doctor_id');
    }

    /**
     * Relationship: Doctor's Appointments
     */
    public function appointments()
    {
        return $this->hasMany(appointment::class, 'username', 'username');
    }

    /**
     * Relationship: Doctor's Prescriptions
     */
    public function prescriptions()
    {
        return $this->hasMany(Prescription::class, 'doctor_id');
    }
}
