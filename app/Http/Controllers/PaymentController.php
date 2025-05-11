<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    // Show the list of appointments with pending payments
    public function index()
    {
        $appointments = Appointment::where('user_id', Auth::id()) // Ensure Auth facade is used
                                   ->with('package') // Ensures package data is fetched
                                   ->whereDate('date', '>=', now()->toDateString()) // Filter for future/current appointments only
                                   ->get();
        
        // Calculate total bill safely
        $totalPayment = $appointments->where('payment_status', 'pending')
                                 ->sum(fn($appointment) => $appointment->package->price ?? 0);
        
        return view('customer.payment.index', compact('appointments', 'totalPayment'));
    }
    
    // Show details for a specific payment
    public function show($id)
    {
        $appointment = Appointment::with(['user', 'package'])->findOrFail($id);
    
        // Show total amount for reference
        $totalAmount = number_format($appointment->package->price, 2);
    
        // Path to your QR image (stored in /public/images)
        $qrImagePath = asset('pictures/qr.jpg'); 
    
        return view('customer.payment.show', compact('appointment', 'totalAmount', 'qrImagePath'));
    }
    // Cancel Payment
    public function cancelPayment($id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return redirect()->route('customer.payment')->with('error', 'Appointment not found.');
        }

        $appointment->delete();

        return redirect()->route('customer.payment')->with('success', 'Appointment cancelled successfully.');
    }

    // Upload Payment Receipt
    public function uploadReceipt(Request $request, $id)
    {
        $request->validate([
            'receipt' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);
    
        $appointment = Appointment::find($id);
    
        if (!$appointment) {
            return redirect()->route('customer.payment')->with('error', 'Appointment not found.');
        }
    
        if ($request->hasFile('receipt')) {
            $fileName = time() . '_' . $request->file('receipt')->getClientOriginalName();
            $filePath = $request->file('receipt')->storeAs('receipts', $fileName, 'public');
    
            $userId = $appointment->user_id;
    
            Appointment::where('user_id', $userId)
                ->where('payment_status', 'pending') // Corrected to 'pending'
                ->update([
                    'receipt_path' => $filePath,
                    'payment_status' => 'paid',
                ]);
    
            return redirect()->route('customer.payment')->with('success', 'Payment proof submitted successfully!');
        }
    
        return redirect()->route('customer.payment')->with('error', 'Failed to upload receipt.');
    }
    

}