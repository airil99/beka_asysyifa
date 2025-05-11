<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        // Ensure the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Get the authenticated user
        $customer = Auth::user(); // Get the logged-in user

        // Pass the customer data to the view
        return view('customer.dashboard', compact('customer')); // Correct view path
    }
    
    public function appointments() {
        return view('customer.appointments');
    }
    
    public function consultation() {
        return view('customer.consultation');
    }
    
    public function payments() 
{
    $appointments = \App\Models\Appointment::where('user_id', Auth::id())
        ->where('payment_status', 'pending') // Example for unpaid appointments
        ->get();

    return view('customer.payment.index', compact('appointments'));
}
    public function notifications() {
        return view('customer.notifications');
    }
    
    public function profile() {
        return view('customer.profile');
    }
    
    public function support() {
        return view('customer.support');
    }
}


