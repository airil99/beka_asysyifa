@extends('layouts.app')

@section('title', 'Manager Dashboard')

@section('content') <!-- Start of section -->

<div class="main-top">
    <h2>Welcome, {{ Auth::user()->name }}!</h2>
    <p>Here is an overview of your account and activities.</p>
</div>

<!-- Manager-specific content goes here -->
<div class="overview">
    <div class="card">
        <h3>Manage Staff</h3>
        <p>Overview of staff members and permissions.</p>
    </div>
    <div class="card">
        <h3>View Sales</h3>
        <p>Track the sales made from completed sessions.</p>
    </div>
</div>

@endsection <!-- End of section -->

