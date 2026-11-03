<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    public $table = 'prescriptions';

    protected $fillable = [
        'prescription_number',
        'appointment_id',
        'doctor_id',
        'patient_id',
        'symptoms',
        'symptoms_duration',
        'diagnosis',
        'clinical_notes',
        'medical_history',
        'allergies',
        'medical_advice',
        'follow_up_required',
        'follow_up_date',
        'additional_instructions',
        'status',
        'issued_at',
    ];

    protected $casts = [
        'follow_up_required' => 'boolean',
        'follow_up_date' => 'date',
        'issued_at' => 'datetime',
    ];

    /**
     * Relationship: Medicines prescribed
     */
    public function medicines()
    {
        return $this->hasMany(PrescriptionMedicine::class, 'prescription_id');
    }

    /**
     * Relationship: Associated consultation appointment
     */
    public function appointment()
    {
        return $this->belongsTo(appointment::class, 'appointment_id');
    }

    /**
     * Relationship: Consulting specialist doctor
     */
    public function doctor()
    {
        return $this->belongsTo(Doctors::class, 'doctor_id');
    }

    /**
     * Relationship: Registered Patient user (if registered)
     */
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    /**
     * Check if finalized / issued
     */
    public function isIssued()
    {
        return strtolower($this->status) === 'issued';
    }

    /**
     * Check if draft
     */
    public function isDraft()
    {
        return strtolower($this->status) === 'draft';
    }

    /**
     * Generate standard official prescription identifier
     */
    public static function generatePrescriptionNumber($appointmentId)
    {
        return 'RX-' . date('Y') . '-' . str_pad($appointmentId, 5, '0', STR_PAD_LEFT);
    }
}
