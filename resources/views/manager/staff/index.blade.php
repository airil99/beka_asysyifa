@extends('layouts.app')

@section('content')


    <div class="main-top">
        <h2>MANAGE STAFF</h2>
        <p>MANAGE YOUR STAFF HERE.</p>
    </div>
    <div class="staff-container"> <!-- Added container -->

    <!-- Button aligned to the right -->
    <div class="text-right">
        <a href="{{ route('staff.create') }}" class="btn-add">
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
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Start Date</th>
                    <th>Position</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staff as $staffMember)
                    <tr>
                        <td>{{ $staffMember->name }}</td>
                        <td>{{ $staffMember->email }}</td>
                        <td>{{ $staffMember->phone }}</td>
                        <td>{{ $staffMember->start_date ? \Carbon\Carbon::parse($staffMember->start_date)->format('d M, Y') : 'N/A' }}</td>
                        <td>{{ $staffMember->position ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('staff.edit', $staffMember->id) }}" class="action-btn edit-btn">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('staff.destroy', $staffMember->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this staff member?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
/* resources/css/index.css */
.staff-container {
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
    background-color:white ;
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

/* Action buttons */
.action-btn {
    padding: 8px 12px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 14px;
    display: inline-flex; /* Align icon and button */
    align-items: center; /* Vertically center the icon */
    justify-content: center; /* Center the content */
}

/* Edit Button Styles */
.edit-btn {
    background-color: #007BFF;
    color: white;
}

.edit-btn:hover {
    background-color: #0056b3;
}

/* Delete Button Styles */
.delete-btn {
    background-color: #dc3545;
    color: white;
}

.delete-btn:hover {
    background-color: #c82333;
}

/* Action button icons */
.action-btn i {
    font-size: 18px; /* Adjust icon size */
    margin: 0; /* Remove margin around icon */
}

/* Aligning the button to the right */
.text-right {
    text-align: right;
    margin-bottom: 10px;
}

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
