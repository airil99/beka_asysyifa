<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageStaffController extends Controller
{
    // Display all staff
    public function index()
    {
        $staff = User::where('role', 'staff')->get(); // Retrieve all staff users
        return view('manager.staff.index', compact('staff'));
    }

    // Show the form to create a new staff member
    public function create()
    {
        return view('manager.staff.create');
    }

    // Store a new staff member
    public function store(Request $request)
    {
        // Add phone validation here
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15|unique:users,phone', // Validate phone number
            'password' => 'required|string|min:8|confirmed',
            'start_date' => 'nullable|date',
            'position' => 'nullable|string|max:255',
        ]);

        // Create a new staff record in the database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone, // Store the phone number
            'password' => Hash::make($request->password),
            'role' => 'staff', // Assign the 'staff' role
            'start_date' => $request->start_date,  // Store start date
            'position' => $request->position,      // Store position
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff created successfully!');
    }

    // Show the form to edit an existing staff member
    public function edit($id)
    {
        $staff = User::where('role', 'staff')->findOrFail($id); // Ensure only staff can be edited
        return view('manager.staff.edit', compact('staff'));
    }

    // Update an existing staff member
    public function update(Request $request, $id)
    {
        $staff = User::findOrFail($id); 
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $staff->id,
            'phone' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'start_date' => 'nullable|date',
            'position' => 'nullable|string|max:255',
        ]);
    
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->phone = $request->phone;
        $staff->start_date = $request->start_date;  // Update start date
        $staff->position = $request->position;      // Update position
    
        // Update the password only if a new one is provided
        if ($request->filled('password')) {
            $staff->password = bcrypt($request->password);
        }
    
        $staff->save();
    
        return redirect()->route('staff.index')->with('success', 'Staff updated successfully.');
    }

    // Delete a staff member
    public function destroy($id)
    {
        $staff = User::where('role', 'staff')->findOrFail($id);
        $staff->delete();

        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully!');
    }
}
