<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;

class ConsultationController extends Controller
{
    // Show the consultation form
    public function consultation()
    {
        // Retrieve the user's existing consultation form (if any), or return a new one
        $consultation = Consultation::where('user_id', auth()->id())->first();
        
        // If no existing consultation, pass a new instance to the view
        if (!$consultation) {
            $consultation = new Consultation();  // Empty object to handle the case where the user hasn't filled out the form yet
        }

        // Pass the consultation data to the view
        return view('customer.consultation', compact('consultation'));
    }

    // Store or update the consultation form data (POST request)
public function storeConsultation(Request $request)
{
    // Validate and store the consultation form data
    $validated = $request->validate([
        'medical_conditions' => 'required|string',
        'allergies' => 'required|string',
        'reason_for_appointment' => 'required|string',
        'acknowledgment_risks' => 'accepted',
        'terms_agreement' => 'accepted',
    ]);

    // Check if a consultation already exists for the user, and update it, otherwise create a new one
    $consultation = Consultation::updateOrCreate(
        ['user_id' => auth()->id()],
        $validated
    );

    // Flash the success message to the session and redirect back to the consultation form page
    return redirect()->route('customer.consultation')->with('success', 'Consultation form submitted successfully!');
}
}