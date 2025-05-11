<div class="form-container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h3>Consultation Form</h3>
    <form action="{{ route('consultation.store') }}" method="POST">
        @csrf

        <!-- Medical Conditions -->
        <div class="form-group">
            <label for="medical_conditions">Medical Conditions:</label>
            <textarea id="medical_conditions" name="medical_conditions" rows="4" required>
                {{ $consultation->medical_conditions ?? '' }}
            </textarea>
        </div>

        <!-- Allergies -->
        <div class="form-group">
            <label for="allergies">Allergies:</label>
            <textarea id="allergies" name="allergies" rows="4" required>
                {{ $consultation->allergies ?? '' }}
            </textarea>
        </div>

        <!-- Reason for Appointment -->
        <div class="form-group">
            <label for="reason_for_appointment">Reason for Appointment:</label>
            <textarea id="reason_for_appointment" name="reason_for_appointment" rows="4" required>
                {{ $consultation->reason_for_appointment ?? '' }}
            </textarea>
        </div>

        <!-- Acknowledgment of Risks -->
        <div class="form-group">
            <label>
                <input type="checkbox" name="acknowledgment_risks" value="1" {{ $consultation->acknowledgment_risks ? 'checked' : '' }}>
                I acknowledge the risks associated with the treatment.
            </label>
        </div>

        <!-- Terms and Conditions Agreement -->
        <div class="form-group">
            <label>
                <input type="checkbox" name="terms_agreement" value="1" {{ $consultation->terms_agreement ? 'checked' : '' }}>
                I agree to the terms and conditions.
            </label>
        </div>

        <!-- Submit or Update Button -->
        <div class="form-actions">
            <button type="submit">
                {{ $consultation ? 'Update' : 'Submit' }}
            </button>
        </div>
    </form>
</div>
