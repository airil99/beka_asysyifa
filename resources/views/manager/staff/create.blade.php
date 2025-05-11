@extends('layouts.app')

@section('content')

<div class="main-top">
    <h2>MANAGE STAFF</h2>
    <p>ADD NEW STAFF MEMBER HERE.</p>
</div>

<!-- Back Button -->
<div class="text-right">
    <a href="{{ route('staff.index') }}" class="btn-add">Back to Staff List</a>
</div>

<div class="mt-4">
    <div class="form-container">
        <h1>Create New Staff</h1>
        <form action="{{ route('staff.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter full name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter email address" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter phone number" required>
            </div>
            <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" name="position" id="position" class="form-control" placeholder="Enter position" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm password" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Staff</button>
            <a href="{{ route('staff.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

@endsection

<!-- CSS Styles -->
<style>
/* General body styling */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: rgb(233, 233, 233);
    color: #333;
}

/* Main top section */
.main-top {
    text-align: center;
    background-color: lightblue;
    color: black;
    padding: 20px 0;
}

.main-top h2 {
    margin-bottom: 5px; 
}

/* Form container */
.form-container {
    margin-top: 20px;
    background-color: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Form Group */
.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

/* Button styling */
button[type="submit"],
a.btn-secondary {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 10px; /* Add some space between buttons */
}

button[type="submit"]:hover,
a.btn-secondary:hover {
    background-color: #0056b3;
}

/* Aligning the button to the right */
.text-right {
    text-align: right;
    margin-bottom: 10px;
}

/* Action buttons */
.btn-add {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block;
}

.btn-add:hover {
    background-color: #45a049;
}
</style>

