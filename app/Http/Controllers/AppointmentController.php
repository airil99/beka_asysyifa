<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Consultation;

class AppointmentController extends Controller
{
    // Show the list of appointments
    public function index()
    {
        $appointments = Appointment::with(['user', 'package'])->get();
        return view('appointment.index', compact('appointments'));
    }

    // Show consultation details for a selected appointment
    public function showConsultation($id)
    {
        // Find the appointment
        $appointment = Appointment::findOrFail($id);
    
        // Find the consultation linked to the customer
        $consultation = Consultation::where('user_id', $appointment->user_id)->first();
    
        // Check if consultation exists
        if (!$consultation) {
            return redirect()->route('appointment.index')->with('error', 'Consultation details not found.');
        }
    
        // Return the consultation view
        return view('appointment.consultation', compact('appointment', 'consultation'));
    }
}