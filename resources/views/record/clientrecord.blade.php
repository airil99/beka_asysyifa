@extends('layouts.app')

@section('content')
<div class="main-top">
    <h2>Appointment History for {{ $client->name }}</h2>
    <p>Here are all the appointments for {{ $client->name }}.</p>
</div>

<div class="appointment-container">
    @if ($appointments->isEmpty())
        <p class="no-appointments-message @if($client->note) italic-note @endif">
            @if($client->note)
                <i>No appointments for this customer. Note: {{ $client->note }}</i>
            @else
                No appointments for this customer.
            @endif
        </p>
    @else
        <table class="client-record-table">
            <thead>
                <tr>
                    <th>Package Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->package->name }}</td>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->time }}</td>
                        <td class="{{ $appointment->payment_status === 'paid' ? 'status-paid' : 'status-pending' }}">
                            {{ $appointment->payment_status === 'paid' ? 'Paid' : 'Pending' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- Back Button below the table, inside the same container -->
    <div class="back-button-container">
        <a href="{{ route('record.index') }}" class="btn-back">Back to Client Record</a>
    </div>
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

    /* No Appointments Message */
    .no-appointments-message {
        font-size: 18px;
        color: #FF7043;
        font-weight: bold;
        margin-top: 20px;
        text-align: center;
    }

    .italic-note {
        font-style: italic;
        color: #888888;
    }

    /* Table Design */
    .client-record-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .client-record-table th,
    .client-record-table td {
        border: 1px solid #ddd;
        padding: 12px 15px;
        text-align: left;
    }

    .client-record-table th {
        background-color: lightblue;
        color: black;
        width: 40%;
    }

    .client-record-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .client-record-table tr:hover {
        background-color: #e6f7ff;
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

    /* Back Button Styling */
    .back-button-container {
        margin-top: 20px;
        text-align: center;
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
