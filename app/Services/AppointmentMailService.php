<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\appointment;

class AppointmentMailService
{
    /**
     * Send email when appointment is booked / requested
     *
     * @param appointment $appointment
     * @return bool
     */
    public static function sendBookingAcknowledgment(appointment $appointment)
    {
        if (empty($appointment->email)) {
            return false;
        }

        $data = [
            'appointmentname' => $appointment->appointmentname ?: 'Valued Patient',
            'email'           => $appointment->email,
            'phone'           => $appointment->phone,
            'gender'          => $appointment->gender,
            'departmentname'  => $appointment->departmentname ?: ($appointment->department ?: 'Clinical Speciality'),
            'username'        => $appointment->username ?: ($appointment->doctor ?: 'Specialist Doctor'),
            'date'            => $appointment->date,
            'time'            => $appointment->time,
            'message'         => $appointment->message,
            'Status'          => $appointment->Status ?: 'Pending',
        ];

        try {
            Mail::send('emails.send_email_view_home_appointment', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'], $data['appointmentname'])
                        ->subject('Appointment Request Received - KK Patel Super Speciality Hospital');
            });
            Log::info("Booking acknowledgment email sent successfully to {$data['email']} for Appointment #{$appointment->id}");
            return true;
        } catch (\Throwable $e) {
            Log::error('Failed to send appointment booking acknowledgment email: ' . $e->getMessage(), [
                'appointment_id' => $appointment->id,
                'email'          => $appointment->email,
                'exception'      => $e->getMessage()
            ]);
            return false;
        }
    }

    /**
     * Send email notification when appointment status is updated (Approved / Rejected / Cancelled)
     *
     * @param appointment $appointment
     * @return bool
     */
    public static function sendStatusUpdateNotification(appointment $appointment)
    {
        if (empty($appointment->email)) {
            return false;
        }

        $st = strtolower(trim((string)$appointment->Status));

        // We notify on Approved, Rejected, and Cancelled
        if (!in_array($st, ['approved', 'rejected', 'cancelled'])) {
            return false;
        }

        $data = [
            'appointmentname' => $appointment->appointmentname ?: 'Valued Patient',
            'email'           => $appointment->email,
            'phone'           => $appointment->phone,
            'gender'          => $appointment->gender,
            'departmentname'  => $appointment->departmentname ?: ($appointment->department ?: 'Clinical Speciality'),
            'username'        => $appointment->username ?: ($appointment->doctor ?: 'Specialist Doctor'),
            'date'            => $appointment->date,
            'time'            => $appointment->time,
            'message'         => $appointment->message,
            'Status'          => ucfirst($st),
        ];

        try {
            if ($st === 'approved') {
                Mail::send('emails.send_email_appointment_approved', ['data' => $data], function ($message) use ($data) {
                    $message->to($data['email'], $data['appointmentname'])
                            ->subject('Appointment Confirmed & Approved - KK Patel Hospital');
                });
                Log::info("Appointment Approved email sent successfully to {$data['email']} for Appointment #{$appointment->id}");
            } else {
                Mail::send('emails.send_email_appointment_rejected', ['data' => $data], function ($message) use ($data) {
                    $message->to($data['email'], $data['appointmentname'])
                            ->subject('Appointment Scheduling Update - KK Patel Hospital');
                });
                Log::info("Appointment Rejected/Cancelled email sent successfully to {$data['email']} for Appointment #{$appointment->id}");
            }
            return true;
        } catch (\Throwable $e) {
            Log::error('Failed to send appointment status update email: ' . $e->getMessage(), [
                'appointment_id' => $appointment->id,
                'email'          => $appointment->email,
                'status'         => $appointment->Status,
                'exception'      => $e->getMessage()
            ]);
            return false;
        }
    }
}
