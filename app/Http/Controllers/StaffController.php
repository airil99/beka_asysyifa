<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Appointment; // Import Appointment model
use App\Models\ClientRecord; // If you have ClientRecord model
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        // Get the authenticated staff user
        $user = Auth::user();

        // Ensure the user is a staff member
        if ($user && $user->role === 'staff') {
            // Fetch appointments assigned to the staff member
            $appointments = Appointment::where('staff_id', $user->id)
                ->orderBy('booking_time', 'asc')
                ->get();

            // Fetch client records if needed
            $clientRecords = ClientRecord::where('staff_id', $user->id)->get();

            // Return the staff dashboard view with the necessary data
            return view('staff.dashboard', compact('user', 'appointments', 'clientRecords'));
        }

        // Redirect to login if not authorized
        return redirect()->route('login')->with('error', 'Unauthorized access!');
    }

    // Method for showing the profile edit form
    public function edit()
    {
        $user = auth()->user();

        // Ensure the user is a staff member
        if ($user->role !== 'staff') {
            return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
        }

        return view('staff.profile', compact('user'));
    }

    // Method for updating the profile
    public function update(Request $request)
    {
        $user = auth()->user();

        // Ensure the user is a staff member
        if ($user->role !== 'staff') {
            return redirect()->route('home')->with('error', 'You are not authorized to update this profile.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:15',
            'gender' => 'nullable|in:male,female',
            'dob' => 'nullable|date',
            'address' => 'nullable|string',
        ]);

        // Update the user data
        $user->update($request->only('name', 'email', 'phone', 'gender', 'dob', 'address'));

        return redirect()->route('staff.profile')->with('success', 'Profile updated successfully.');
    }
}
