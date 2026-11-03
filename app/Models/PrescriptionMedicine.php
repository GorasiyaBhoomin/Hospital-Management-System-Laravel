<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionMedicine extends Model
{
    use HasFactory;

    public $table = 'prescription_medicines';

    protected $fillable = [
        'prescription_id',
        'medicine_name',
        'dosage',
        'frequency',
        'duration',
        'route',
        'instructions',
    ];

    /**
     * Relationship: Parent prescription
     */
    public function prescription()
    {
        return $this->belongsTo(Prescription::class, 'prescription_id');
    }
}

