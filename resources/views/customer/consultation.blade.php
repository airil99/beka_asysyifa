@extends('layouts.app')

@section('title', 'Consultation Form | Bekam Asy Syifa')

@section('content')
<div class="main-top">
    <h2>Consultation Form</h2>
    <p>Please fill out the form below carefully.</p>
</div>

<div class="form-container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   
    <form id="consultation-form" action="{{ route('customer.consultation.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="medical_conditions">Medical Conditions:</label>
            <textarea id="medical_conditions" name="medical_conditions" placeholder="List any medical conditions" required>{{ old('medical_conditions', $consultation->medical_conditions ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="allergies">Allergies:</label>
            <textarea id="allergies" name="allergies" placeholder="List any allergies" required>{{ old('allergies', $consultation->allergies ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="reason_for_appointment">Reason for Appointment:</label>
            <textarea id="reason_for_appointment" name="reason_for_appointment" placeholder="Describe the reason for your appointment" required>{{ old('reason_for_appointment', $consultation->reason_for_appointment ?? '') }}</textarea>
        </div>

        <div class="form-group checkbox-group">
            <label>
                <input type="checkbox" name="acknowledgment_risks" value="1" {{ old('acknowledgment_risks', $consultation->acknowledgment_risks ?? '') ? 'checked' : '' }} required>
                I acknowledge the risks associated with the treatment.
            </label>
        </div>

        <div class="form-group checkbox-group">
            <label>
                <input type="checkbox" name="terms_agreement" value="1" {{ old('terms_agreement', $consultation->terms_agreement ?? '') ? 'checked' : '' }} required>
                I agree to the terms and conditions.
            </label>
        </div>

        <div class="form-actions">
            <button type="submit">Save</button>
        </div>
    </form>
</div>

<style>

.form-container {
    background-color: white;
    border:none;
    border-radius: 12px;
    padding: 40px 30px;
    width: 100%;
    max-width: 700px;
    margin: 0 auto;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.form-container:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    color: #00838f;
}


input,
textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin-top: 8px;
    box-sizing: border-box;
    background-color: #e0f7fa;
}



    textarea {
    height: 50px;
    resize: none;
}


.checkbox-group label {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 1rem;
        color: #555;
    }

    .checkbox-group input {
        width: auto;
        margin: 0;
    }
.form-actions {
    text-align: left;
    margin-top: 20px;
}
.form-actions button {
    background-color:  #00897b;
    color: #fff;
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    width: 100%;
    transition: background 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
}

.form-actions button {
    background-color:  #00897bc;
    color: #fff;
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    width: 100%;
    transition: background 0.3s ease;
}

.form-actions button:hover {
    background-color: #005f8b;
    transform: translateY(-3px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.alert {
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 20px;
    text-align: center;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
}

</style>
@endsection
