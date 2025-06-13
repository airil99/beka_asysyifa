@extends('layouts.app')

@section('content')

<div class="main-top">
    <h2>MANAGE PACKAGE</h2>
    <p>MANAGE YOUR PACKAGE HERE.</p>
</div>

<!-- Button aligned to the right (optional) -->
<div class="sales-container"> <!-- Added container -->
<div class="text-right">
    <a href="{{ route('packages.create') }}" class="btn-add">Add Package</a>
</div>

<div class="mt-4">
    <div class="form-container">
        <h1>Create New Package</h1>
        <form action="{{ route('packages.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="">Select Type</option>
                    <option value="messages">Messages</option>
                    <option value="cupping treatment">Cupping Treatment</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" rows="4" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" class="form-control" required step="0.01" min="0">
            </div>
            <button type="submit" class="btn btn-primary">Create Package</button>
            <a href="{{ route('packages.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
</div>
@endsection

<!-- CSS Styles -->
<style>
     .sales-container {
        margin: 30px auto;
    max-width: 900px;
    background-color: whitesmoke; /* Baby Blue */
    border: 2px solid #90CAF9; 
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    text-align: center;
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
select,
textarea,
input[type="number"] {
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


