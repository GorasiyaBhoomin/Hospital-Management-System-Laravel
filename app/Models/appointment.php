<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class appointment extends Model
{
    use HasFactory;
    use Notifiable;

    public $table = "appointment";

    protected $fillable = [
        'user_id',
        'appointmentname',
        'email',
        'phone',
        'gender',
        'departmentname',
        'username',
        'date',
        'day',
        'time',
        'message',
        'Status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function prescription()
    {
        return $this->hasOne(Prescription::class, 'appointment_id');
    }
}
