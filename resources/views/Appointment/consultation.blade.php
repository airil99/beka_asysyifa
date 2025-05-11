@extends('layouts.app')

@section('content')
<div class="main-top">
    <h2>Manage Appointments</h2>
    <p>Consultation Information Here.</p>
</div>

<div class="consultation-container">
    <table class="consultation-table">
        <tr>
            <th>Medical Conditions</th>
            <td>{{ $consultation->medical_conditions }}</td>
        </tr>
        <tr>
            <th>Allergies</th>
            <td>{{ $consultation->allergies }}</td>
        </tr>
        <tr>
            <th>Reason for Appointment</th>
            <td>{{ $consultation->reason_for_appointment }}</td>
        </tr>
        <tr>
            <th>Acknowledgment of Risks</th>
            <td>{{ $consultation->acknowledgment_risks ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
            <th>Terms Agreement</th>
            <td>{{ $consultation->terms_agreement ? 'Agreed' : 'Not Agreed' }}</td>
        </tr>
    </table>

    <div class="back-section">
        <a href="{{ route('appointment.index') }}" class="btn-back"> Back to Appointments</a>
    </div>
</div>

<style>
.consultation-container {
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    max-width: 700px;
    margin: 50px auto;
    text-align: center;
    
}

.consultation-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.consultation-table th,
.consultation-table td {
    border: 1px solid #ddd;
    padding: 12px 15px;
    text-align: left;
}

.consultation-table th {
    background-color: lightblue;
    color: black;
    width: 40%;
}

.consultation-table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.consultation-table tr:hover {
    background-color: #e6f7ff;
}

.btn-back {
    background-color: #d32f2f;
    color: #fff;
    padding: 10px 20px;
    border-radius: 3px;
    text-decoration: none;
    display: inline-block;
    transition: background 0.3s;
}

.btn-back:hover {
    background-color: #b71c1c;
}
</style>
@endsection
