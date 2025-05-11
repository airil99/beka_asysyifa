<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    // Show the form for resetting the password
    public function showResetForm()
    {
        return view('auth.forgot_password');
    }

    // Handle the password reset request
    public function reset(Request $request)
    {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Find the user by email
        $user = User::where('email', $request->email)->first();

        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Dispatch a password reset event
        event(new PasswordReset($user));

        // Redirect with success message
        return redirect()->route('password.request')->with('status', 'Password has been reset successfully!');
    }
}
