<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the profile edit form.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
{
    $user = auth()->user();
    return view('customer.profile', compact('user'));
}

public function update(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'phone' => 'required|string|max:15',
        'gender' => 'nullable|in:male,female',
        'dob' => 'nullable|date',
        'address' => 'nullable|string',
    ]);

    $user->update($request->only('name', 'email', 'phone', 'gender', 'dob', 'address'));

    return redirect()->route('customer.profile')->with('success', 'Profile updated successfully.');
}

}

