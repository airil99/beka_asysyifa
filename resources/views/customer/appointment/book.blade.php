@extends('layouts.app')

@section('content') 

<div class="main-top">
    <h2>Confirm Your Appointment</h2>
    <p>Fill in the details to confirm your booking for {{ $package->name }}.</p>
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="booking-container">
    <form action="{{ route('customer.appointment.confirm') }}" method="POST">
        @csrf
        <input type="hidden" name="package_id" value="{{ $package->id }}">

        <!-- Gender Selection -->
        <div class="form-group">
            <label for="gender">Select Your Gender:</label>
            <div class="gender-options">
                <label class="gender-option">
                    <input type="radio" id="male" name="gender" value="Male" required>
                    <span class="gender-label">Male</span>
                </label>
                <label class="gender-option">
                    <input type="radio" id="female" name="gender" value="Female" required>
                    <span class="gender-label">Female</span>
                </label>
            </div>
        </div>

        <!-- Date Selection -->
        <div class="form-group">
    <label for="date">Preferred Date:</label>
    <input type="date" id="date" name="date" required>
</div>

<script>
    // Get today's date in YYYY-MM-DD format
    const today = new Date().toISOString().split('T')[0];

    // Set the min attribute to today's date
    document.getElementById('date').setAttribute('min', today);
</script>
       <!-- Time Selection (30-minute intervals) -->
       <div class="form-group">
    <label for="time">Preferred Time:</label>
    <select id="time" name="time" required>
        @for ($hour = 8; $hour <= 21; $hour++) <!-- Business hours (8 AM - 9 PM) -->
            @php
                $time = sprintf('%02d:00', $hour);
            @endphp
            
            @if (!in_array($time, $fullTimes))
                <option value="{{ $time }}">{{ $time }}</option>
            @endif
        @endfor
    </select>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</div>


        <!-- Consultation Form Confirmation -->
        <div class="form-group">
            <label class="checkbox-label">
                <input type="checkbox" id="consultation_filled" name="consultation_filled" value="1" required>
            
                I confirm that I have filled out the consultation form.
            </label>
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            <button type="submit" class="btn-confirm">Confirm Appointment</button>
        </div>
    </form>
</div>

<style>
.booking-container {
    background: linear-gradient(135deg, #f0f4f8, #e0e9f2);
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    width: 80%;
    max-width: 600px;
    margin: 20px auto;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.booking-container:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
}
.form-group {
    margin-bottom: 20px;
}
label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #333;
}
input[type="date"],
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}
input[type="date"]:focus,
select:focus {
    border-color: #00897b;
    outline: none;
}
.gender-options {
    display: flex;
    gap: 15px;
}
.gender-option {
    display: flex;
    align-items: center;
    cursor: pointer;
}
.gender-label {
    margin-left: 8px;
    font-weight: normal;
    color: #555;
}
.checkbox-label {
    display: flex;
    align-items: center;
    cursor: pointer;
}
.checkmark {
    display: inline-block;
    width: 20px;
    height: 20px;
    background-color: #fff;
    border: 2px solid #00897b;
    border-radius: 4px;
    margin-right: 10px;
    position: relative;
    transition: background-color 0.3s ease;
}
.checkbox-label input:checked ~ .checkmark {
    background-color: #00897b;
}
.checkmark::after {
    content: '';
    position: absolute;
    display: none;
    left: 6px;
    top: 2px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
}
.checkbox-label input:checked ~ .checkmark::after {
    display: block;
}
.btn-confirm {
    background: linear-gradient(135deg, #00897b, #00695c);
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.btn-confirm:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}
.alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
        }

        .alert-danger {
            background-color: #f2dede;
            color: #a94442;
        }

</style>
@endsection