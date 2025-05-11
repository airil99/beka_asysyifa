@extends('layouts.app')

@section('content')
<div class="main-top">
    <h2>MANAGE PACKAGE</h2>
    <p>MANAGE YOUR PACKAGE HERE.</p>
</div>

<div class="sales-container"> <!-- Added container -->
<!-- Button aligned to the right -->
<div class="text-right">
<a href="{{ route('packages.create') }}" class="btn-add">
        <i class="fas fa-plus"></i> <!-- Add icon -->
    </a>
</div>

<div class="mt-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($packages as $package)
            <tr>
                <td>{{ $package->name }}</td>
                <td>{{ $package->type }}</td>
                <td>{{ $package->description }}</td>
                <td>RM {{ number_format($package->price, 2) }}</td>
                <td>
                    <div class="action-btn-container">
                        <a href="{{ route('packages.edit', $package->id) }}" class="action-btn edit-btn">
                            <i class="fas fa-edit"></i> <!-- Edit icon -->
                        </a>

                        <form action="{{ route('packages.destroy', $package->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this package?')">
                                <i class="fas fa-trash-alt"></i> <!-- Delete icon -->
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
<style>
/* resources/css/index.css */
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

/* Table styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    background-color: white;
}

table th {
    background-color: lightblue;
}

/* Button styling */
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

/* Action buttons container */
.action-btn-container {
    display: inline-flex;
    align-items: center;
}

/* Edit button */
.edit-btn, .delete-btn {
    background-color: #007BFF;
    color: white;
    padding: 5px 10px; /* Smaller padding */
    font-size: 14px; /* Adjust font size */
    border-radius: 5px; /* Optional: rounded corners */
    display: flex; /* Use flex to align icon and text properly */
    align-items: center; /* Vertically center the icon */
    justify-content: center; /* Center the content */
    margin-right: 5px; /* Add some space between buttons */
    width: 30px; /* Adjust width */
    height: 30px; /* Adjust height */
}

.edit-btn:hover, .delete-btn:hover {
    background-color: #0056b3; /* Darker shade on hover */
}

/* Icon size */
.edit-btn i, .delete-btn i {
    font-size: 18px; /* Adjust icon size */
    margin: 0; /* No margin around icon */
}

/* Styling for Delete button */
.delete-btn {
    background-color: #dc3545;
}

.delete-btn:hover {
    background-color: #c82333;
}

/* Aligning the button to the right */
.text-right {
    text-align: right;
    margin-bottom: 10px;
}

/* Custom success message styling */
.alert {
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
}

/* Success message styling */
.alert-success {
    background-color: #dff0d8; /* Light green background */
    color: #3c763d; /* Dark green text */
}
</style>
@endsection
