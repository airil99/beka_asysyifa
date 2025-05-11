<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;  // Add this line

class ClientRecordController extends Controller
{
    public function index()
    {
        // Fetch all users with 'customer' role
        $clients = User::where('role', 'customer')->get();

        return view('record.index', compact('clients'));
    }
     // New method to show appointment history for a client
     public function showHistory($clientId)
     {
         // Fetch the client
         $client = User::findOrFail($clientId);
 
         // Fetch the client's appointments and eager load the 'package' relationship
         $appointments = Appointment::with('package') // Eager load the package relationship
             ->where('user_id', $clientId)
             ->get();
 
         // Return the view with the client and their appointments
         return view('record.clientrecord', compact('client', 'appointments'));
     }
 }

