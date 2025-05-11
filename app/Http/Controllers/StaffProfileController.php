<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffProfileController extends Controller
{
    /**
     * Show the profile edit form.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = auth()->user();

        // Check if the authenticated user is a staff member
        if ($user->role !== 'staff') {
            return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
        }

        return view('staff.profile', compact('user'));
    }

    /**
     * Update the profile information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = auth()->user();
    
        // Check if the authenticated user is a staff member
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

