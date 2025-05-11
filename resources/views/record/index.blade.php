@extends('layouts.app')

@section('content')
<div class="main-top">
    <h2>Client Records</h2>
    <p>View and access customer profiles and appointment history.</p>
</div>

<div class="appointment-container">
    <table class="appointment-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Appointments</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->dob }}</td>
                    <td>{{ $client->gender }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>
                    <a href="{{ route('client.history', $client->id) }}" class="btn-view-history">
                    📋
                </a>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
/* === Reused CSS from Appointment Table === */
.appointment-container {
    margin: 30px auto;
    max-width: 900px;
    background-color: whitesmoke;
    border: 2px solid #90CAF9; 
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    text-align: center;
}

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

.appointment-table tr:nth-child(even) {
    background-color: lightblue;
}

.appointment-table tr:hover {
    background-color: #BBDEFB;
}

.btn-view-consultation {
    color: #1E88E5;
    font-size: 20px;
    text-decoration: none;
    transition: transform 0.3s ease;
}

.btn-view-consultation:hover {
    transform: scale(1.3);
}
</style>
@endsection
