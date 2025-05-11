<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Appointment;

class CustomerAppointmentController extends Controller
{
    // Display all available packages
    public function index()
    {
        $packages = Package::all();
        return view('customer.appointment.index', compact('packages'));
    }

    // Show the booking form
    public function showBookingForm($id)
    {
        $package = Package::findOrFail($id);

        // Collect booked time slots to exclude from dropdown
        $fullTimes = Appointment::where('date', now()->toDateString()) // Today's date for real-time checks
            ->select('time', 'gender')
            ->get()
            ->groupBy('time')
            ->filter(function ($bookings) {
                return $bookings->pluck('gender')->contains('Male') 
                    && $bookings->pluck('gender')->contains('Female');
            })
            ->keys()
            ->toArray();

        return view('customer.appointment.book', compact('package', 'fullTimes'));
    }

    // Handle appointment confirmation
    public function confirmBooking(Request $request)
    {
        // Check for existing bookings
        $existingMale = Appointment::where('date', $request->date)
            ->where('time', $request->time)
            ->where('gender', 'Male')
            ->exists();

        $existingFemale = Appointment::where('date', $request->date)
            ->where('time', $request->time)
            ->where('gender', 'Female')
            ->exists();

        if (($request->gender == 'Male' && $existingMale) || 
            ($request->gender == 'Female' && $existingFemale)) {
            return back()->with('error', 'This time slot is already full. Please choose another time.');
        }

        // Create the appointment if slot is available
        Appointment::create([
            'user_id' => auth()->id(),
            'package_id' => $request->package_id,
            'date' => $request->date,
            'time' => $request->time,
            'gender' => $request->gender,
            'consultation_filled' => true,
        ]);

        return redirect()->route('customer.appointment.showBookingForm', ['id' => $request->package_id])
            ->with('success', 'Appointment booked successfully! Please proceed to the payment section to complete your booking.');
    }

    // Redirect to the booking form for a selected package
    public function book($id)
    {
        $package = Package::findOrFail($id);

        return redirect()->route('customer.appointment.showBookingForm', ['id' => $id]);
    }
}
