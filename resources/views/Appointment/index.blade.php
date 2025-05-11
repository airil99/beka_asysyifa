@extends('layouts.app')

@section('content')
<div class="main-top">
    <h2>Manage Appointments</h2>
    <p>View and manage customer appointments here.</p>
</div>

<div class="appointment-container">
<div class="status-legend">
    <div><span class="status-paid">✔️</span> Paid</div>
    <div><span class="status-pending">❗</span> Unpaid</div>
</div>


    <table class="appointment-table">
    <thead>
    <tr>
        <th>Customer</th>
        <th>Package</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
        <th>Details</th>
        <th>Receipt</th> <!-- 🆕 Add this -->
    </tr>
</thead>
<tbody>
    @foreach($appointments as $appointment)
        <tr>
            <td>{{ $appointment->user->name }}</td>
            <td>{{ $appointment->package->name }}</td>
            <td>{{ $appointment->date }}</td>
            <td>{{ $appointment->time }}</td>
            <td>
                @if($appointment->payment_status === 'paid')
                    <span class="status-paid">✔️</span>
                @else
                    <span class="status-pending">❗</span>
                @endif
            </td>
            <td>
                <a href="{{ route('appointment.consultation', $appointment->id) }}" class="btn-view-consultation">
                    🔍
                </a>
            </td>
            <td>
                @if($appointment->receipt_path)
                    <a href="{{ asset('storage/' . $appointment->receipt_path) }}" target="_blank" class="btn-view-receipt">
                        📄
                    </a>
                @else
                    <span style="color: grey;">-</span>
                @endif
            </td> <!-- 🆕 Add this -->
        </tr>
    @endforeach
</tbody>
    </table>
</div>

<style>
/* Container Design */
.appointment-container {
    margin: 30px auto;
    max-width: 900px;
    background-color: whitesmoke; /* Baby Blue */
    border: 2px solid #90CAF9; 
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    text-align: center;
}

/* Table Design */
.appointment-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.appointment-table th {
    background-color: lightblue;
    color: black;
    padding: 12px 15px;
    text-align: center;
    border-bottom: 2px solid #42A5F5;
}

.appointment-table td {
    background-color: #ffffff;
    padding: 10px 15px;
    border: 1px solid #ddd;
    text-align: center;
}

/* Alternating Row Colors */
.appointment-table tr:nth-child(even) {
    background-color: lightblue; /* Light Baby Blue */
}

.appointment-table tr:hover {
    background-color: #BBDEFB; /* Softer Blue Hover Effect */
}

/* Status Styles */
.status-paid {
    color: #2E7D32;
    font-weight: bold;
}

.status-pending {
    color: #FF7043;
    font-weight: bold;
}

/* Icon Button for View Consultation */
.btn-view-consultation {
    color: #1E88E5;
    font-size: 20px;
    text-decoration: none;
    transition: transform 0.3s ease;
}

.btn-view-consultation:hover {
    transform: scale(1.3);
}
/* Icon Button for View Receipt */
.btn-view-receipt {
    color: #4CAF50;
    font-size: 20px;
    text-decoration: none;
    transition: transform 0.3s ease;
}

.btn-view-receipt:hover {
    transform: scale(1.3);
}
/* Status Legend */
.status-legend {
    text-align: right;
    font-size: 12px;
    font-weight: normal;
    margin-bottom: 10px;
    line-height: 1.5;
}
.status-legend div {
    margin-bottom: 3px;
}


</style>
@endsection
