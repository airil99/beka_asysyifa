@extends('layouts.app')

@section('title', 'Staff Dashboard')

@section('content')
<!-- Start of section -->
<div class="main-top">
    <h2>Welcome, {{ Auth::user()->name }}!</h2>
    <p>Manage your appointments, track sales, and client records here.</p>
</div>

<!-- Staff-specific content goes here -->
<div class="overview">
    <div class="card">
        <h3>Upcoming Appointments</h3>
        <p>Dec 20, 2024 - 2:00 PM</p>
        <p>Service: Cupping Therapy</p>
    </div>
    <div class="card">
        <h3>Today's Sales</h3>
        <p>Total Sales: $500</p>
        <p>Sessions Completed: 5</p>
    </div>
</div>

@endsection <!-- End of section -->

