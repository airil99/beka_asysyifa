@extends('layouts.app')

@section('content')

<div class="main-top">
    <h2>EDIT STAFF</h2>
    <p>UPDATE STAFF DETAILS HERE.</p>
</div>

<!-- Back Button -->
<div class="sales-container"> <!-- Added container -->
<div class="text-right">
    <a href="{{ route('staff.index') }}" class="btn-add">Back to Staff List</a>
</div>

<div class="mt-4">
    <div class="form-container">
        <h1>Edit Staff</h1>
        <form action="{{ route('staff.update', $staff->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Specify that this is an update request -->

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $staff->name) }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $staff->email) }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $staff->phone) }}" required>
            </div>
            <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" name="position" id="position" class="form-control" value="{{ old('position', $staff->position) }}" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $staff->start_date) }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password (Leave empty to keep current password):</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter new password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm new password">
            </div>

            <button type="submit" class="btn btn-primary">Update Staff</button>
            <a href="{{ route('staff.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
</div> 

@endsection

<!-- CSS Styles -->
<style>
    .sales-container {
        max-width: 900px;
        margin: 20px auto;
        padding: 25px;
        background: #fdfdfd;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }

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


