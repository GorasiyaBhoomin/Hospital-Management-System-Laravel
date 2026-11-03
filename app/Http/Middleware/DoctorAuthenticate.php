<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctors;

class DoctorAuthenticate
{
    /**
     * Handle an incoming request for doctor portal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if doctor is logged in via guard or session
        if (Auth::guard('doctor')->check()) {
            return $next($request);
        }

        if ($request->session()->has('doctor_id')) {
            $doctor = Doctors::find($request->session()->get('doctor_id'));
            if ($doctor) {
                Auth::guard('doctor')->login($doctor);
                return $next($request);
            }
        }

        // Not authenticated -> redirect to doctor login
        return redirect()->route('doctor.login')->with('error', 'Please log in to access the Doctor Panel.');
    }
}

